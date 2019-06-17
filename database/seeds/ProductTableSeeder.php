<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Size Creation : 
         */
        App\Size::create([
            'size' => 'XS'
        ]);
        App\Size::create([
            'size' => 'S'
        ]);
        App\Size::create([
            'size' => 'M'
        ]);
        App\Size::create([
            'size' => 'L'
        ]);
        App\Size::create([
            'size' => 'XL'
        ]);

        /**
         * Categorie Creation : 
         */
        App\Categorie::create([
            'categorie' => 'Homme'
        ]);
        App\Categorie::create([
            'categorie' => 'Femme'
        ]);

        // Creation of 80 Product
        factory(App\Product::class, 80)->create()->each(function($product) {
            // Choose the size randomly
            $size = App\Size::find(rand(1,5));

            $product->size()->associate($size);
            $product->save();

            // Choose the categorie randomly
            $categorie = App\Categorie::find(rand(1,2));

            $product->categorie()->associate($categorie);
            $product->save();
        });
    }
}
