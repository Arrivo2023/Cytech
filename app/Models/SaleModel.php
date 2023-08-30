<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SaleModel extends Model
{
	//購入処理api
	public function buyApi($data){
		$key = $data->input('key');
		$value = $data->input('value');

		return[
			'key' => $key,
			'value' => $value,
		];


		/*DB::table('sales')
				->insert([
						'product_id' => $data->input(''),
				]);*/
	}
}
