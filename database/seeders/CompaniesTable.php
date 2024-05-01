<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'id' => '1',
                'company_name' => '株式会社テスト１',
                'street_address' => '日本',
                'representative_name' => 'あああ',
            ],
            [
                'id' => '2',
                'company_name' => '株式会社サンプル１',
                'street_address' => 'アメリカ',
                'representative_name' => 'Aaa',
            ],
        ]);
    }
}
