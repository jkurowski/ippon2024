<?php
/**
 * Narzedzie do makiet Figma z public/materialy_klienta.
 *
 *   slice   <png> <katalog> [wysokosc=1000] [szerokosc=1150]
 *           tnie makiete na kawalki do ogladania (Read na plikach .jpg)
 *
 *   extract <png> <x> <y> <plik.jpg>
 *           wycina zdjecie, ktorego krawedzie wykrywa od punktu (x,y)
 *           idac do bialego tla
 *
 *   crop    <png> <x> <y> <w> <h> <plik.jpg>
 *           wycinek po sztywnych wspolrzednych
 *
 *   probe   <png> row|col <stala> <od> <do> [krok=5]
 *           kolory wzdluz wiersza/kolumny — do szukania krawedzi i odstepow
 *
 *   vivid   <in> <out> [nasycenie=1.35] [jasnosc=0]
 *           podbija nasycenie zdjecia (klient: "zywsze kolory")
 *
 *   size    <png>
 */

const WHITE = 246;      // prog "bialego tla" makiety
const SLICE_W = 1150;   // szerokosc podgladu (skala 1150/1920 = 0.599)

function fail(string $msg): void { fwrite(STDERR, $msg . PHP_EOL); exit(1); }

function open(string $path) {
    if (!is_file($path)) fail("Nie ma pliku: $path");
    $img = @imagecreatefrompng($path) ?: @imagecreatefromjpeg($path);
    if (!$img) fail("Nie umiem otworzyc: $path");
    return $img;
}

function isWhite($img, int $x, int $y): bool {
    $c = imagecolorat($img, $x, $y);
    return (($c >> 16) & 255) > WHITE && (($c >> 8) & 255) > WHITE && ($c & 255) > WHITE;
}

function hex($img, int $x, int $y): string {
    $c = imagecolorat($img, $x, $y);
    return sprintf('#%02x%02x%02x', ($c >> 16) & 255, ($c >> 8) & 255, $c & 255);
}

function saveJpeg($img, string $out, int $q = 88): void {
    $dir = dirname($out);
    if (!is_dir($dir)) mkdir($dir, 0777, true);
    imagejpeg($img, $out, $q);
}

$cmd = $argv[1] ?? '';

switch ($cmd) {

    case 'size': {
        $src = open($argv[2] ?? fail('podaj plik'));
        echo imagesx($src) . 'x' . imagesy($src) . PHP_EOL;
        break;
    }

    case 'slice': {
        $file = $argv[2] ?? fail('slice <png> <katalog> [wysokosc] [szerokosc]');
        $dir  = $argv[3] ?? fail('podaj katalog wyjsciowy');
        $step = (int)($argv[4] ?? 1000);
        $outW = (int)($argv[5] ?? SLICE_W);

        $src = open($file);
        $W = imagesx($src); $H = imagesy($src);
        $n = max(1, (int)ceil($H / $step));
        $sh = (int)ceil($H / $n);
        $ov = 70; // zakladka, zeby nic nie wpadlo w szczeline miedzy kawalkami
        $base = preg_replace('/[^a-z0-9]+/i', '-', strtolower(pathinfo($file, PATHINFO_FILENAME)));
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        for ($i = 0; $i < $n; $i++) {
            $y = max(0, $i * $sh - ($i > 0 ? $ov : 0));
            $h = min($H - $y, $sh + $ov);
            $outH = (int)round($h * $outW / $W);
            $d = imagecreatetruecolor($outW, $outH);
            imagecopyresampled($d, $src, 0, 0, 0, $y, $outW, $outH, $W, $h);
            $out = rtrim($dir, "/\\") . "/$base-$i.jpg";
            saveJpeg($d, $out, 85);
            printf("%s   y=%d h=%d  (skala %.3f)\n", $out, $y, $h, $outW / $W);
        }
        echo "Wspolrzedna oryginalu = offset_y + y_na_slajdzie / " . round($outW / $W, 3) . PHP_EOL;
        break;
    }

    case 'extract': {
        $file = $argv[2] ?? fail('extract <png> <x> <y> <plik.jpg>');
        $x = (int)($argv[3] ?? fail('podaj x'));
        $y = (int)($argv[4] ?? fail('podaj y'));
        $out = $argv[5] ?? fail('podaj plik wyjsciowy');

        $src = open($file);
        $W = imagesx($src); $H = imagesy($src);
        if (isWhite($src, $x, $y)) fail("Punkt ($x,$y) jest bialy — wskaz srodek zdjecia.");

        // Pierwsze przyblizenie z jednego punktu.
        $t = $y; while ($t > 0 && !isWhite($src, $x, $t - 1)) $t--;
        $b = $y; while ($b < $H - 1 && !isWhite($src, $x, $b + 1)) $b++;
        $l = $x; while ($l > 0 && !isWhite($src, $l - 1, $y)) $l--;
        $r = $x; while ($r < $W - 1 && !isWhite($src, $r + 1, $y)) $r++;

        /* Zdjecia z makiety maja jasne fragmenty (niebo, sciana, sufit), wiec
           skan po jednej linii potrafi sie zatrzymac w srodku. Rozpychamy
           ramke, skanujac po kilku liniach, dopoki cos jeszcze przyrasta. */
        for ($pass = 0; $pass < 6; $pass++) {
            $before = [$l, $t, $r, $b];
            $ys = [];
            $xs = [];
            for ($k = 1; $k <= 5; $k++) {
                $ys[] = (int)round($t + ($b - $t) * $k / 6);
                $xs[] = (int)round($l + ($r - $l) * $k / 6);
            }
            foreach ($ys as $yy) {
                $ll = $l; while ($ll > 0 && !isWhite($src, $ll - 1, $yy)) $ll--;
                $rr = $r; while ($rr < $W - 1 && !isWhite($src, $rr + 1, $yy)) $rr++;
                $l = min($l, $ll); $r = max($r, $rr);
            }
            foreach ($xs as $xx) {
                $tt = $t; while ($tt > 0 && !isWhite($src, $xx, $tt - 1)) $tt--;
                $bb = $b; while ($bb < $H - 1 && !isWhite($src, $xx, $bb + 1)) $bb++;
                $t = min($t, $tt); $b = max($b, $bb);
            }
            if ([$l, $t, $r, $b] === $before) break;
        }

        $w = $r - $l + 1; $h = $b - $t + 1;
        $d = imagecreatetruecolor($w, $h);
        imagecopy($d, $src, 0, 0, $l, $t, $w, $h);
        saveJpeg($d, $out);
        printf("%s   x=%d y=%d  %dx%d\n", $out, $l, $t, $w, $h);
        echo "Obejrzyj kadr (Read) — jasny pas przy krawedzi (niebo, sufit, sciana)\n"
           . "potrafi obciac zdjecie. Jak obcielo, wez `crop` po wspolrzednych.\n";
        break;
    }

    case 'crop': {
        $file = $argv[2] ?? fail('crop <png> <x> <y> <w> <h> <plik.jpg>');
        [$x, $y, $w, $h] = [(int)$argv[3], (int)$argv[4], (int)$argv[5], (int)$argv[6]];
        $out = $argv[7] ?? fail('podaj plik wyjsciowy');

        $src = open($file);
        $d = imagecreatetruecolor($w, $h);
        imagecopy($d, $src, 0, 0, $x, $y, $w, $h);
        saveJpeg($d, $out);
        printf("%s   %dx%d\n", $out, $w, $h);
        break;
    }

    case 'vivid': {
        $in  = $argv[2] ?? fail('vivid <in> <out> [nasycenie=1.35] [jasnosc=0]');
        $out = $argv[3] ?? fail('podaj plik wyjsciowy');
        $sat = (float)($argv[4] ?? 1.35);
        $bri = (int)($argv[5] ?? 0);

        $src = open($in);
        $W = imagesx($src); $H = imagesy($src);
        $d = imagecreatetruecolor($W, $H);

        for ($y = 0; $y < $H; $y++) {
            for ($x = 0; $x < $W; $x++) {
                $c = imagecolorat($src, $x, $y);
                $r = ($c >> 16) & 255; $g = ($c >> 8) & 255; $b = $c & 255;
                // luma wg BT.601 — odsuwamy kolor od szarosci, wiec biel i czern zostaja
                $l = 0.299 * $r + 0.587 * $g + 0.114 * $b;
                $r = (int)max(0, min(255, $l + ($r - $l) * $sat + $bri));
                $g = (int)max(0, min(255, $l + ($g - $l) * $sat + $bri));
                $b = (int)max(0, min(255, $l + ($b - $l) * $sat + $bri));
                imagesetpixel($d, $x, $y, ($r << 16) | ($g << 8) | $b);
            }
        }
        saveJpeg($d, $out, 90);
        printf("%s   %dx%d  nasycenie x%.2f, jasnosc %+d\n", $out, $W, $H, $sat, $bri);
        break;
    }

    case 'probe': {
        $file = $argv[2] ?? fail('probe <png> row|col <stala> <od> <do> [krok]');
        $axis = $argv[3] ?? 'row';
        $fix  = (int)($argv[4] ?? 0);
        $from = (int)($argv[5] ?? 0);
        $to   = (int)($argv[6] ?? 0);
        $step = max(1, (int)($argv[7] ?? 5));

        $src = open($file);
        for ($i = $from; $i <= $to; $i += $step) {
            $c = $axis === 'row' ? hex($src, $i, $fix) : hex($src, $fix, $i);
            echo $i . ':' . $c . '  ';
        }
        echo PHP_EOL;
        break;
    }

    default:
        fail("Uzycie:\n"
            . "  makieta.php size    <png>\n"
            . "  makieta.php slice   <png> <katalog> [wysokosc=1000] [szerokosc=1150]\n"
            . "  makieta.php extract <png> <x> <y> <plik.jpg>\n"
            . "  makieta.php crop    <png> <x> <y> <w> <h> <plik.jpg>\n"
            . "  makieta.php probe   <png> row|col <stala> <od> <do> [krok=5]");
}
