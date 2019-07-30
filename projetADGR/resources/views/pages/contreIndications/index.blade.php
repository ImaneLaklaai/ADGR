@extends("layouts.app")
@section("title","Contre-indications")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Contre-indications
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nom de la contre-indication</th>
                                    <th>Durée</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(App\ContreIndication::All() as $contre_indication)
                                    <tr>
                                        <td>{{$contre_indication->nom}}</td>
                                        <?php
                                            if($contre_indication->unite == 'j'){
                                                $unite = "jours";
                                            }elseif($contre_indication->unite == 'm'){
                                                $unite = "mois";
                                            }else{
                                                $unite = "ans";
                                            }
                                        ?>
                                        @if($contre_indication->duree != null)
                                            <td>{{$contre_indication->duree . " " . $unite}}</td>
                                        @else
                                            <td> - </td>
                                        @endif
                                        <td>{{$contre_indication->type}}</td>
                                        <td>
                                            <a href="/contreIndication/delete/{{$contre_indication->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove removeCollecte"></span></a>
                                            <a href="/contreIndication/edit/{{$contre_indication->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-pencil"></span></a>
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