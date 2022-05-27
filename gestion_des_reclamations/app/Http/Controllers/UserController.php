<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth',['except' => 'logout']);
    }

    public function index(){

        return view('users.home');
        
    }
    public function liste_utilisateur()
    {
        $utilisateurs =User::all();
        return view('admins.gestion_utilisateurs',compact('utilisateurs'));
    }
    //Ajouter un utilisateur
    public function create_utilisateur(){

        return view('admins.create_utilisateur');
    }

    public function store_utilisateur(UserRequest $request){
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
       
         User::create($input);
         return redirect()->route('liste_utilisateur')->with(['success'=>'utilisateur ajouté avec succès']);
    }

    //Modifier un utilisateur
    public function edit_utilisateur($utilisateur_id){
        //check if user exists
        $utilisateur = User::find($utilisateur_id);
        if(!$utilisateur){return redirect()->back()->with(['error'=>'utilisateur introuvable']);}
        //redirect to edit form
        return view('admins.edit_utilisateur',compact('utilisateur'));
    }

    public function update_utilisateur(UserRequest $request,$utilisateur_id){
         //check if user exists
         $utilisateur = User::find($utilisateur_id);
         if(!$utilisateur){return redirect()->back()->with(['error'=>'utilisateur introuvable']);}

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
       
         $utilisateur->update($input);
         return redirect()->route('liste_utilisateur')->with(['success'=>'utilisateur modifier avec succès']);
    }

    //supprimer utilisateur avec ses reclamations
    public function delete_utilisateur($utilisateur_id)
    {
        // check if user exists
        $utilisateur = User::find($utilisateur_id);
        if(!$utilisateur){return redirect()->back()->with(['error'=>'utilisateur introuvable']);}
        //delete
        $utilisateur->reclamations->each->delete();
        $utilisateur->delete();
        
        return redirect()->route('liste_utilisateur')->with(['success'=>'utilisateur supprimer avec succès']);
    }
   
}
