<?php

namespace App\Http\Controllers;

use App\Models\OperationModel;
use App\Models\SaleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
	//
	public function buyProducts(Request $request){

		$input = $request->all();
		$product_id = $input['product_id'];
		
		DB::beginTransaction();
		
		try{
			//var_dump($product_id);

			$salesModel = new SaleModel();
			$getProduct = $salesModel->getProduct($product_id);
			$getStock = $salesModel->getStock($product_id);
			//$decrement = $salesModel->decrement($product_id);

			if($getProduct->isEmpty()){
				return response()->json(['massage' => '商品が見つかりません']);
			}

			if($getStock == 0){
				return response()->json(['massage' => '在庫不足']);
			}

			$salesModel->decrementStock($product_id);
			$salesModel->addSalesTable($product_id);

			DB::commit();

			return response()->json(['massage' => '購入完了']);
	
		} catch (\Exception $e) {
			DB::rollback();

			return response()->json(['error' => $product_id]);
		}
	}
}
