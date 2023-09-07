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
		//var_dump($input);
		
		DB::beginTransaction();

		try{
			$product_id = $input['product_id'];
			//$product_id = $request->input('product_id');
			var_dump($product_id);
			//$product = Product::find($product_id);
			$product = DB::table('products')
			->select('id','product_name','stock')
			->where('id',$product_id)
			->get();
			
			$product_stock = DB::table('products')
			->select('stock')
			->where('id',$product_id)
			->value('stock');

			var_dump($product);

			if($product->isEmpty()){
				return response()->json(['massage' => '商品が見つかりません']);
			}

			if($product_stock<1){
				//DB::rollback();
				return response()->json(['massage' => '在庫不足']);
			}

			$stock = 1;
			DB::table('products')
			->where('id', $product_id)
			->decrement('stock', $stock);

			DB::commit();

			return response()->json(['massage' => '購入完了']);
	
		} catch (\Exception $e) {
			DB::rollback();

			return response()->json(['error' => $product_id]);
		}
	}







		//$input = $request->all();

		/*DB::beginTransaction();

		try {
			$model = new OperationModel();
			$getList = $model->getList();
			$model->buyApi($request,$getList);
			DB::commit();
		} catch (\Exception $e) {
			\Log::debug($e->getMessage());
			DB::rollback();

			return back();
		}*/

		//dd($request);

		//$operationModel = new OperationModel();
		//$saleModel = new SaleModel();
		//$getList = $operationModel->getList();
		//$result = $saleModel->buyApi($input);
		//$productsName = $result['value'];
		//$getLists = $saleModel->getLists();
		//$addTable = $saleModel->addSales($productsName);

		/*return response()->json([
			'productsName' => $productsName,
		]);*/


		/*if($value1 && $value2 && $value3 && $value4){
			return response()->json([
			'value1' => $value1,
			'value2' => $value2,
			'value3' => $value3,
			'value4' => $value4,
		]);
		}elseif($value1 && $value2 && $value3){
			return response()->json([
				'value1' => $value1,
				'value2' => $value2,
				'value3' => $value3,
			]);
		}*/

	public function apiHello(Request $request)
	{
		return response()->json(
			[
				'morning' => $request->input('morning'),
				'noon' => $request->input('noon'),
			]
		);
	}
}
