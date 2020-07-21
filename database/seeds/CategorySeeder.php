<?php

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
        $category = array('GIÀY SNEAKER','GIÀY CONVERSE','GIÀY ADIDAS','GIÀY VANS');
        for($i = 0 ;$i<count($category);$i++){
        DB::table('categories')->insert([
            'name' =>$category[$i],
        ]);
        }
    }
}
