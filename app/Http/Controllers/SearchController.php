<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
//    public function Search(Request $request)
//    {
//        return DB::table('passwords')
//            ->where('name','like', '%' .$name)
////        $result=[];
////        foreach ($request as $value) {
////        if(value)
////        {
////            $search = DB::table('passwords')
//////                ->where(function($query) use ($value) {
//////                    $query->where('surname', 'like', '%' . $value . '%')
//////                        ->orWhere('name', 'like', '%' . $value . '%');
//////                })
////                ->where('date_start','<=',$data['date_end'])
////                ->where('date_end','>=',$data['date_start'])
////                ->get()
////                ->toArray();
////        }
//
//        return $result;
//        }

    public function search(Request $request){

       return $search = Passports::where('surname',$request['suname']?'=':'<>',$request['surname'])
            ->where('name',$request['name']?'=':'<>',$request['name'])
            ->where('series',$request['series']?'=':'<>',$request['series'])
            ->where('number',$request['number']?'=':'<>',$request['number'])
            ->where('organ',$request['organ']?'=':'<>',$request['organ'])
            ->get();

    }
}

