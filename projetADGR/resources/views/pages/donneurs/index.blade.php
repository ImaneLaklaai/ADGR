@extends("layouts.app")
@section("title","Donneurs")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Dons
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>CIN</th>
                                    <th>Groupe sanguin</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(App\Donneur::All() as $donneur)
                                    <tr>
                                        <td>{{$donneur->nom}}</td>
                                        <td>{{$donneur->prenom}}</td>
                                        <td>{{$donneur->CIN}}</td>
                                        <td>{{$donneur->groupe}}</td>
                                        <td>
                                            <a href="/donneur/delete/{{$donneur->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove"></span></a>
                                            <a href="/donneur/edit/{{$donneur->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-pencil"></span></a>
                                            <a href="/donneur/show/{{$donneur->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-list"></span></a>
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
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">

    </script>
@endsection