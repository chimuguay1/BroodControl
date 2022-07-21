<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::where('user_id', auth()->user()->id)->get();
        return view('providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.create');
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
                'name' => 'required',
            ]);

            Provider::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
            ]);

            return redirect('providers')->with('message', __('Provider added successfully'));
        } catch (\Exception $e) {
            return redirect('providers')->with('message', __('Error updating provider'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = Provider::find($id);
        return view('providers.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required'
            ]);

            $provider = Provider::find($id);
            $provider->name = $request->name;
            $provider->save();

            return redirect('providers')->with('message', __('Provider Updated Successfully'));
        } catch (\Exception $e) {
            return redirect('providers')->with('message', __('Error updating Provider'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $provider = Provider::find($id);
            $provider->delete();
            return redirect('providers')->with('message', __('Provider deleted successfully'));
        } catch (\Exception $e) {
            return redirect('providers')->with('message', __('Error deleted Provider'));
        }
    }
}
