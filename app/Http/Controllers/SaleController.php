<?php

namespace App\Http\Controllers;

use App\Models\OperationModel;
use App\Models\SaleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
	//
	public function buyApi(Request $request){
		
		$input = $request->all();

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

		$operationModel = new OperationModel();
		$saleModel = new SaleModel();
		//$getList = $operationModel->getList();
		$result = $saleModel->buyApi($input);
		$productsName = $result['value'];
		$getLists = $saleModel->getLists();
		$addTable = $saleModel->addSales($productsName);

		return response()->json([
			'productsName' => $productsName,
		]);


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

	}

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
