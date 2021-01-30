<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->command->info('Creating Products from \database\seeders\ProductSeeder');

        \DB::table('products')->insert(['category_id' => 1, 'price' => 3.99, 'name' => 'e-book: the art of desception', 'image_url' => 'https://via.placeholder.com/150', 'description' => 'Lorem ipsum']);
        \DB::table('products')->insert(['category_id' => 2, 'price' => 4.99, 'name' => 'thriller: the 100', 'image_url' => 'https://via.placeholder.com/150', 'description' => 'Lorem ipsum']);
        \DB::table('products')->insert(['category_id' => 3, 'price' => 2.99, 'name' => 'bio: Mark Zuckerberg', 'image_url' => 'https://via.placeholder.com/150', 'description' => 'Lorem ipsum']);
        \DB::table('products')->insert(['category_id' => 4, 'price' => 6.99, 'name' => 'studie: design patterns in software engineering', 'image_url' => 'https://via.placeholder.com/150', 'description' => 'Lorem ipsum']);
        \DB::table('products')->insert(['category_id' => 5, 'price' => 4.99, 'name' => 'e-reader: KoBo H2O', 'image_url' => 'https://via.placeholder.com/150', 'description' => 'Lorem ipsum']);
    }
}
