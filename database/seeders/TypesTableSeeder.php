<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'type_name' => 'frontend_development',
                'children' => [
                    [
                        'type_name' => 'Angular',
                        'children' => [
                            ['type_name' => 'Angular js'],
                            ['type_name' => 'Angular 2'],

                        ],
                    ],
                    [
                        'type_name' => 'React',
                        'children' => [
                            ['type_name' => 'React Native'],

                        ],
                    ],
                    [
                        'type_name' => 'Vue',
                        'children' => [
                            ['type_name' => 'Vuex'],

                        ],
                    ],

                ],
            ],
            [
                'type_name' => 'backend_development',
                'children' => [
                    [
                        'type_name' => 'PHP',
                        'children' => [
                            ['type_name' => 'Laravel'],
                            ['type_name' => 'Lumen'],
                            ['type_name' => 'Symfony'],
                        ],
                    ],
                    [
                        'type_name' => 'NodeJS',
                        'children' => [
                            ['type_name' => 'Express'],
                            ['type_name' => 'NestJS'],

                        ],
                    ],
                ],
            ],
        ];
        foreach ($types as $type) {
            \App\Models\Type::create($type);
        }
    }
}
