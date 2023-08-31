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

		//dd($request);

		$input = $request->all();

		//var_dump("あいうえお");
		//\Log::info('Received key: ' . $request->input('key'));
    //\Log::info('Received value: ' . $request->input('value'));

		$model = new SaleModel();
		//$getList = $model->getList();
		$result = $model->buyApi($input);
		//$key = $result['key'];
		$value1 = $result['value1'];
		$value2 = $result['value2'];
		$value3 = $result['value3'];
		$value4 = $result['value4'];

		return response()->json([
			//'key' => $key,
			'value1' => $value1,
			'value2' => $value2,
			'value3' => $value3,
			'value4' => $value4,
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
