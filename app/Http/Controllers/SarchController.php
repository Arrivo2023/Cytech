<?php

namespace App\Http\Controllers;

use App\Models\OperationModel;
use Illuminate\Http\Request;

class SarchController extends Controller
{
    ////一覧・検索処理
    public function index()
    {
        $OperationModel = new OperationModel();
        $products = $OperationModel->getList();
        $companies = $OperationModel->getCompaniesList();

        return view('sarch_index', compact('products', 'companies'));
    }
    
    public function ajaxIndex()
    {
        dd("test");
        $OperationModel = new OperationModel();
        $products = $OperationModel->getList();
        $companies = $OperationModel->getCompaniesList();

        return response()->json([
            'result' => $products
        ]);
    }


    ////一覧・検索処理
    public function sarchList(Request $request)
    {
        $OperationModel = new OperationModel();
        $products = $OperationModel->sarchList($request);
        $companies = $OperationModel->getCompaniesList();

        return view('sarch_index', compact('products', 'companies'));
    }
}
