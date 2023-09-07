<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SaleModel extends Model
{

	public function getProduct($product_id){
		return DB::table('products')
				->select('id','product_name','stock')
				->where('id',$product_id)
				->get();
	}
				
	public function getStock($product_id){
		return DB::table('products')
			->select('stock')
			->where('id',$product_id)
			->value('stock');
	}

	public function decrementStock($product_id){
		$stock = 1;
		DB::table('products')
			->where('id', $product_id)
			->decrement('stock', $stock);
	}

	public function addSalesTable($product_id){
		DB::table('sales')
			->insert([
				'product_id' => $product_id,
				'created_at' => now(),
				'updated_at' => now()
		]);
	}

}
