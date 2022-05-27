@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Rapport de Statistique</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-12 col-md-4"> Nombre total de réclamations pour ce mois: <br><strong> {{ $nombre_total_des_réclamations}}</strong></div>
                        <div class="col-sm-12 col-md-4"> Nombre des réclamations traitées pour ce mois : <br><strong>{{ $Nombre_des_réclamations_traitées}}</strong></div>
                        <div class="col-sm-12 col-md-4"> Nombre des réclamations rejetées pour ce mois: <br><strong>{{ $Nombre_des_réclamations_rejetées}}</strong></div>

                    </div><br>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-md-4"> Le nombre des réclamations en double : <br><strong>{{ $Nombre_des_réclamations_double}}</strong></div>
                        <!-- <div class="col-sm-12 col-md-4">le nombre de réclamations ouvertes par utilisateur par mois : <br><strong></strong></div> -->
                    </div>
                </div>
                <hr>
                <div>Le nombre remarque_traitee : {{$nombre_remarque_traitee}}</div>
                <div>Le nombre excalation traitee : {{$nombre_excalation_traitee}}</div>
                <div>Le nombre demande d'intervention traitee : {{$nombre_demandeDintervention_traitee}}</div>
            </div>

        </div>
        <div id="piechart_3d" class="col" style=" border: 1px solid black;"></div>
        <div>
            <a class="btn my-3 btn-success " href="{{route('liste_utilisateur')}}">Liste des utilisateurs</a>
            <a class="btn my-3 btn-success " href="{{route('liste_reclamations')}}">Liste des reclamations</a>
        </div>

    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Type de reclamation", "Nombre des reclamations traitees"],
            ["Remarque", <?php echo $nombre_remarque_traitee ?>],
            ["excalation", <?php echo $nombre_excalation_traitee ?>],
            ["demande d'intervention", <?php echo $nombre_demandeDintervention_traitee ?>],

        ]);

        var options = {
            title: "les réclamations  traitées par type de réclamation",
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById("piechart_3d"));
        chart.draw(data, options);
    }
</script>
@endsection