<?php

namespace App\DataFixtures;


class FixturesData {

    const DATA = [
        'europe'=> [
            [
                'name' => 'France',
                'description' => 'VIN',
                'poster' => 'france.jpeg',
            ],
            [
                'name' => 'Italie',
                'description' => 'PiZZA',
                'poster' => 'italie.jpeg',
            ],

        ],

        'asie'=> [
            [
                'name' => 'CHINA',
                'description' => 'Nem rán',
                'poster' => 'CHINE.jpeg',
            ],
            [
                'name' => 'JAPAN',
                'description' => 'SUSHI',
                'poster' => 'JAPAN.jpeg',
            ],

        ],
        'amerique du nord'=>[
            [
                'name' => 'AMERICA',
                'description' => 'BURGER',
                'poster' => 'AMAERICA.jpeg',
            ],
            [
                'name' => 'MEXICO',
                'description' => 'TACOS',
                'poster' => 'MEXICO.jpeg',
            ],

        ],
    ];

}







