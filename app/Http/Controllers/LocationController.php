<?php

namespace App\Http\Controllers;

use App\Http\Requests\storelocation;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::where('provider_id',Auth()->user()->id)->get();
        return view('page.location',compact('locations'));
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
    public function store(storelocation $request)
    {
        // try{
            $validated = $request->validated();
            $x=Location::where('provider_id', auth()->user()->id )->count();
            if($x <= 4){
                $location=new Location();
                $location->provider_id = auth()->user()->id;
                $location->latitude = $request->latitude;
                $location->longitude = $request->longitude;
                $location->save();
                toastr()->success('location add successfully');
                return redirect()->route('location.index');
            }else{
                toastr()->error('it is allow 5 addresses only');
                return redirect()->route('location.index');
            }

        //  }
        //  catch (\Exception $e){
        //      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        //  }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
