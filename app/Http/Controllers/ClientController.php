<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    public function index($user_name){

    //    $locations = Location::all();
       $users = User::all();
       $id = '';
       foreach( $users as $user){
           if($user->user_name == $user_name ){
             $id = $user->id;
           }
       }
       $locations = Location::where('provider_id',intval($id))->get();
       return view('page.client',compact('locations'));
    }

}
