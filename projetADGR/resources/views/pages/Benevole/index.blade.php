@extends("layouts.app")
@section("title", "Bénévoles")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(count(App\Benevole::all()) > 0 )

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-9">
                                    Liste des donneurs
                                </div>
                                <div class="col-md-3">
                                    <a href="/benevole/create"><button class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Ajouter</button></a>
                                    <a href="/benevole/printlist"><button class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>Imprimer</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>CIN</th>
                                    <th>Tele</th>
                                    <th>Tele 2</th>
                                    <th>Date de naissance</th>
                                    <th>Adresse</th>
                                    <th>Etat</th>
                                    <th>Date d'adhesion</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(App\Benevole::All() as $benevole)
                                    <tr>
                                        <td>{{$benevole->nom}}</td>
                                        <td>{{$benevole->prenom}}</td>
                                        <td>{{$benevole->CIN}}</td>
                                        <td>{{$benevole->tele}}</td>
                                        <td>{{$benevole->teleSec}}</td>
                                        <td>{{$benevole->dateNaissance}}</td>
                                        <td>{{$benevole->adresse}}</td>
                                        <td>
                                            @if($benevole->etat)
                                                Actif
                                            @else
                                                Inactif
                                            @endif
                                        </td>
                                        <td>{{$benevole->dateAdhesion}}</td>
                                        <td>
                                            <a href="/benevole/delete/{{$benevole->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove"></span></a>
                                            <a href="/benevole/edit/{{$benevole->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-pencil"></span></a>
                                            <a href="/benevole/show/{{$benevole->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-list"></span></a>
                                            <a href="/benevole/{{$benevole->id}}/pdf"><span class="btn btn-default btn-circle btn-md glyphicon glyphicon-print"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">
                        Aucun bénévole !
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection