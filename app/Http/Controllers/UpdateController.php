<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\SarchModel;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller

{
	/*public function upDate(Request $request){
		DB::beginTransaction();

		try {
			// 登録処理呼び出し
			DB::table('products')
			->where('id', $data->productId)
			->update([
				'product_name' => $data->productName,
				'product_price' => $data->Price,
				'stock' => $data->Stock,
				'comment' => $data->Comment
				]);
			//DB::commit();
		} catch (\Exception $e) {
				DB::rollback();
				return back();
		}

		// 処理が完了したらregistにリダイレクト
		return redirect(route('submit'));
	}*/
	public function update(Request $request){
    // 入力値の取得
    /*$updateId = $_POST['productId'];
    $updateName = $_POST['productName'];
    $updateprice = $_POST['price'];
    $updatestock = $_POST['stock'];
    $updateComment = $_POST['comment'];*/

     // トランザクション開始
 
		 DB::beginTransaction();

		try {
			// 登録処理呼び出し
			$model = new SarchModel();
			$model->itemUpdate($request);
			DB::commit();
		} catch (\Exception $e) {
				DB::rollback();
				return back();
		}

		// 処理が完了したらregistにリダイレクト
		return redirect(route('submit'));
	}
}
