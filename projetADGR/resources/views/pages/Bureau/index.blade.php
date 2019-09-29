@extends("layouts.app")
@section("title","Bureaux")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if(count(App\Bureau::all())> 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bureau
                            <a href="/bureau/create"><button class="btn btn-primary">Ajouter un bureau</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Villes</th>
                                        <th>Responsable</th>
                                        <th>Créé le</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bureaux as $bureau)
                                        @if(Auth::user()->role->id != 1)
                                            @if(Auth::user()->zone->ville->id == $bureau->responsable->zone->ville->id)
                                                <tr>
                                                    <td>{{$bureau->id}}</td>
                                                    <td>
                                                        <?php $flag = false; ?>
                                                        @foreach($bureau->bureauVille as $bv)
                                                            <b>-</b> {{$bv->ville->libVille}}<br>
                                                            <?php $flag = true; ?>
                                                        @endforeach
                                                        @if(!$flag)
                                                            <span style="color:red;">Aucune ville</span>
                                                        @endif
                                                    </td>
                                                    <td><a href="/benevole/show/{{$bureau->responsable->id}}">{{$bureau->responsable->nom." ".$bureau->responsable->prenom}}</a></td>
                                                    <td>{{$bureau->dateCreation}}</td>
                                                    <td>
                                                        <a href="/bureau/delete/{{$bureau->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove removeCollecte"></span></a>
                                                        <a href="/bureau/edit/{{$bureau->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-pencil"></span></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @else
                                            <tr>
                                                <td>{{$bureau->id}}</td>
                                                <td>
                                                    <?php $flag = false; ?>
                                                    @foreach($bureau->bureauVille as $bv)
                                                        <b>-</b> {{$bv->ville->libVille}}<br>
                                                        <?php $flag = true; ?>
                                                    @endforeach
                                                    @if(!$flag)
                                                        <span style="color:red;">Aucune ville</span>
                                                    @endif
                                                </td>
                                                <td><a href="/benevole/show/{{$bureau->responsable->id}}">{{$bureau->responsable->nom." ".$bureau->responsable->prenom}}</a></td>
                                                <td>{{$bureau->dateCreation}}</td>
                                                <td>
                                                    <a href="/bureau/delete/{{$bureau->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove removeCollecte"></span></a>
                                                    <a href="/bureau/edit/{{$bureau->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-pencil"></span></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$bureaux->links()}}
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                @else
                    <div class="well">
                        Vous n'avez aucun bureau !
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="{{asset("js/jquery.js")}}"></script>
@endsection