<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OperationModel extends Model
{
    //companiesテーブル取得
    public function getCompaniesList()
    {
        $companiesLists = DB::table('companies')->get();

        //\Log::debug($companiesLists);

        return $companiesLists;
    }

    //productsテーブル取得・companiesテーブルと紐付け
    //検索処理
    public function getList($data)
    {
        $keyword = $data->input('keyword');
        $company = $data->input('companies');

        $products = DB::table('products')
            ->join('companies', 'company_id', '=', 'companies.id')
            ->select('products.*', 'companies.id as companies_id', 'companies.company_name')
            ->orderBy('products.id');

            if ($keyword && $company != '会社名') {
                $products->where('product_name', 'LIKE', "%$keyword%")
                    ->where('companies.id', '=', "$company");
            } elseif ($keyword) {
                $products->where('product_name', 'LIKE', "%$keyword%");
            } elseif ($company) {
                $products->where('companies.id', '=', "$company");
            }
        $products = $products->get();
        
        return $products;
    }

    //新規登録処理
    public function newRecord($data)
    {
        //商品画像を取得 -> 一意のID生成 -> 保存　・　DBにpathを登録
        $file = $data->file('file');
        $filePath = null;
        $directory = 'storage/images';
        if ($file) {
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($directory, $fileName);
            $filePath = $directory.'/'.$fileName;
            \Log::debug($fileName);
        }

        DB::table('products')
            ->insert([
                'product_name' => $data->productName,
                'company_id' => $data->companyId,
                'price' => $data->price,
                'stock' => $data->stock,
                'comment' => $data->comment,
                'img_path' => $filePath,
            ]);
    }

    //更新処理
    public function itemUpdate($data)
    {
        //\Log::debug($data->toArray());

        //ファイルデータを取得
        $file = $data->file('file');
        $filePath = null;
        $directory = 'storage/images';
        $oldPath = DB::table('products')
            ->where('id', $data->productId)
            ->value('img_path');
        \Log::debug($oldPath);

        /*ファイルが送信されていれば、一意のIDを生成して$filePathにセット
        $directoryにファイルを保存し、古いファイルを削除*/
        //ファイルが送信されていなければ、現状のPathをセット
        if ($file) {
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($directory, $fileName);
            $filePath = $directory.'/'.$fileName;
            unlink($oldPath);
        } else {
            $filePath = $oldPath;
        }

        //データベースの更新
        DB::table('products')
            ->where('id', $data->productId)
            ->update([
                'product_name' => $data->productName,
                'company_id' => $data->companyId,
                'price' => $data->price,
                'stock' => $data->stock,
                'comment' => $data->comment,
                'img_path' => $filePath,
            ]);
    }

    //削除
    public function itemDelete($data)
    {
        //先にstorage/imagesの画像ファイルを削除
        $oldPath = DB::table('products')
            ->where('id', $data->productId)
            ->value('img_path');
        \Log::debug($oldPath);

        if (file_exists($oldPath)) {
            unlink($oldPath);
        }

        DB::table('products')
            ->where('id', $data->productId)
            ->delete();
    }
}
