<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use App\Models\Solution;
use Illuminate\Http\Request;

class PrestataireController extends Controller
{
   
    public function index()
    {
        return view('prestataires.home');
    }
    
    public function inbox()
    {
        $reclamations = Reclamation::where('etat', 'acceptée')
            ->orWhere('etat', 'en cours')
            ->orWhere('etat', 'en attente')->take(20)->get();
        return view('prestataires.inbox', compact('reclamations'));
    }


    public function get_reclamation_details($reclamation_id)
    {
        $reclamation = Reclamation::find($reclamation_id);
        if (!$reclamation) {
            return redirect()->back()->with(['error' => 'reclamation introuvable']);
        }
        return view('prestataires.reclamation_details', compact('reclamation'));
    }


    public function resoudre_reclamation($reclamation_id)
    {
        $reclamation = Reclamation::find($reclamation_id);
        if (!$reclamation) {
            return redirect()->back()->with(['error' => 'reclamation introuvable']);
        }

        return view('prestataires.resoudre_reclamation', compact('reclamation'));
    }

    public function reclamation_resolue(Request $request, $reclamation_id)
    {
        $reclamation = Reclamation::find($reclamation_id);
      
        //save solution & changer l'etat du reclamation
        $reclamation->update(['etat' => $request->etat,'solution' => $request->solution ]);
        
        return redirect()->route('prestataire_inbox')->with(['success' => 'réclamation numero ' . $reclamation_id . ' est traitée']);
    }
}
