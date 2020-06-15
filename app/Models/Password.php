<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Password extends Model
{
    protected $fillable = [
        'name', 'surname', 'series','number','organ',
    ];

    public function getPassports()
    {
        return DB::table('passwords')
         ->orderByDesc('id')
         ->get();
    }
}
