<?php

use Illuminate\Database\Seeder;

class CreateProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert([
                'title' => 'produit 1',
                'slug' => 'produit-1',
                'summary' => 'le produit 1 avec une courte description',
                'description' => 'le produit 1 avec une longue fiche descriptif que sa soit service ou peut import',
                'photo' => 'NULL',
                'stock' => '10',
                'size' => 'NULL',
                'condition' =>'NULL',
                'status' =>'active',
                'price' => '100',
                'discount' =>'NULL',
                'is_featured' =>'NULL',
                'cat_id' =>'1',
                'child_cat_id' =>'1',
                'brand_id' =>'1',
                ]);
        \DB::table('products')->insert([
                'title' => 'produit 2',
                'slug' => 'produit-2',
                'summary' => 'le produit 2 avec une courte description',
                'description' => 'le produit 2 avec une longue fiche descriptif que sa soit service ou peut import',
                'photo' => 'NULL',
                'stock' => '10',
                'size' => 'NULL',
                'condition' =>'NULL',
                'status' =>'active',
                'price' => '100',
                'discount' =>'NULL',
                'is_featured' =>'NULL',
                'cat_id' =>'1',
                'child_cat_id' =>'1',
                'brand_id' =>'1',
        ]);
        \DB::table('products')->insert([
                'title' => 'produit 3',
                'slug' => 'produit-3',
                'summary' => 'le produit 3 avec une courte description',
                'description' => 'le produit 3 avec une longue fiche descriptif que sa soit service ou peut import',
                'photo' => 'NULL',
                'stock' => '10',
                'size' => 'NULL',
                'condition' =>'NULL',
                'status' =>'active',
                'price' => '100',
                'discount' =>'NULL',
                'is_featured' =>'NULL',
                'cat_id' =>'1',
                'child_cat_id' =>'1',
                'brand_id' =>'1',
                ]);

    }
}
