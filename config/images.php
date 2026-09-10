<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Investments list thumb
    |--------------------------------------------------------------------------
    */
    'investment' => [
        'thumb_width' => 840,
        'thumb_height' => 500,
        'logo_width' => 180,
        'logo_height' => 80,
        'header_width' => 1920,
        'header_height' => 300,
        'carousel_width' => 386,
        'carousel_height' => 450,
        'file_path' => 'investment/',
        'thumb_file_path' => 'investment/thumbs/',
        'carousel_file_path' => 'investment/carousel/',
        'header_file_path' => 'investment/header/',
        'preview_file_path' => 'investment/thumbs/',
        'preview_logofile_path' => 'investment/logo/',
        'preview_carousel_path' => 'investment/carousel/',
        'article_file_path' => 'investment/articles/',
        'article_thumb_file_path' => 'investment/articles/thumbs/',
        'article_preview_file_path' => 'investment/articles/thumbs/',
        'section_preview_file_path' => 'investment/sections/',
        'brochure_file_path' => 'investment/brochure/',
    ],

    /*
    |--------------------------------------------------------------------------
    | Investment plan
    |--------------------------------------------------------------------------
    */

    'plan' => [
        'width' => 1600,
        'height' => 1600
    ],

    /*
    |--------------------------------------------------------------------------
    | Building plan
    |--------------------------------------------------------------------------
    */

    'building' => [
        'width' => 1600,
        'height' => 1600
    ],

    /*
    |--------------------------------------------------------------------------
    | Investment floor plan
    |--------------------------------------------------------------------------
    */

    'floor' => [
        'width' => 1600,
        'height' => 1600
    ],

    /*
    |--------------------------------------------------------------------------
    | Investment property
    |--------------------------------------------------------------------------
    */

    'property_plan' => [
        'width' => 1200,
        'height' => 1200
    ],
    'property_thumb' => [
        'width' => 830,
        'height' => 830
    ],
    'property_list' => [
        'width' => 300,
        'height' => 300
    ],

    /*
    |--------------------------------------------------------------------------
    | Articles
    |--------------------------------------------------------------------------
    */

    'article' => [
        'big_width' => 1060,
        'big_height' => 596,
        'thumb_width' => 700,
        'thumb_height' => 394,
        'file_path' => 'uploads/articles/',
        'thumb_file_path' => 'uploads/articles/thumbs/',
        'preview_file_path' => 'uploads/articles/thumbs/',
        'facebook_file_path' => 'uploads/articles/share/',
    ],

    /*
    |--------------------------------------------------------------------------
    | Boxes
    |--------------------------------------------------------------------------
    */

    'box' => [
        'width' => 120,
        'height' => 120,
        'file_path' => 'uploads/boxes/',
        'preview_file_path' => 'uploads/boxes/'
    ],

    /*
    |--------------------------------------------------------------------------
    | Promotions
    |--------------------------------------------------------------------------
    */

    'promotion' => [
        'width' => 265,
        'height' => 199,
        'file_path' => 'uploads/promotion/',
        'preview_file_path' => 'uploads/promotion/'
    ],

    /*
    |--------------------------------------------------------------------------
    | Sections
    |--------------------------------------------------------------------------
    */

    'section' => [
        'width' => 1124,
        'height' => 632
    ],

    /*
    |--------------------------------------------------------------------------
    | Slider
    |--------------------------------------------------------------------------
    */

    'slider' => [
        /*
        | Hero na stronie glownej ma inna proporcje na kazdym progu (patrz
        | ippon.less: 1920/781 na desktopie, 16/9 ponizej 1200px, 4/5 ponizej
        | 768px). Dlatego seria nie jest samym przeskalowaniem jednego kadru:
        | 'desktop' trzyma proporcje hero, 'tablet' juz 16/9, a kadr pionowy
        | wgrywa sie osobno (pole "Zdjecie mobile") — inaczej na telefonie
        | object-fit wycialby zdjeciu srodek.
        |
        | Klucz tablicy = nazwa podkatalogu w uploads/slider/.
        */
        'sizes' => [
            '1920' => ['width' => 1920, 'height' => 781],
            '1440' => ['width' => 1440, 'height' => 586],
            '1024' => ['width' => 1024, 'height' => 576],
        ],

        /* Kadr pionowy pod telefony — z osobnego uploadu. */
        'mobile_width' => 900,
        'mobile_height' => 1125,

        /* Miniaturka "nastepny slajd" w nawigacji hero: kafel 245x218 w LESS,
           plik w 2x zeby nie mydlil na ekranach retina. Sluzy tez za podglad
           na liscie w adminie. */
        'thumb_width' => 490,
        'thumb_height' => 436,

        /* Zgodnosc wstecz: 'big_*' czyta stary formularz i stare szablony. */
        'big_width' => 1920,
        'big_height' => 781,

        'file_path' => 'uploads/slider/',
        'source_file_path' => 'uploads/slider/source/',
        'thumb_file_path' => 'uploads/slider/thumbs/',
        'mobile_file_path' => 'uploads/slider/mobile/',
        'preview_file_path' => 'uploads/slider/thumbs/',
    ],

    /*
    |--------------------------------------------------------------------------
    | Gallery
    |--------------------------------------------------------------------------
    */

    'gallery' => [
        'big_width' => 1360,
        'big_height' => 765,
        'thumb_width' => 520,
        'thumb_height' => 293,
        'thumb_width_2' => 386,
        'thumb_height_2' => 217,
        'file_path' => 'uploads/gallery/images/',
        'thumb_file_path' => 'uploads/gallery/images/thumbs/',
        'thumb_file_path_2' => 'uploads/gallery/images/thumbs2/',
        'preview_file_path' => 'uploads/gallery/images/thumbs/',
    ],

    /*
    |--------------------------------------------------------------------------
    | Pages
    |--------------------------------------------------------------------------
    */

    'page' => [
        'header_width' => 2560,
        'header_height' => 470,
        'file_path' => 'uploads/pages/headers/',
        'preview_file_path' => 'uploads/pages/headers/'
    ],
];
