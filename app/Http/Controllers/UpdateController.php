<?php

namespace App\Http\Controllers;

use App\Models\SarchModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function update(Request $request)
    {
        // トランザクション開始
        DB::beginTransaction();

        try {
            // 登録処理呼び出し
            $model = new SarchModel();
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
