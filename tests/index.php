<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../src/C2iS/Component/Json/JsonExtractor.php';

    echo "<pre>";

    $data = exampleData(false);
    //var_dump($data);
    var_dump(\C2iS\Component\Json\JsonExtractor::extract($data,"$..name"));

    var_dump($data);

    echo "</pre>";

    function exampleData($asArray = true)
    {
        $data = [
            'name'        => 'Major League Baseball',
            'abbr'        => 'MLB',
            'conferences' => [
                [
                    'name'  => 'Western Conference',
                    'abbr'  => 'West',
                    'teams' => [
                        [
                            'name'     => 'Dodger',
                            'city'     => 'Los Angeles',
                            'whatever' => 'else',
                            'players'  => [
                                ['name' => 'Bob Smith', 'number' => 22],
                                ['name' => 'Joe Face', 'number' => 23, 'active' => 'yes'],
                            ],
                        ]
                    ],
                ],
                [
                    'name'  => 'Eastern Conference',
                    'abbr'  => 'East',
                    'teams' => [
                        [
                            'name'     => 'Mets',
                            'city'     => 'New York',
                            'whatever' => 'else',
                            'players'  => [
                                ['name' => 'something', 'number' => 14, 'active' => 'yes'],
                                ['name' => 'something', 'number' => 15],
                            ]
                        ]
                    ]
                ]
            ]
        ];

        return $asArray ? $data : json_encode($data);

    }

?>