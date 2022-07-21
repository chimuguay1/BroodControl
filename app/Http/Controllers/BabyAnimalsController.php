<?php

namespace App\Http\Controllers;

use App\Models\BabyAnimals;
use App\Models\Provider;
use App\Models\Sensors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BabyAnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $babyAnimals = BabyAnimals::where('user_id', auth()->user()->id)->get();
        return view('BabyAnimals.index', compact('babyAnimals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::where('user_id', auth()->user()->id)->get();
        return view('BabyAnimals.create', compact('providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'provider_id' => 'required',
                'date' => 'required',
                'weight' => 'required',
                'cost' => 'required',
                'name' => 'required',
                'description' => 'required'
            ]);

            BabyAnimals::create([
                'user_id' => Auth::user()->id,
                'provider_id' => $request->provider_id,
                'date' => $request->date,
                'weight' => $request->weight,
                'cost' => $request->cost,
                'name' => $request->name,
                'description' => $request->description
            ]);

            return redirect('babyAnimals')->with('message', __('babyAnimal added successfully'));
        } catch (\Exception $e) {
            return redirect('babyAnimals')->with('message', __('Error adding babyAnimal'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BabyAnimals  $babyAnimals
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BabyAnimals  $babyAnimals
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $babyAnimal = BabyAnimals::find($id);
        $providers = Provider::where('user_id', auth()->user()->id)->get();
        return view('BabyAnimals.edit', compact('babyAnimal', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BabyAnimals  $babyAnimals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'provider_id' => 'required',
                'date' => 'required',
                'weight' => 'required',
                'cost' => 'required',
                'name' => 'required',
                'description' => 'required'
            ]);


            $babyAnimals = BabyAnimals::find($id);
            $babyAnimals->update([
                'provider_id' => $request->provider_id,
                'date' => $request->date,
                'weight' => $request->weight,
                'cost' => $request->cost,
                'name' => $request->name,
                'description' => $request->description
            ]);

            return redirect('babyAnimals')->with('message', __('babyAnimal Updated Successfully'));
        } catch (\Exception $e) {
            return redirect('babyAnimals')->with('message', __('Error updating babyAnimal'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BabyAnimals  $babyAnimals
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $babyAnimal = BabyAnimals::find($id);
            $babyAnimal->delete();
            return redirect('babyAnimals')->with('message', __('babyAnimal deleted successfully'));
        } catch (\Exception $e) {
            return redirect('babyAnimals')->with('message', __('Error deleted babyAnimal'));
        }
    }

    public function clasificationHealthy(){
        $sensors = Sensors::where('user_id', auth()->user()->id)->get();
        return view('BabyAnimals.clasificationHealthy', compact('sensors'));
    }

    public function clasificationSick(){
        $sensors = Sensors::where('user_id', auth()->user()->id)->get();
        return view('BabyAnimals.clasificationSick', compact('sensors'));
    }
}
