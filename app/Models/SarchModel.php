<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SarchModel extends Model
{
    public function getList()
    {
        $products = DB::table('products')
            ->join('companies', 'company_id', '=', 'companies.id')
            ->select('products.*', 'companies.company_name');
        //->get();
        return $products;
    }

    public function itemUpdate($data)
    {
			\Log::debug($data->toArray());
        DB::table('products')
            ->where('id', $data->productId)
            ->update([
                'product_name' => "おいこら！",
                'company_id' => $data->companyId,
                'price' => $data->price,
                'stock' => $data->stock,
                'comment' => $data->comment,
            ]);
    }
}
