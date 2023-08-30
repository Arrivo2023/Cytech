<?php

namespace App\Http\Controllers;

use App\Models\OperationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperationController extends Controller
{
    public function newRecord(Request $request)
    {

        DB::beginTransaction();

        try {
            $model = new OperationModel();
            $model->newRecord($request);
            DB::commit();
        } catch (\Exception $e) {
            \Log::debug($e->getMessage());
            DB::rollback();

            return back();
        }

        return redirect(route('index'));
    }

    public function update(Request $request)
    {
        DB::beginTransaction();

        try {
            $model = new OperationModel();
            $model->itemUpdate($request);
            DB::commit();
        } catch (\Exception $e) {
            \Log::debug($e->getMessage());
            DB::rollback();

            return back();
        }

        return redirect(route('index'));
    }

    public function itemDelete(Request $request)
    {
        DB::beginTransaction();

        try {
            $model = new OperationModel();
            $model->itemDelete($request);
            DB::commit();
        } catch (\Exception $e) {
            \Log::debug($e->getMessage());
            DB::rollback();

            return back();
        }

        return redirect(route('index'));
    }

}
