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
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ville</th>
                                        <th>Créé le</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Bureau::All() as $bureau)
                                        <tr>
                                            <td>{{$bureau->id}}</td>
                                            <td>{{$bureau->ville->libVille}}</td>
                                            <td>{{$bureau->dateCreation}}</td>
                                            <td>
                                                <a href="/bureau/delete/{{$bureau->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove removeCollecte"></span></a>
                                                <a href="/bureau/edit/{{$bureau->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-pencil"></span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#fixe").on("change",function(){
                $("#collectesMobiles").fadeOut();
                $("#collectesFixes").delay(400).fadeIn();
            });
            $("#mobile").on("change",function(){
                $("#collectesFixes").fadeOut();
                $("#collectesMobiles").delay(400).fadeIn();
            });
        });
    </script>
@endsection