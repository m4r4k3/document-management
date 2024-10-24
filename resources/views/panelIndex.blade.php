@extends("layouts.master")
@section("title") 
Admin Panel
@endsection

@section("css")
{{ asset('css/panelIndex.css') }}
@endsection

@section("section")
<div class="container">
    <x-panelnav></x-panelnav>
    <div class="sub-container">
        <div class="container-header">
            <div class="bonjour"><div>Bonjour Monsieur</div></div>
        </div>
        <div class="section">
        <div class="section-table">
            <div class="section-table-header">
                <div class="section-table-title">Nouveaux Clients</div>
                <div class="voir-plus">...Voir plus</div>
            </div>
                <table >
                    <thead>
                        <td>Id order</td>
                        <td>Numero client</td>
                        <td>Nom complet</td>
                        <td>Créer au</td>
                        <td>Numero cin</td>
                    </thead>
                    <tbody>
                        <tr>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                        </tr>
                        <tr>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                        </tr>
                        </tbody>
                </table>
        </div>
        <div class="section-table">
            <div class="section-table-header">
                <div class="section-table-title">Dernières Activités</div>
                <div class="voir-plus">...Voir plus</div>
            </div>
                <table >
                    <thead>
                        <td>Id order</td>
                        <td>Numero client</td>
                        <td>Nom complet</td>
                        <td>Créer au</td>
                        <td>Numero cin</td>
                    </thead>
                    <tbody>
                        <tr>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                        </tr>
                        <tr>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                        </tr>
                        </tbody>
                </table>
        </div>
        <div class="section-table">
           
            <div class="charts">
                <div class="chart">
                    <div class="section-table-header">
                        <div class="section-table-title">le plus contributif</div>
                    </div>
                    <div class="graph">

                    </div>
                </div>
                 <div class="chart">
                    <div class="section-table-header">
                        <div class="section-table-title">Actions fait par mois</div>
                    </div>
                    <div class="graph">

                    </div>
                </div>  <div class="chart">
                    <div class="section-table-header">
                        <div class="section-table-title">Clients Ajouté par mois</div>
                    </div>
                    <div class="graph">

                    </div>
                </div>
           </div>
        </div>
        </div>
    </div>
</div>
@endsection