<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\SarchModel;
use Illuminate\Http\Request;

class SarchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $company = $request->input('companies');

        /*$productId = $request->input('productId');
    $productName = $request->input('productName');
    $companyName = $request->input('companyName');
    $productPrice = $request->input('productPrice');
    $productStock = $request->input('stock');
    $productComment = $request->input('comment');*/

        $productsModel = new SarchModel();
        $query = $productsModel->getList();

        $companiesModel = new Companies();
        $companies = $companiesModel->getCompaniesList();

        if ($keyword && $company != '会社名') {
            $query->where('product_name', 'LIKE', "%$keyword%")
                ->where('companies.id', '=', "$company");
        } elseif ($keyword) {
            $query->where('product_name', 'LIKE', "%$keyword%");
        } elseif ($company) {
            $query->where('companies.id', '=', "$company");
        }
        $products = $query->get();

        return view('sarch_index', compact('products', 'companies'));
        
    }
}
