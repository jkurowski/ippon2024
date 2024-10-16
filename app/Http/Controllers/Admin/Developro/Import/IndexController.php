<?php

namespace App\Http\Controllers\Admin\Developro\Import;

use App\Http\Controllers\Controller;
use App\Imports\ExcelImportClass;
use App\Models\Property;
use Maatwebsite\Excel\Facades\Excel;

class IndexController extends Controller
{
    public function index()
    {
        $importedData = Excel::toArray(new ExcelImportClass(), public_path('import/import_mieszkania_tempo.xls'));

        $additionalAreaTypes = [
            'OGRÓDEK' => 'garden_area',
            'BALKON' => 'balcony_area',
            'LOGGIA' => 'loggia_area'
        ];

//        '1' => 'Mieszkanie / Apartament',
//        '2' => 'Komórka lokatorska',
//        '3' => 'Miejsce parkingowe'

//        '1' => 'Na sprzedaż',
//        '2' => 'Rezerwacja',
//        '3' => 'Sprzedane',
//        '4' => 'Wynajęte'
        foreach ($importedData as &$sheet) {

            foreach($sheet as $key => $row) {

                if($row['nazwa_powierzchni'] == "MIESZKANIE"){

                $property = new Property();
                $property['investment_id'] = 7;
                $buildingId = $this->building($row['budynek']);

                // Set building_id in property
                $property->building_id = $buildingId;
                $property->floor_id = $this->floor($row['pietro'], $buildingId);

                if (isset($additionalAreaTypes[$row['powierzchnia_dodatkowa']])) {
                    $property->{$additionalAreaTypes[$row['powierzchnia_dodatkowa']]} = $row['powierzchnia_powierzchni_dodatkowej'];
                }

                $property['status'] = $this->status($row['status']);
                $property['name'] = $row['nazwa_powierzchni'] .' '.$row['nr_powierzchni'];
                $property['name_list'] = $row['nazwa_powierzchni'];
                $property['number'] = $row['nr_powierzchni'];
                $property['number_order'] = $key + 1;

                $property['rooms'] = $row['pokoje'];
                $property['area'] = $row['metraz'];
                $property['price'] = $row['cena_brutto'];
                //$property['price_promotion'] = $row['cena_promocyjna'];

//                if (is_numeric($row['cena_promocyjna']) && $row['cena_promocyjna'] > 0) {
//                    $property['specialoffer'] = 1;
//                } else {
//                    $property['specialoffer'] = 0;
//                }

//                $property['price_30'] = $row['cena_30_dni'];

//                $property['view_360'] = $row['widok_360'];
//                $property['view_3d'] = $row['spacer_3d'];

                $property['type'] = 1;

//                echo '<pre>';
//                print_r($property->toArray());
//                echo '</pre>';

                $property->save();
                }
            }
        }

        //return view('admin.developro.import.index', ['importedData' => $importedData[0]]);
    }

    public function building($building) {
        if (isset($building)) {
            switch ($building) {
                case 'B1':
                    return 1;
                case 'B2':
                    return 2;
                default:
                    return 0; // Return 0 for unknown buildings
            }
        }
        return 0; // Return 0 if building is not set
    }

    public function status($status) {
        if (isset($status)) {
            switch ($status) {
                case 'Sprzedane':
                    return 3;
                default:
                    return 1; // Return 0 for unknown buildings
            }
        }
        return 1; // Return 0 if building is not set
    }

    public function floor($pietro, $buildingId) {
        switch ($pietro) {
            case '0':
                return 15;
            case '1':
                return 16;
            case '2':
                return 17;
            case '3':
                return 18;
            case '4':
                return 19;
            default:
                return 0;
        }
    }
}

//Parter - ID: 15
//Piętro 1 - ID: 16
//Piętro 2 - ID: 17
//Piętro 3 - ID: 18
//Piętro 4 - ID: 19
