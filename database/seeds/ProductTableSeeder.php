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

            // Choose the categorie randomly
            $categorieRNG = rand(1,2);
            $categorie = App\Categorie::find($categorieRNG);

            $product->categorie()->associate($categorie);

            if($categorieRNG === 1) {
                // Men product
                $pictures = glob(public_path().'/images/hommes/*');
                $pictureRNG = $pictures[array_rand($pictures)];
            } else {
                // Women product
                $pictures = glob(public_path().'/images/femmes/*');
                $pictureRNG = $pictures[array_rand($pictures)];
            }

            $product->picture = basename($pictureRNG);
            $product->save();
        });
    }
}
