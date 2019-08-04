@extends("layouts.app")
@section("title","Donneurs")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-10" id="collectesFixes">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-10">
                                Liste des donneurs
                            </div>
                            <div class="col-md-2">
                                    <a href="/donneur/create"><button class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Ajouter</button></a>
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
                                <th>Groupe sanguin</th>
                                <th>Dernier don</th>
                                <th>Aptitude</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(App\Donneur::All() as $donneur)
                                <tr>
                                    <td>{{$donneur->nom}}</td>
                                    <td>{{$donneur->prenom}}</td>
                                    <td>{{$donneur->CIN}}</td>
                                    <td>{{$donneur->groupeSanguin->libelle.$donneur->groupeSanguin->rhesus}}</td>
                                    <td>
                                        @if($donneur->dateDernierDon == null)
                                            ----
                                        @else
                                            {{$donneur->dateDernierDon}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(count(\App\donneurContreIndication::All()->where("donneur_id",$donneur->id)) > 0)
                                            <span class="btn btn-danger">Inapte</span>
                                        @else
                                            <span class="btn btn-success">Apte</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/donneur/delete/{{$donneur->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove"></span></a>
                                        <a href="/donneur/edit/{{$donneur->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-pencil"></span></a>
                                        <a href="/donneur/show/{{$donneur->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-list"></span></a>
                                        <a href="/don/{{$donneur->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-heart"></span></a>
                                        <a href="/donneur/{{$donneur->id}}/pdf}}"><span class="btn btn-default btn-circle btn-md glyphicon glyphicon-print"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">

    </script>
@endsection
