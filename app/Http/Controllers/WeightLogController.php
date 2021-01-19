<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\WeightLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Condition;
use App\Models\Patient;
use Carbon\Carbon;


class WeightLogController extends Controller
{
   function show($id){
    

     //降順で３０日分のデータ取得
    $logs = Condition::where('patient_id', $id)
              ->select('weight','created_at')
              ->orderBy('created_at', 'desc')
              ->take(30)->get();

        
    $weights= [];
    $days=[];

    foreach($logs as $log) {
        $weight = $log->weight;
        $weights[] = $weight;
        
        $day = $log->created_at;
        $dt = new Carbon($day);
        $test = $dt->toDateString();
        $days[] =$test;
       
    }  
        
        
		//Viewにログデータを渡す
		return view("weightlog.show",compact(
            'days',
            'weights'
        ));
    }
    
    
}