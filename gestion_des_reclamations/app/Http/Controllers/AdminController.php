<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Reclamation;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\StoredSolutionRequest;
use App\Http\Requests\UpdateadminRequest;
use App\Models\Solution;
use Carbon\Carbon;
use DatePeriod;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        //Rapport de statistique

        $current_month = Carbon::now()->month;
        $premier_du_mois = Carbon::create(date('Y'), $current_month);
        $fin_du_mois = $premier_du_mois->copy()->endOfMonth();

        //1-le nombre total des réclamations par période(mois),
        $nombre_total_des_réclamations = Reclamation::where('created_at', '>=', $premier_du_mois)->where('created_at', '<=', $fin_du_mois)->count();
        //2-le nombre total des réclamations traitees par période(mois),
        $Nombre_des_réclamations_traitées =  Reclamation::where('etat', 'traitée')->where('created_at', '>=', $premier_du_mois)->where('created_at', '<=', $fin_du_mois)->count();
        //3-le nombre total des réclamations rejetées par période(mois),
        $Nombre_des_réclamations_rejetées =  Reclamation::where('etat', 'refusée')->where('created_at', '>=', $premier_du_mois)->where('created_at', '<=', $fin_du_mois)->count();
        return view('admins.home', compact('nombre_total_des_réclamations', 'Nombre_des_réclamations_traitées','Nombre_des_réclamations_rejetées'));
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

    public function refuse_reclamation_form($reclamation_id)
    {
        $reclamation = Reclamation::find($reclamation_id);
        return view('admins.rejeter_reclamation', compact('reclamation'));
    }
    public function refuse_reclamation($reclamation_id, StoredSolutionRequest $request)
    {
        $reclamation = Reclamation::find($reclamation_id);
        if (!$reclamation) {
            return redirect()->route('liste_reclamations')->with(['error' => 'reclamation introuvable']);
        }

        $reclamation->update(['etat' => 'refusée', 'raison_du_refus' => $request->raison_du_refus]);

        return redirect()->route('liste_reclamations')->with(['success' => 'réclamation numero ' . $reclamation_id . ' refusée']);
    }
}
