@extends("layouts.app")
@section("title","Centre")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-10" id="collectesFixes">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Liste des centres
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Libellé centre</th>
                                <th>Adresse</th>
                                <th>Ville</th>
                                <th>Zone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(App\Centre::all() as $centre)
                                <tr>
                                    <td>{{$centre->libCentre}}</td>
                                    <td>{{$centre->adresse}}</td>
                                    <td>{{$centre->zone->ville->libVille}}</td>
                                    <td>{{$centre->zone->libZone}}</td>
                                    <td>
                                        <a href="/centre/delete/{{$centre->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove removeCollecte"></span></a>
                                        <a href="/centre/edit/{{$centre->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-pencil"></span></a>
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
@endsection