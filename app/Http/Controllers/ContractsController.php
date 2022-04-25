<?php

namespace App\Http\Controllers;

use App\Car;
use App\Client;
use App\Contract;
use App\Status;
use App\User;
use PDF;
use Illuminate\Http\Request;


class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
        $contractss = Contract::withTrashed()->get();  
        $cars = Car::all();
        $contracts =  Contract::all();
        $clients = Client::all();
        $users = User::all();


        return view('contracts.index', compact('clients', 'users', 'cars', 'contracts','contractss'));
    }
    public function restore($id)
    {

        $contracts = Contract::withTrashed()->find($id)->restore();
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contracts =  Contract::all();
        $clients = Client::all();
        $users = User::all();
        $cars = Car::all();
        $statuses = Status::all();
        return view('contracts.add', compact('clients', 'users', 'cars', 'contracts','statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contracts = new Contract();
        $contracts->id_client = $request->id_client;
        $contracts->id_user = $request->id_user;
        $contracts->id_car = $request->id_car;
        $contracts->debut_contract = $request->debut_contract;
        $contracts->end_contract = $request->end_contract;
        
        $contracts->amount = $request->amount;
        $contracts->save();
        return redirect('/')->with('success', 'contrat a été bien ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contractss = Contract::find($id);
        $clients = Client::all();
        $users = User::all();
        $cars = Car::all();
        $contracts = Contract::all();




        return view('contracts.show', compact('clients', 'users', 'cars', 'contracts', 'contractss'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contracts = Contract::findOrFail($id);
        $clients = Client::all();
        $users = User::all();
        $cars = Car::all();

        return view('contracts.edit', compact('clients', 'users', 'cars', 'contracts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contracts = Contract::findOrFail($id);

        $contracts->id_client = $request->id_client;
        $contracts->id_user = $request->id_user;
        $contracts->id_car = $request->id_car;
        $contracts->debut_contract = $request->debut_contract;
        $contracts->end_contract = $request->end_contract;
        
        $contracts->amount = $request->amount;
        $contracts->update();
        return redirect('/contracts')->with('success', 'contrat a été  modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contracts = Contract::find($id);
        $contracts->delete();

        return redirect()->back()->with('success', 'Contrat est supprimer');
    }
    public function search()
    {
        $search_text = $_GET['query'];
        $clients = Client::where('cin', 'LIKE', '%' . $search_text . '%')->get();

        return view('contracts.search', compact('clients'));
    }
    public function generatePDF($id)
    {
        $contractss = Contract::find($id);
        $clients = Client::all();
        $users = User::all();
        $cars = Car::all();
        $contracts = Contract::all();
        view()->share('contractss', $contractss);
        $pdf = PDF::loadView('contracts.pdf', [$contractss, $cars, $clients, $users, $contracts]);
        return $pdf->download("pdf_file.pdf");
    }
}
