<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SaleModel extends Model
{
	//購入処理api
	/*public function buyApi($data){

		//var_dump($data);

		$productsName = $data['name'];

		return[
			'value' => $productsName,
		];
	}*/

	/*public $products;

	public function __construct() {
			// コンストラクタでプロパティを初期化
			$this->$products = 0;
	}*/

	/*public function getLists(){
		$this->products = DB::table('products')
			->select('id','product_name')
			->get();
			return $products;
	}*/


	public function buyProducts(){
		return $this->belongsTo(product::class);
	}

	/*public function addSales($formData){

		$productsId = [];
		$count = count($formData);

		for($i = 1; $i <= $count; $i++){
			if($formData == $products->product_name){
				$productsId[] = $this->products->id;
			}
		}
		
		DB::table('sales')
				->insert([
						'product_id' => 1,
				]);
	}*/
}
