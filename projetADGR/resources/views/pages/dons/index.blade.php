@extends("layouts.app")
@section("title","Dons")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <input type="radio" id="btnDonsADGR" checked name="typeDon"><label for="btnDonsADGR">Dons ADGR</label>
                <input type="radio" id="btnDonsExternes" name="typeDon"><label for="btnDonsExternes">Dons Externes</label>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Dons
                    </div>
                    <?php
                        $donneur = \App\Donneur::find($idDonneur);
                    ?>
                    <!-- /.panel-heading -->
                    <div class="panel-body" id="donsADGR">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Date du don</th>
                                    <th>Collecte</th>
                                    <th>Type de collecte</th>
                                    <th>Donneur</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($donneur->donsADGR as $don)
                                    <tr>
                                        <td>{{$don->dateDon}}</td>
                                        <td>{{$don->collecte->libCollecte}}</td>
                                        @if($don->typeCollecte == 1)
                                            <td>Fixe</td>
                                        @else
                                            <td>Mobile</td>
                                        @endif
                                        <td>{{$donneur->nom . " " . $donneur->prenom}}</td>
                                        <td>
                                            <a href="/dons/adgr/delete/{{$don->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove removeCollecte"></span></a>
                                            <a href="/dons/adgr/edit/{{$don->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-pencil"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                        <div class="panel-body" id="donsExternes" style="display:none;">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Date du don</th>
                                        <th>Raison</th>
                                        <th>Donneur</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($donneur->donsExternes as $don)
                                        <tr>
                                            <td>{{$don->date}}</td>
                                            <td>{{$don->raison}}</td>
                                            <td>{{$donneur->nom . " " . $donneur->prenom}}</td>
                                            <td>
                                                <a href="/don/externe/delete/{{$don->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove removeCollecte"></span></a>
                                                <a href="/don/externe/edit/{{$don->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-pencil"></span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
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
    <script>
        $(document).ready(function(){
            $("#btnDonsADGR").on("change", function(){
                $("#donsExternes").fadeOut();
                $("#donsADGR").delay(400).fadeIn();
            });
            $("#btnDonsExternes").on("change", function(){
                $("#donsADGR").fadeOut();
                $("#donsExternes").delay(400).fadeIn();
            });
        })
    </script>
@endsection