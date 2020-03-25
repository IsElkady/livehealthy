<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'=>'Set pure honey',
            'slug'=>'set-pure-honey',
            'details'=>'some lorem ipsum goes here',
            'price'=>'499.99',
            'description'=>'Lorem ipsum dolor sit amet, conscteture adipisicing elit.',

        ]);
        Product::create([
            'name'=>'Orange Blossom Honey',
            'slug'=>'orange-blossom-honey',
            'details'=>'some lorem ipsum goes here',
            'price'=>'99.99',
            'description'=>'Lorem ipsum dolor sit amet, conscteture adipisicing elit.',
        ]);
        Product::create([
            'name'=>'Natural Acacia Honey',
            'slug'=>'Natural-Acacia-Honey',
            'details'=>'some lorem ipsum goes here',
            'price'=>'199.99',
            'description'=>'Lorem ipsum dolor sit amet, conscteture adipisicing elit.',
        ]);

        Product::create([
            'name'=>'Natural Herbs Honey',
            'slug'=>'Natural-Herbs-Honey',
            'details'=>'some lorem ipsum goes here',
            'price'=>'399.99',
            'description'=>'Lorem ipsum dolor sit amet, conscteture adipisicing elit.',
        ]);
        Product::create([
            'name'=>'Natural Forest Honey',
            'slug'=>'Natural-Forest-Honey',
            'details'=>'some lorem ipsum goes here',
            'price'=>'699.99',
            'description'=>'Lorem ipsum dolor sit amet, conscteture adipisicing elit.',
        ]);
        Product::create([
            'name'=>'Natural Mountain Honey',
            'slug'=>'Natural-Mountain-Honey',
            'details'=>'some lorem ipsum goes here',
            'price'=>'299.99',
            'description'=>'Lorem ipsum dolor sit amet, conscteture adipisicing elit.',
        ]);
    }
}
