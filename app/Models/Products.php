<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Companies;

class Products extends Model
{
    //use HasFactory;
    
    /*protected $table = 'products';
    protected $fillable = 
    [
        'company_id',
        'product_name',
        'praice',
        'stock',
        'comment',
        'img_path',
    ];*/

    public function getList(){
        $products = DB::table('products')
        ->join('companies', 'company_id', '=', 'companies.id')
        ->select('products.*', 'companies.company_name');
        //->get();
        return $products;
    }

    public function itemUpdate(
			$productId,
			$productName,
			$productPrice,
			$productStock,
			$productComment
		){
			DB::table('products')
			->where('id', $productId)
			->update([
				'productName' => $productName,
				'productPrice' => $productPrice,
				'stock' => $productStock,
				'comment' => $productComment
				]);
	}

    /*public function update($deta, $idNumber){
        DB::table('products')
        ->join('companies', 'company_id', '=', 'companies.id')
        ->where('id', $idNumber)
        ->insert([
            //'product_name' => $deta->productName,
            //'company_name' => $deta->companyName,
            //'price' => $deta->price,
            //'stock' => $deta->stock,
            //'comment' => $deta->comment,
            'price' => $deta,
            'stock' => $deta,
            'comment' => $deta,
        ]);
        //->update('products.*', 'companies.company_name');
        //->get();
        //return $products;
    }*/
}
