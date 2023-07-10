<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OperationModel extends Model
{
    public function getList()
    {
        $products = DB::table('products')
            ->join('companies', 'company_id', '=', 'companies.id')
            ->select('products.*', 'companies.id as companies_id', 'companies.company_name');
        //->get();
        return $products;
    }

    public function newRecord($data)
    {
        \Log::debug($data->toArray());

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
                'img_path' => $filePath
            ]);
    }

    public function itemUpdate($data)
    {
        \Log::debug($data->toArray());

        //商品画像を取得 -> 一意のID生成 -> 保存　・　DBにpathを登録
        $file = $data->file('file');
        $filePath = null;
        $directory = 'storage/images';
        if ($file) {
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($directory, $fileName);
            $filePath = $directory.'/'.$fileName;
            \Log::debug($fileName);
        }else{
            $beforeFilePath = DB::table('products')
                ->where('id', $data->productId)
                ->select('img_path')
                ->get();
            $filePath = $beforeFilePath;
            \Log::debug($filePath);
        }
        \Log::debug($filePath);

        //$filePath = 'storage/images/example.jpg'; // 削除するファイルのパス

        /*if (file_exists($filePath)) {
            unlink($filePath); // ファイルを削除
        } else {
            // ファイルが存在しない場合の処理
            echo "ファイルが存在しません。";
        }*/

        \Log::debug($data->productId);
        DB::table('products')
            ->where('id', $data->productId)
            ->update([
                'product_name' => $data->productName,
                'company_id' => $data->companyId,
                'price' => $data->price,
                'stock' => $data->stock,
                'comment' => $data->comment,
                'img_path' => $filePath
                //'img_path' => $fileName
            ]);
    }

    public function itemDelete($data)
    {
        //\Log::debug($data->toArray());
        DB::table('products')
            ->where('id', $data->productId)
            ->delete();
    }
}
