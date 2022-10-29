<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Muñecos de Trapo',
                'slug' => Str::slug('Muñecos de Trapo'),
                'icon' => '<i class="fas fa-baby"></i>'
            ],
            [
                'name' => 'Espejos',
                'slug' => Str::slug('espejos'),
                'icon' => '<i class="fas fa-vector-square"></i>'
            ],

            [
                'name' => 'Cojines',
                'slug' => Str::slug('Cojines'),
                'icon' => '<i class="fas fa-couch"></i>'
            ],

            [
                'name' => 'Lenceria',
                'slug' => Str::slug('Lenceria'),
                'icon' => '<i class="far fa-gem"></i>'
            ],

            [
                'name' => 'Moda',
                'slug' => Str::slug('Moda'),
                'icon' => '<i class="fas fa-tshirt"></i>'
            ],
        ];

        foreach ($categories as $category) {
            $category = Category::factory(1)->create($category)->first();

            $brands = Brand::factory(2)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }

    }
}
