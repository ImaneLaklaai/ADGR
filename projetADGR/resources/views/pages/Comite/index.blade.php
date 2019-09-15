@extends("layouts.app")
@section("title","Comités")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
            </div>
            <div class="col-md-3">
                <a href="/comite/create"><button class="btn btn-primary">Ajouter</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table width="100%" class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                    <th>Libelle</th>
                    <th>Membres</th>
                    <th>Responsable</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    @foreach(\App\Comite::all() as $comite)
                        <tr>
                            {{--<td></td>--}}
                            <td>{{$comite->libelle}}</td>
                            <td>
                                @foreach($comite->benevoleComite as $bc)
                                    <b>-</b> <a href="/benevole/show/{{$bc->benevole->id}}">{{$bc->benevole->nom." ".$bc->benevole->prenom}}</a><br>
                                @endforeach
                            </td>
                            <td><a href="/benevole/show/{{$comite->responsable->id}}">{{$comite->responsable->nom." ".$comite->responsable->prenom}}</a></td>
                            <td>
                                <a href="/comite/delete/{{$comite->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove removeCollecte"></span></a>
                                <a href="/comite/edit/{{$comite->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-pencil"></span></a>
                                <a href="/comite/show/{{$comite->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-list"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="/js/jquery.js"></script>
@endsection