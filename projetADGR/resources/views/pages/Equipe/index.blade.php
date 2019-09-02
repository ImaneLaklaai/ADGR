@extends("layouts.app")
@section("title","Equipes")
@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
        </div>
        <div class="col-md-3">
            <a href="/equipe/create"><button class="btn btn-primary">Ajouter</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table width="100%" class="table table-striped table-bordered table-hover dataTables-example">
                <thead>
                <th>Evenement</th>
                <th>Membres</th>
                <th>Responsable</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach(\App\Equipe::all() as $equipe)
                    <tr>
                        {{--<td></td>--}}
                        <td>{{$equipe->evenement->libelle}}</td>
                        <td>
                            @foreach($equipe->benevoleEquipe as $be)
                                <b>-</b> <a href="/benevole/show/{{$be->benevole->id}}">{{$be->benevole->nom." ".$be->benevole->prenom}}</a><br>
                            @endforeach
                        </td>
                        <td><a href="/benevole/show/{{$equipe->responsable->id}}">{{$equipe->responsable->nom." ".$equipe->responsable->prenom}}</a></td>
                        <td>
                            <a href="/equipe/delete/{{$equipe->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove removeCollecte"></span></a>
                            <a href="/equipe/edit/{{$equipe->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-pencil"></span></a>
                            <a href="/equipe/show/{{$equipe->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-list"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="/js/jquery.js"></script>
<script language="javascript" type="text/javascript">
    $(document).ready(function(){

    });
</script>
@endsection