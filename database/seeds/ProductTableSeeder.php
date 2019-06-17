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
            $sizeXS = rand(0,100);
            $sizeS = rand(0,100);
            $sizeM = rand(0,100);
            $sizeL = rand(0,100);
            $sizeXL = rand(0,100);

            $size = "";

            if($sizeXS >= 50) {
                $size .= "XS";
            }
            if($sizeS >= 50) {
                if ( strlen($size) >= 1 ) $size .= ",";
                $size .= "S";
            }
            if($sizeM >= 50) {
                if ( strlen($size) >= 1 ) $size .= ",";
                $size .= "M";
            }
            if($sizeL >= 50) {
                if ( strlen($size) >= 1 ) $size .= ",";
                $size .= "L";
            }
            if($sizeXL >= 50) {
                if ( strlen($size) >= 1 ) $size .= ",";
                $size .= "XL";
            }
            if ( strlen($size) < 1 ) $size == "M";

            $product->size = $size;

            // Choose the categorie randomly
            // The rand need to be update if you add or remove some categorie
            $categorieRNG = rand(1,2);
            $categorie = App\Categorie::find($categorieRNG);

            $product->categorie()->associate($categorie);

            /*
             * In my case : 
             *  - 1 => 'Homme'
             *  - 2 => 'Femme'
             */ 
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
