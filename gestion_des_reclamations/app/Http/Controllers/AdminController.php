<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Reclamation;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    /**
     * 
     */
    public function index()
    {
        return view('admins.home');
    }

    public function getReclamations()
    {
        $reclamations = Reclamation::where('etat', 'nouvelle')->orWhere('etat', 'pris en charge')->take(20)->get();
        return view('admins.gestion_reclamations', compact('reclamations'));
    }


    public function show_reclamation($reclamation_id)
    {
        $reclamation = Reclamation::find($reclamation_id);
        return view('admins.show_reclamation', compact('reclamation'));
    }


    public function accepte_reclamation($reclamation_id)
    {
        $reclamation = Reclamation::find($reclamation_id);
        if (!$reclamation) {
            return redirect()->back()->with(['error' => 'reclamation introuvable']);
        }

        $reclamation->update(['etat' => 'acceptée']);

        return redirect()->route('liste_reclamations')->with(['success' => 'réclamation numero ' . $reclamation_id . ' acceptée']);
    }
}
