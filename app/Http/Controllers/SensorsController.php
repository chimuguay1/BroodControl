<?php

namespace App\Http\Controllers;

use App\Models\BabyAnimals;
use App\Models\Sensors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SensorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensors = Sensors::where('user_id', auth()->user()->id)->get();
        return view('Sensors.index', compact('sensors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $babyAnimals = BabyAnimals::where('user_id', auth()->user()->id)->get();
        return view('Sensors.create', compact('babyAnimals'));
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
                'babyAnimals_id' => 'required',
                'heartRate' => 'required',
                'bloodPressure' => 'required',
                'breathingFrequency' => 'required',
                'temperature' => 'required',
            ]);

            Sensors::create([
                'user_id' => Auth::user()->id,
                'babyAnimals_id' => $request->babyAnimals_id,
                'heartRate' => $request->heartRate,
                'bloodPressure' => $request->bloodPressure,
                'breathingFrequency' => $request->breathingFrequency,
                'temperature' => $request->temperature,
            ]);

            return redirect('sensors')->with('message', __('Sensor added successfully'));
        } catch (\Exception $e) {
            return redirect('sensors')->with('message', __('Error adding sensor'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sensors  $sensors
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sensors  $sensors
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $babyAnimals = BabyAnimals::where('user_id', auth()->user()->id)->get();
        $sensor = Sensors::find($id);
        return view('Sensors.edit', compact('sensor', 'babyAnimals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sensors  $sensors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'heartRate' => 'required',
                'bloodPressure' => 'required',
                'breathingFrequency' => 'required',
                'temperature' => 'required',
            ]);

            $sensor = Sensors::find($id);
            $sensor->update([
                'heartRate' => $request->heartRate,
                'bloodPressure' => $request->bloodPressure,
                'breathingFrequency' => $request->breathingFrequency,
                'temperature' => $request->temperature,
            ]);

            return redirect('sensors')->with('message', __('sensor Updated Successfully'));
        } catch (\Exception $e) {
            return redirect('sensors')->with('message', __('Error updating sensor'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sensors  $sensors
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $sensor = Sensors::find($id);
            $sensor->delete();
            return redirect('sensors')->with('message', __('sensor deleted successfully'));
        } catch (\Exception $e) {
            return redirect('sensors')->with('message', __('Error deleted sensor'));
        }
    }
}
