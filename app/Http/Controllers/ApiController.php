<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Stop;
use App\Models\Transport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function show(Request $request)
    {
        $t_name= trim($_POST['t_name']);
        $t_id = trim($_POST['t_id']);
        $oks = Stop::where('t_id', $t_id)->where('t_name', $t_name)->orderBy('number')->get();
        $tex = "";
        foreach($oks as $ok){
            $text = " " . $ok->name . " " . $ok->number . ", ";
            $tex = $tex . $text;
        }
        echo $tex;
    }
}
