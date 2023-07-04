<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Companies extends Model
{
    use HasFactory;

    public function getCompaniesList()
    {
        $companiesLists = DB::table('companies')->get();

        \Log::debug($companiesLists);
        return $companiesLists;
    }

    //protected $table = 'companies';
    //protected $keyType = 'string';

    // public function products(){
    //     return $this->hasMany(Products::class);
    // }

    /*public function serect(){
        $product = Products::find('company_id');
        $company = $product->showCompanies;
    }*/

    /*public function reration(){
        $companies = Companies::find(1);
        $products = $companies->products; // ユーザーの全ての投稿データを取得
    }*/

    /*public function getCompaniesId(){
        $companiesId = DB::table('companies')->select('id')->get();
        return $companiesId;
    }*/

}
