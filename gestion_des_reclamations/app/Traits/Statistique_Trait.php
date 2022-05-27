<?php
namespace App\Traits;

use App\Models\Reclamation;

Trait Statistique_Trait
{
    //Rapport de statistique
    public function get_nombre_total_des_réclamations($premier_du_mois, $fin_du_mois)
    {
        return Reclamation::where('created_at', '>=', $premier_du_mois)
            ->where('created_at', '<=', $fin_du_mois)->count();
    }

    public function get_nombre_des_réclamations_traitées($premier_du_mois, $fin_du_mois)
    {
        return Reclamation::where('etat', 'traitée')
            ->where('created_at', '>=', $premier_du_mois)
            ->where('created_at', '<=', $fin_du_mois)->count();
    }

    public function get_nombre_des_réclamations_rejetées($premier_du_mois, $fin_du_mois)
    {
        return Reclamation::where('etat', 'refusée')
            ->where('created_at', '>=', $premier_du_mois)
            ->where('created_at', '<=', $fin_du_mois)->count();
    }

    public function get_nombre_des_réclamations_double()
    {
        return Reclamation::select('name', 'type')->groupBy('name', 'type')->havingRaw('COUNT(*) > 1')->count();
    }

    //Graphe Data
    public function RemarqueGraphe()
    {
        return Reclamation::where('etat', 'traitée')->Where('type', 'remarque')->count();
    }
    public function ExcalationGraphe()
    {
        return Reclamation::where('etat', 'traitée')->Where('type', 'excalation')->count();
    }
    public function DemandeDinterventionGraphe()
    {
        return Reclamation::where('etat', 'traitée')->Where('type', 'demande d\'intervention')->count();
    }

}

?>