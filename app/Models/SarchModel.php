<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Companies;

class SarchModel extends Model
{
    public function getList(){
        $products = DB::table('products')
        ->join('companies', 'company_id', '=', 'companies.id')
        ->select('products.*', 'companies.company_name');
        //->get();
        return $products;
    }

    public function itemUpdate($data){

			\Log::debug([$data, DB::table('products')->where('id', $data->productId)->get()]);
			DB::table('products')
			->where('id', $data->productId)
			->update([
				'products.product_name' => $data->productName,
				'products.company_id' => $data->companyId,
				'products.price' => $data->Price,
				'products.stock' => $data->stock,
				'products.comment' => $data->comment
				]);
	}
}
