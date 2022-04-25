<?php

namespace App\Http\Controllers;

use App\Alert;
use App\Car;
use App\Entretien;
use Illuminate\Http\Request;

class EntretiensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        $alerts=Alert::all();
        $entretiens = Entretien::all();
        return view('entretiens.index',compact('cars','alerts','entretiens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
        $alerts=Alert::all();
        $entretiens = Entretien::all();
        return view('entretiens.add',compact('cars','alerts','entretiens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entretiens= new Entretien();
        $entretiens->car_id = $request->car_id;
        $entretiens->alert_id = $request->alert_id;
        $entretiens->date = $request->date;
        $entretiens->km = $request->km;

   
        $entretiens->save();
        return redirect('/')->with('success','contract est ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function show(Entretien $entretien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $cars=Car::all();
        $alerts=Alert::all();
        $entretiens=Entretien::findOrFail($id);
        return view('entretiens.edit',compact('entretiens','cars','alerts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $entretiens=Entretien::findOrFail($id);
        $entretiens->car_id = $request->car_id;
        $entretiens->alert_id = $request->alert_id;
        $entretiens->date = $request->date;
        $entretiens->km = $request->km;
  
        $entretiens->update();
        return redirect('/entretiens')->with('warning','entretien est modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entretiens = Entretien::find($id);
        $entretiens->delete();

        return redirect('/entretiens')->with('error', 'entretien est supprimer');
    }
}
