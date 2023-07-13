<?php

namespace App\Http\Controllers;

use App\Models\OperationModel;
use Illuminate\Http\Request;

class SarchController extends Controller
{
    ////一覧・検索処理
    public function index(Request $request)
    {
        $OperationModel = new OperationModel();
        $products = $OperationModel->getList($request);
        $companies = $OperationModel->getCompaniesList();

        return view('sarch_index', compact('products', 'companies'));
    }
}
