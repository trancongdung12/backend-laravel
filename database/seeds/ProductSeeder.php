<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<8; $i++){
            DB::table('products')->insert([
                "name"=>"GIÀY SNEAKER ".$i,
                "category_id"=>1,
                "image"=>"/storage/public/img_1.jpg",
                "price"=>$faker->numberBetween($min = 1000000, $max = 2000000),
                "quantity"=>$faker->numberBetween(1,50),
                "description"=>$faker->text,
                ]);
        }
        for($i=0; $i<7; $i++){
            DB::table('products')->insert([
                "name"=>"GIÀY CONVERSE ".$i,
                "category_id"=>2,
                "image"=>"/storage/public/img_2.jpg",
                "price"=>$faker->numberBetween($min = 1000000, $max = 2000000),
                "quantity"=>$faker->numberBetween(1,50),
                "description"=>$faker->text,
                ]);
        }
        for($i=0; $i<6; $i++){
            DB::table('products')->insert([
                "name"=>"GIÀY ADIDAS ".$i,
                "category_id"=>3,
                "image"=>"/storage/public/img_3.jpg",
                "price"=>$faker->numberBetween($min = 1000000, $max = 2000000),
                "quantity"=>$faker->numberBetween(1,50),
                "description"=>$faker->text,
                ]);
        }
        for($i=0; $i<5; $i++){
            DB::table('products')->insert([
                "name"=>"GIÀY VANS ".$i,
                "category_id"=>4,
                "image"=>"/storage/public/img_4.jpg",
                "price"=>$faker->numberBetween($min = 1000000, $max = 2000000),
                "quantity"=>$faker->numberBetween(1,50),
                "description"=>$faker->text,
                ]);
        }
    }
}
