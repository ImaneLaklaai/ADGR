@extends("layouts.app")
@section("title","Villes")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Villes
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Libellé ville</th>
                                    <th># Bureau</th>
                                    <th>Nombre de zones</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(App\Ville::All() as $ville)
                                    <tr>
                                        <td>{{$ville->libVille}}</td>
                                        @if($ville->bureau_id == null)
                                            <td><a href="/bureau/create/{{$ville->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-plus removeCollecte"></span></a></td>
                                        @else
                                            <td>{{$ville->bureau_id}}</td>
                                        @endif
                                        <td>{{count($ville->zone)}}
                                            @if(count($ville->zone))<a href="/zone/{{$ville->id}}"> Afficher tout</a>@endif
                                        </td>
                                        <td>
                                            <a href="/ville/delete/{{$ville->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove removeCollecte"></span></a>
                                            <a href="/ville/edit/{{$ville->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-pencil"></span></a>
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
            </div>
        </div>
    </div>
    <script src="/js/jquery.js"></script>
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