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
		
		\Log::info('Received key: ' . $request->input('key'));
    \Log::info('Received value: ' . $request->input('value'));

		$model = new SaleModel();
		//$getList = $model->getList();
		$result = $model->buyApi($request);
		$key = $result['key'];
		$value = $result['value'];

		return response()->json([
			'key' => $key,
			'value' => $value
		]);
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
