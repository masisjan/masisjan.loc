<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function show(Request $request)
    {
        $user_id = Auth::id();
        $table_id = trim($_POST['table_id']);
        $table_name = trim($_POST['table_name']);
        $id_post = trim($_POST['id_post']);
        $id_rating = trim($_POST['rating']);
        $refresh = trim($_POST['refresh']);
        if($user_id == null){
            echo 5;
            exit();
        }
        $ratings = Rating::where('id_user', $user_id)->where('id_table', $table_id)->latest();
        if($refresh == 1){
            $form = array(
                'id_user'      =>  $user_id,
                'id_table'     =>  $table_id,
                'id_post'      =>  $id_post,
                'rating'       =>  $id_rating,
            );
            $ratings->update($form);
            $velu = Rating::where('id_table', $table_id)->where('id_post', $id_post)->pluck('rating')->all();
            $v =  array_sum($velu) / count($velu);
            $v = round($v, 1);
            DB::table("$table_name")->where('id', $id_post)->update(['rating'   =>  $v]);
            echo "Ձեր գնահատականը հաջողությամբ փոփոխվել է";
        }elseif ($ratings->count() > 0){
            $date = Carbon::now()->subDays(5);
            $date = $date->toDateString() . " " . $date->toTimeString();
            $rat = Rating::where('id_user', $user_id)->where('id_table', $table_id)->where('updated_at', '>', $date)->latest();
            if($rat->count() > 0){
                echo "Դուք այս պահին չեք կարող գնահատել, վերջին գնահատականից պետք է անցնի 5 օր";
            }else{
                echo 1;
            }
        }else {
            $rating = new Rating;
            $form = array(
                'id_user'      =>  $user_id,
                'id_table'     =>  $table_id,
                'id_post'      =>  $id_post,
                'rating'       =>  $id_rating,
            );
            $rating = Rating::create($form);
            $velu = Rating::where('id_table', $table_id)->where('id_post', $id_post)->pluck('rating')->all();
            $v =  array_sum($velu) / count($velu);
            $v = round($v, 1);
            DB::table("$table_name")->where('id', $id_post)->update(['rating'   =>  $v]);
            echo "Ձեր գնահատականը հաջողությամբ նշանակվել է";
        }
    }
}
