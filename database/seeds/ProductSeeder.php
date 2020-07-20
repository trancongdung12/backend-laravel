<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<15; $i++){
            DB::table('products')->insert([
                "name"=>$faker->name,
                "category_id"=>$faker->numberBetween(1,4),
                "image"=>"https://anchuongshoes.com/image/cache/catalog/MLB/giay-mld-boston-2-800x800.jpg",
                "price"=>$faker->numberBetween($min = 1000, $max = 9000),
                "quantity"=>$faker->numberBetween(1,50),
                "description"=>$faker->text,
 
            ]);
            }
    }
}
