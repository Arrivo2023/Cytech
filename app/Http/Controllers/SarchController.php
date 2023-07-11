<?php

namespace App\Http\Controllers;

use App\Models\OperationModel;
use Illuminate\Http\Request;

class SarchController extends Controller
{
    ////一覧・検索処理
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $company = $request->input('companies');

        $OperationModel = new OperationModel();
        $query = $OperationModel->getList();
        $companies = $OperationModel->getCompaniesList();

        if ($keyword && $company != '会社名') {
            $query->where('product_name', 'LIKE', "%$keyword%")
                ->where('companies.id', '=', "$company");
        } elseif ($keyword) {
            $query->where('product_name', 'LIKE', "%$keyword%");
        } elseif ($company) {
            $query->where('companies.id', '=', "$company");
        }
        $products = $query->orderBy('products.id')->get();

        return view('sarch_index', compact('products', 'companies'));
    }
}
