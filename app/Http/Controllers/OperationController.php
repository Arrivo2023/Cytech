<?php

namespace App\Http\Controllers;

use App\Models\OperationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperationController extends Controller
{
    public function register(Request $request)
    {
        // トランザクション開始
        DB::beginTransaction();

        try {
            // 登録処理呼び出し
            $model = new OperationModel();
            $model->itemUpdate($request);
            DB::commit();
        } catch (\Exception $e) {
            \Log::debug($e->getMessage());
            DB::rollback();

            return back();
        }

        // 処理が完了したらregistにリダイレクト
        return redirect(route('index'));
				
    }
    public function update(Request $request)
    {
        // トランザクション開始
        DB::beginTransaction();

        try {
            // 登録処理呼び出し
            $model = new OperationModel();
            $model->itemUpdate($request);
            DB::commit();
        } catch (\Exception $e) {
            \Log::debug($e->getMessage());
            DB::rollback();

            return back();
        }

        // 処理が完了したらregistにリダイレクト
        return redirect(route('index'));
				
    }
}
