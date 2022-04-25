<?php

namespace App\Http\Controllers;

use App\Alert;
use Illuminate\Http\Request;

class AlertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alerts=Alert::all();
        return view('alerts.index',compact('alerts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alerts=Alert::all();
        return view('alerts.add',compact('alerts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alerts= new Alert();
        $alerts->label = $request->label;
        $alerts->save();
        return redirect('/')->with('success','Operation est ajouter');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function show(Alert $alert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $alerts=Alert::findOrFail($id);
        return view('alerts.edit',compact('alerts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alerts=Alert::findOrFail($id);
        $alerts->label = $request->input('label');
        $alerts->update();
        return redirect('/alerts')->with('success','Operation a été bien modifier');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alert  $alert
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alerts= Alert::find($id);
        $alerts->delete();

        return redirect('/')->with('error', 'Operation a été supprimer');
    }
}
