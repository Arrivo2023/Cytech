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
}
