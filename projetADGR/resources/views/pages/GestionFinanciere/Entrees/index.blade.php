@extends("layouts.app")
@section("title", "Entrées")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-9">
                                Dépenses
                            </div>
                            <div class="col-md-3">
                                <a href="/entrees/create"><button class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span> Ajouter une entrée</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>Compte</th>
                            <th>Source</th>
                            <th>Montant</th>
                            <th>Remarque</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\entree::all() as $entree)
                            <tr>
                                <td><a href="/compte/show/{{$entree->compte->id}}">{{$entree->compte->libelle}}</a></td>
                                <td>{{$entree->source}}</td>
                                <td>{{$entree->montant}}</td>
                                <td>{{$entree->remarque}}</td>
                                <td>
                                    <a href="/entrees/delete/{{$entree->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove removeCollecte"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
