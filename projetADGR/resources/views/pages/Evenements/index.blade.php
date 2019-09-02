@extends("layouts.app")
@section("title", "Evenements")
@section("content")
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        Comptes
                    </div>
                    <div class="col-md-3">
                        <a href="/evenement/create"><button class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span> Ajouter un événement</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover dataTables-example">
                <thead>
                <tr>
                    <th>Libelle</th>
                    <th>Type</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Responsable</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach(App\Evenement::all() as $evenement)
                    <tr>

                        <td>{{$evenement->libelle}}</td>
                        <td>
                            <?php
                                $type = \App\TypeEvent::find($evenement->type_event_id)->libelle;
                                echo $type;
                            ?>
                        </td>
                        <td>{{$evenement->date_debut}}</td>
                        <td>{{$evenement->date_fin}}</td>
                        <td>
                            @if($evenement->equipe)
                                <a href="/benevole/show/{{$evenement->equipe->responsable->id}}">{{$evenement->equipe->responsable->nom ." ". $evenement->equipe->responsable->prenom}}</a>
                            @else
                                <a href="/equipe/create" style="color: red; font-weight: bold;">Former une équipe</a>
                            @endif
                        </td>
                        <td>
                            <a href="evenement/delete/{{$evenement->id}}"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>
                            <a href="evenement/edit/{{$evenement->id}}"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection