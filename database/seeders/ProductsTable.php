<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'company_id' => '1',
                'product_name' => '香ばしい六条麦茶',
                'price' => '130',
                'stock' => '300',
                'comment' => 'test1',
                'img_path' => 'public\dr-strange.jpeg',
            ],
            [
                'company_id' => '2',
                'product_name' => 'レモンティー',
                'price' => '160',
                'stock' => '500',
                'comment' => 'test2',
                'img_path' => 'public\iron-man.jpeg',
            ],
        ]);
    }
}
