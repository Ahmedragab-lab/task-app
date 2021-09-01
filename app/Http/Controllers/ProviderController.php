<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeuser;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = User::where('admin' , '2')->get();
        return view('page.provider',compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeuser $request )
    {
        try{
            $validated = $request->validated();
            $user=new User();
            $user->admin = intval($request->admin);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request['password']);
            $user->user_name = $request->user_name;
            $user->save();
            toastr()->success('provider add successfully');
            return redirect()->route('provider.index');

         }
         catch (\Exception $e){
             return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }


    public function edit(Provider $provider)
    {
        //
    }


    public function update(Request $request, Provider $provider)
    {
        //
    }

   
    public function destroy(Provider $provider)
    {
        //
    }
}
