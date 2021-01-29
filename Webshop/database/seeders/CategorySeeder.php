<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Creating categories from \database\seeders\CategorySeeder');

        \DB::table('categories')->insert(['name' => 'Ebooks', 'image_url' => 'https://via.placeholder.com/150']);
        \DB::table('categories')->insert(['name' => 'Thrillers', 'image_url' => 'https://via.placeholder.com/150']);
        \DB::table('categories')->insert(['name' => 'Biography', 'image_url' => 'https://via.placeholder.com/150']);
        \DB::table('categories')->insert(['name' => 'Study', 'image_url' => 'https://via.placeholder.com/150']);
        \DB::table('categories')->insert(['name' => 'E-readers', 'image_url' => 'https://via.placeholder.com/150']);
    }
}
