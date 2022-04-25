<?php

namespace App\Http\Controllers;

use App\Client;
use App\Document;
use App\ClientDocument;
use App\Contract;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $documents = Document::all();

        $client_doc= ClientDocument::all();

        $clients= Client::all();


        return view('clients.index',compact('clients','documents','client_doc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $documents =Document::all();
        
        return view('clients.add',compact('documents','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $clients= new Client();

        $clients->first_name = $request->first_name;
        $clients->last_name = $request->last_name;
        $clients->address = $request->address;
        $clients->email = $request->email;
        $clients->telephone = $request->telephone;
        $clients->cin = $request->cin;
        $clients->permit = $request->permit;
        $clients->save();

        $files = $request->file;

        foreach ( $request->document_id as $index => $doc) {
            if(!is_null($doc)){
                $file = $files[$index];

                $client_doc= new ClientDocument();
                $client_doc-> id_client = $clients->id;
                $client_doc-> id_document = $doc;

                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $name);
                
                $client_doc->file = $name;
                $client_doc->save();
            }
    }

       // $clients->file = $name;

        return redirect()->route('clients.index')->with('success','client est ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients=Client::findOrFail($id);
        
        $client_doc = ClientDocument::find($id);
        $documents=Document::all();
      
        return view('clients.show',compact('clients','documents','client_doc'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients=Client::findOrFail($id);
        $documents = Document::all();
        return view('clients.edit',compact('clients','documents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $clients=Client::findOrFail($id);

        $clients->first_name = $request->input('first_name');
        $clients->last_name = $request->input('last_name');
        $clients->address = $request->input('address');
        $clients->email = $request->input('email');
        $clients->cin = $request->input('cin');
        $clients->permit = $request->input('permit');
        $clients->update();

        // foreach ( $request->document_id as $index => $doc) {
        //     if(!is_null($doc)){
        //         $file = $files[$index];
        //         $client_doc= new ClientDocument();
        //         $client_doc-> id_client = $clients->id;
        //         $client_doc-> id_document = $doc;

        //         $name = $file->getClientOriginalName();
        //         $file->move(public_path() . '/images/', $name);

        //         $client_doc->file = $name;
        //         $client_doc->update();
        //     } }
        return redirect()->route('clients.index')->with('success','client est modifier');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clients = Client::find($id);
        if (Contract::where('id_client',$clients->id)->count()) {
            return redirect()->back()->with('success','Ne peut pas être supprimer, le client existe deja au contrat');
         }
         else {
             $clients->delete();
             return redirect()->route('clients.index')->with('success','le client est supprimer');
         }

        // $clients = Client::find($id);
        // $clients->delete();

        // return redirect()->back()->with('success', 'client has been Deleted');
    }
    public function editclidoc($id)
    {
        $client_doc = ClientDocument::find($id);
        $documents = Document::all();
        $clients = Client::all();
       return view('clients.editclidoc',compact('client_doc','documents','clients'));
    }
    public function delete($id)
    {
        $client_doc= ClientDocument::find($id);
        $client_doc->delete();
        return redirect()->back()->with('success','Le Document du client a été supprimer');
    }

    public function updateclidoc(Request $request, $id)
    {
        

        
        
        foreach ( $request->document_id as $index => $doc) {
            if(!is_null($doc)){
                $client_doc = ClientDocument::find($id);
                Client::where('id',$client_doc->id_client);
                // $file = $files[$index];
               
                $client_doc-> id_client = $client_doc->id_client;
                $client_doc-> id_document = $doc;

                $file = $request->file;
                $file = $file[$index];
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $name);

                $client_doc->file = $name;
                $client_doc->save();
                return redirect()->back()->with('success','Document du client est bien modifier');
            }
    }

    }
    public function createdoc($id)
    {
        $client_doc = ClientDocument::get();
        $documents = Document:: all();
        
        $clients = Client::find($id);
        return view('clients.addclidoc', compact('client_doc', 'documents','clients'));
    }
    public function storedoc(Request $request)
    {
        $client_doc = new ClientDocument(); 
        $client_doc->id_client = $request->id_client;         
        $client_doc->id_document= $request->id_document;
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $file->move(public_path() . '/images/', $name);
        $client_doc->file = $name;
        
        if ($client_doc->save()) {
            return redirect()->back()->with('success', 'Document du client a été bien est ajoute');   
        }

        // msg error 
        return redirect()->back()->with('error', 'Document du client n as pas été supprimer');
        
    }
}
