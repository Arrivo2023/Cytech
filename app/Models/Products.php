<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getList()
    {
        $products = DB::table('products')
            ->join('companies', 'company_id', '=', 'companies.id')
            ->select('products.*', 'companies.company_name');
        //->get();
        return $products;
    }

    /*public function itemUpdate(
        //$productId,
        $productName,
        $productPrice,
        $productStock,
        //$productComment
    ) {
        DB::table('products')
            ->where('id', $updateId)
            ->update([
                'product_name' => $updateName,
                'product_price' => $updatePrice,
                'stock' => $updateStock,
                'comment' => $updateComment,
            ]);
    }*/
}
