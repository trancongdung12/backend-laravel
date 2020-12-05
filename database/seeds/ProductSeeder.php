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
                "image"=>"https://cf.shopee.vn/file/46469a35fbcf8d659b5842940396843b",
                "price"=>$faker->numberBetween($min = 1000000, $max = 2000000),
                "quantity"=>$faker->numberBetween(1,50),
                "description"=>$faker->text,
                ]);
        }
        for($i=0; $i<7; $i++){
            DB::table('products')->insert([
                "name"=>"GIÀY CONVERSE ".$i,
                "category_id"=>2,
                "image"=>"https://www.converse.com.vn/pictures/catalog/products/women-ho18.png",
                "price"=>$faker->numberBetween($min = 1000000, $max = 2000000),
                "quantity"=>$faker->numberBetween(1,50),
                "description"=>$faker->text,
                ]);
        }
        for($i=0; $i<6; $i++){
            DB::table('products')->insert([
                "name"=>"GIÀY ADIDAS ".$i,
                "category_id"=>3,
                "image"=>"https://i.pinimg.com/originals/31/69/ce/3169ce25074e99b427b71fa68315a431.png",
                "price"=>$faker->numberBetween($min = 1000000, $max = 2000000),
                "quantity"=>$faker->numberBetween(1,50),
                "description"=>$faker->text,
                ]);
        }
        for($i=0; $i<5; $i++){
            DB::table('products')->insert([
                "name"=>"GIÀY VANS ".$i,
                "category_id"=>4,
                "image"=>"https://product.hstatic.net/1000296292/product/167139_00.png_8fdd24f1b07848fb84495dced8fa6c1d_master.png",
                "price"=>$faker->numberBetween($min = 1000000, $max = 2000000),
                "quantity"=>$faker->numberBetween(1,50),
                "description"=>$faker->text,
                ]);
        }
    }
}
