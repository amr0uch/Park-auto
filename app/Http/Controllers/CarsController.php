<?php

namespace App\Http\Controllers;

use App\Alert;
use App\Car;
use App\CarAlert;
use App\Contract;
use App\Status;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();
        $cars = Car::all();
        $alerts = Alert::all();
        $carses = CarAlert::all();

        return view('cars.index', compact('cars', 'statuses','alerts','carses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alerts = Alert:: all();
        $statuses = Status::get();
        $cars = Car::all();
        return view('cars.add', compact('cars', 'statuses','alerts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Car([


            'id_status' => $request->get('id_status'),
            'registration' => $request->get('registration'),
            'model' => $request->get('model'),
            'color' => $request->get('color'),
            'fuel' => $request->get('fuel'),
            'doors_num' => $request->get('doors_num'),
            'passengers_num' => $request->get('passengers_num'),
            'price_day' => $request->get('price_day'),

        ]);
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $file->move(public_path() . '/images/', $name);
        $data->file = $name;
        $data->save();
        
        
        foreach ($request->id_alert as $key => $value) {
            if (!is_null($value)) {

                $carses = new CarAlert();
                $carses->id_car = $data->id;
                $carses->id_alert= $value;
                $carses->date = date_create($request->date[$key]);                
                $carses->save();
                
            }
        }
        // $carses = new CarAlert();

        // $carses-> id_car = $data->id;
        // $carses-> id_alert = $request->id_alert;
        // $carses-> date =$request->date ;
        // $carses->save();
        return redirect('/')->with('success', 'Voiture été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cars = Car::findOrFail($id);
        $statuses = Status::all();
        $alerts  = Alert::all();
        $carses = CarAlert::all();

        return view('cars.show', compact('cars','carses','alerts','statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alerts = Alert::all();
        $carses = CarAlert::all();
        $cars = Car::find($id);
        $statuses = Status::all();

        return view('cars.edit', compact('statuses', 'cars','carses','alerts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cars = Car::findOrFail($id);
        if ($request->has('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
            $cars->file = $name;
        }
        $cars->id_status = $request->id_status;
        $cars->registration = $request->registration;
        $cars->model = $request->model;
        $cars->color = $request->color;
        $cars->fuel = $request->fuel;
        $cars->doors_num = $request->doors_num;
        $cars->passengers_num = $request->passengers_num;
        $cars->price_day = $request->price_day;
        $cars->update();

        
         $carses = CarAlert::find($id);
         $carses-> id_car = $cars->id;
         $carses-> id_alert = $request->id_alert;
         $carses-> date =$request->date ;
         $carses->update();
        return redirect('/cars')->with('success', 'la modification du voiture a été bien effectuer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $cars=Car::find($id);
        if (Contract::where('id_car',$cars->id)->count()) {
           return redirect()->back()->with('status','Ne peut pas être supprimer, la voiture existe deja au contrat');
        }
        else {
            $cars->delete();
            return redirect()->back()->with('success','la voiture est supprimer');
        }
            // $cars = Car::find($id);
            // $cars->delete();
             

       
        
        
    }
    public function editop($id)
    {
         $carses = CarAlert::find($id);
         $alerts = Alert::all();
         $cars = Car::all();
        return view('cars.editopcar',compact('carses','cars','alerts'));
    }
    public function updateop(Request $request, $id)
    {
        // $carses = CarAlert::find($id);
        // $carses-> id_car = $request->id_car;
        // $carses-> id_alert = $request->id_alert;
        // $carses-> date =$request->date ;
        // $carses->update(); 
        // return redirect()->back()->with('success','la modification a éte bien effectuer');
        $cars=Car::all();
        foreach ($request->id_alert as $key => $value) {
            if (!is_null($value)) {
                
               
                $carses = CarAlert::findOrFail($id); 
                Car::where('id',$carses->id_car);
                  
                $carses->id_car= $carses->id_car;   
                $carses->id_alert= $value;
                $carses->date = date_create($request->date[$key]);                
                $carses->update();
         return redirect()->back()->with('success', 'operation du voiture a été bien modifier', compact('cars'));
            }
        }
    }
    public function delete($id)
    {
        $carses = CarAlert::find($id);
        $cars = Car::all();
        $carses->delete();

        return redirect()->back()->with('warning','Operation a été supprimée');
    }
    public function createop($id)
    {
        $carses = CarAlert::get();
        $alerts = Alert:: all();
        $statuses = Status::get();
        $cars = Car::find($id);
        return view('cars.addopcar', compact('cars', 'statuses','alerts','carses'));
    }
    public function storeop(Request $request)
    {
        $carses = new CarAlert(); 
        $carses->id_car = $request->id_car;         
        $carses->id_alert= $request->id_alert;
        $carses->date = $request->date; 
        
        if ($carses->save()) {
            return redirect()->back()->with('success', 'operation du voiture a été bien est ajoute');   
        }

        // msg error 
        return redirect()->back()->with('error', 'Operation du voiture n été pas supprimer');
        
    }
}   