<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            /* Muñecos de trapo */
            [
                'category_id' => 1,
                'name' => 'Navideños',
                'slug' => Str::slug('Navideños'),
                'color' => true
            ],

            [
                'category_id' => 1,
                'name' => 'Cuartos de Baños',
                'slug' => Str::slug('Cuartos de Baños'),
            ],

            [
                'category_id' => 1,
                'name' => 'Dormitorios',
                'slug' => Str::slug('Dormitorios'),
            ],

            /* Espejos */

            [
                'category_id' => 2,
                'name' => 'Decorativos',
                'slug' => Str::slug('Decorativos'),
            ],
            [
                'category_id' => 2,
                'name' => 'Navideños',
                'slug' => Str::slug('Navideños'),
            ],

            [
                'category_id' => 2,
                'name' => 'Dormitorio',
                'slug' => Str::slug('Dormitorio'),
            ],

            /* Cojines */
            [
                'category_id' => 3,
                'name' => 'Navideños',
                'slug' => Str::slug('Navideños'),
            ],

            [
                'category_id' => 3,
                'name' => 'Decorativos',
                'slug' => Str::slug('Decotativos'),
            ],

            [
                'category_id' => 3,
                'name' => 'Salas',
                'slug' => Str::slug('Salas'),
            ],

            [
                'category_id' => 3,
                'name' => 'Dormitorios',
                'slug' => Str::slug('Dormitorios'),
            ],

            /* Lenceria */

            [
                'category_id' => 4,
                'name' => 'Baños',
                'slug' => Str::slug('Baños'),
            ],

            [
                'category_id' => 4,
                'name' => 'Sala',
                'slug' => Str::slug('Sala'),
            ],

            [
                'category_id' => 4,
                'name' => 'Dormitorio',
                'slug' => Str::slug('Dormitorio'),
            ],

            [
                'category_id' => 4,
                'name' => 'Cocina',
                'slug' => Str::slug('Cocina'),
            ],

            /* Moda */
            [
                'category_id' => 5,
                'name' => 'Mujeres',
                'slug' => Str::slug('Mujeres'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 5,
                'name' => 'Hombres',
                'slug' => Str::slug('Hombres'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 5,
                'name' => 'Lentes',
                'slug' => Str::slug('Lentes'),
            ],

            [
                'category_id' => 5,
                'name' => 'Relojes',
                'slug' => Str::slug('Relojes'),
            ],
        ];

        foreach ($subcategories as $subcategory) {


            Subcategory::create($subcategory);

        }
    }
}
