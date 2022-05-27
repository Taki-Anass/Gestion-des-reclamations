<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredSolutionRequest;
use App\Models\reclamation;
use App\Http\Requests\StorereclamationRequest;
use App\Http\Requests\UpdatereclamationRequest;
use App\Models\Solution;
use GuzzleHttp\Psr7\Request;
use Illuminate\Routing\Route;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reclamations = Reclamation::all()->where('etat', "!=", "fermée")->where('etat', "!=", "refusée");

        return view('users.gestion_reclamation', compact('reclamations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create_reclamation');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StorereclamationRequest $request)
    {
        // save image in folder public/images/reclamations
        $file_name=null;
        if($request->image){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . "." . $file_extension;
        $path = 'images/reclamations';

        $request->image->move($path, $file_name);
        }
        Reclamation::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'etat' => $request->input('etat'),
            'user_id' => $request->input('user_id'),
            'image' => $file_name,
        ]);

        return redirect()->route('gestion_reclamation');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($reclamation_id)
    {
        $reclamation = Reclamation::find($reclamation_id);

        return view('users.show_reclamation', compact('reclamation')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($reclamation_id)
    {
        //check
        $reclamation = Reclamation::find($reclamation_id);
        if (!$reclamation) {
            return redirect()->back()->with(['error' => 'reclamation introuvable']);
        }
        //redirect to edit form
        $reclamation = Reclamation::select('id', 'name', 'type', 'etat', 'description','image')->find($reclamation_id);
        return view('users.edit_reclamation', compact('reclamation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatereclamationRequest $request, $reclamation_id)
    {
        $reclamation = Reclamation::find($reclamation_id);
        if (!$reclamation) {
            return redirect()->back()->with(['error' => 'reclamation introuvable']);
        }

         // save image in folder public/images/reclamations
         $file_name=null;
         if($request->image){
         $file_extension = $request->image->getClientOriginalExtension();
         $file_name = time() . "." . $file_extension;
         $path = 'images/reclamations';
 
         $request->image->move($path, $file_name);
         }
        $reclamation->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'etat' => $request->input('etat'),
            'image' => $file_name,
        ]);
        return redirect()->route('gestion_reclamation')->with(['success' => 'réclamation mise à jour']);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($reclamation_id)
    {
        //check if exist
        $reclamation = Reclamation::find($reclamation_id);
        if (!$reclamation) {
            return redirect()->back()->with(['error' => 'réclamation introuvable']);
        }
        //delete
        $reclamation->delete();
        return redirect()->route('gestion_reclamation')->with(['delete-success' => 'réclamation supprimée']);
    }
    
    public function show_reclamations_traitee()
    {
        $reclamations = Reclamation::all()->where('etat', "traitée");
        return view('users.reclamations_traitee',compact('reclamations'));
    }
    public function show_reclamations_refusee()
    {
        $reclamations = Reclamation::all()->where('etat', "refusée");
        return view('users.reclamations_refusee',compact('reclamations'));
    }

    //***************Solution ****************//
    public function accepte_solution_reclamation($reclamation_id)
    {
        $reclamation= Reclamation::find($reclamation_id);
        if (!$reclamation) {
            return redirect()->back()->with(['error' => 'réclamation introuvable']);
        }
        
        $reclamation->update(['etat'=>'fermée']);
        return redirect()->route('liste_reclamations_traitee')->with(['success' => 'réclamation '.$reclamation_id.' fermée']);

    }
    
}
