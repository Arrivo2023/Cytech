<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SaleModel extends Model
{
	//購入処理api
	public function buyApi($data){

		//var_dump($data);

		//$key = $data->input('key');
		$value1 = $data['レモンティー'];
		$value2 = $data['ミルクティー'];
		$value3 = $data['コーヒー'];
		$value4 = $data['天然水'];

		//var_dump($value);

		return[
			//'key' => $key,
			'value1' => $value1,
			'value2' => $value2,
			'value3' => $value3,
			'value4' => $value4,
		];


		/*DB::table('sales')
				->insert([
						'product_id' => $data->input(''),
				]);*/
	}
}
