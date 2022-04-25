<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();
        return view('statuses.index',compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        return view('statuses.add',compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $statuses= new Status();
        // $statuses->label = $request->label;
        // $statuses->slug = $request->slug;
        $statuses= new Status([
            "label" =>$request->label,
            "slug" => Str::slug($request->label),
        ]);
        
        $statuses->save();
        return redirect('/')->with('success','status est ajouter');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statuses=Status::findOrFail($id);
        return view('statuses.show',compact('statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statuses=Status::findOrFail($id);
        return view('statuses.edit',compact('statuses'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $statuses=Status::findOrFail($id);
        $statuses->label = $request->input('label');
        $statuses->slug = Str::slug($request->label);
        // $statuses->label = $request->input('slug');
        $statuses->update();
        return redirect('/statuses')->with('warning','status est modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $statuses = Status::find($id);
        $statuses->delete();

        return redirect('/')->with('error', 'Status est supprimer');
 
    }
}
