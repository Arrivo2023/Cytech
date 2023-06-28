<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Products;
use App\Models\Companies;
use App\Models\Sales;
use Illuminate\Support\Facades\DB;

class SarchController extends Controller
{
	public function index(Request $request){
		$keyword = $request->input('keyword');
		$company = $request->input('companies');

		$productId = $request->input('productId');
    $productName = $request->input('productName');
    $companyName = $request->input('companyName');
    $productPrice = $request->input('productPrice');
    $productStock = $request->input('stock');
    $productComment = $request->input('comment');

		$items = [
			$productId,
			$productName,
			$companyName,
			$productPrice,
			$productStock,
			$productComment
		];

		$productsModel = new Products();
		$query = $productsModel->getList();

		$companiesModel = new Companies();
		$companies = $companiesModel->getCompaniesList();
		
		if($keyword && $company!="会社名"){
			$query->where('product_name', 'LIKE', "%$keyword%")
				->where('companies.company_name', '=', "$company");
			}elseif($keyword){
				$query->where('product_name', 'LIKE', "%$keyword%");
			}elseif($company){
				$query->where('companies.company_name', '=', "$company");
			}
			$products = $query->get();
			
			return view('sarch_index', compact('products', 'companies'));
			
		if(isset($_POST['updateBtn'])){
			$update = $productsModel->itemUpdate(
				$productId,
				$productName,
				$productPrice,
				$productStock,
				$productComment
			);
		}
	}


			//$update = $productsModel->update();
			//$idNumber = $_POST['productId'];

		/*	DB::beginTransaction();

    try {
        // 登録処理呼び出し
        //$model = new products();
        //$model->update($request);
				$idNumber = $_POST['productId'];
				$update = $productsModel->update($items, $idNumber);
        DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        return back();
    }*/
}
