@extends("layouts.app")
@section("title","Donneurs")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-9">
                                Liste des donneurs
                            </div>
                            <div class="col-md-3">
                                    <a href="/donneur/create"><button class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Ajouter</button></a>
                                <a href="/donneur/printlist"><button class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>Imprimer</button></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>CIN</th>
                                <th>Groupe sanguin</th>
                                <th>Dernier don</th>
                                <th>Prochain don</th>
                                <th>Aptitude</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($donneurs as $donneur)
                                <tr>
                                    <td>{{$donneur->nom}}</td>
                                    <td>{{$donneur->prenom}}</td>
                                    <td>{{$donneur->CIN}}</td>
                                    <td>{{$donneur->groupeSanguin->libelle.$donneur->groupeSanguin->rhesus}}</td>
                                    <td>
                                        @if($donneur->dateDernierDon == null)
                                            ----
                                        @else
                                            <?php
                                                $dernierDon = new DateTime($donneur->dateDernierDon);
                                            ?>
                                                {{$dernierDon->format("d-m-Y")}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($donneur->getProchainDon() != null && $donneur->getProchainDon() != new \DateTime("01-01-2000"))
                                            {{$donneur->getProchainDon()->format("d-m-Y")}}
                                        @else
                                            @if($donneur->getProchainDon() == null)
                                                Prochaine occasion
                                            @else
                                                Inaptitude définitive
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if($donneur->isApte())
                                            <span class="btn btn-success" data-toggle="modal" data-target="{{"#modalApte".$donneur->id}}">Apte</span>
                                            <div class="modal fade" id="{{"modalApte".$donneur->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title" id="myModalLabel">Apte</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <b>Ajouter une contre indication</b>
                                                            <form action="/donneurContreIndication/store/{{$donneur->id}}" method="post" id="ajouterContreIndication">
                                                                {{csrf_field()}}
                                                                <label for="contre_indication_id">Contre indication</label>
                                                                <select id="contre_indication_id" name="contre_indication_id" class="form-control">
                                                                    @foreach(\App\contreIndication::All() as $ci)
                                                                        <option value={{$ci->id}}>{{$ci->nom}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <label for="dateDebut">Date de début</label>
                                                                <input type="date" name="dateDebut" id="dateDebut" class="form-control">
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                            <button type="button" class="btn btn-primary" onclick="document.getElementById('ajouterContreIndication').submit()">Ajouter</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        @else
                                            <span class="btn btn-danger" data-toggle="modal" data-target="{{"#modalInapte".$donneur->id}}">Inapte</span>
                                            <div class="modal fade" id="{{"modalInapte".$donneur->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title" id="myModalLabel">Inapte !</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if($donneur->getProchainDon() != null)
                                                                @if($donneur->getProchainDon() != new DateTime("01-01-2000"))
                                                                    <b>Inaptitude provisoire !</b><br>
                                                                    <b>Cause:</b> {{$donneur->getCauseInaptitude()}}<br>
                                                                    <b>Date du prochain don :</b> {{$donneur->getProchainDon()->format("d-m-Y")}}
                                                                @else
                                                                    <b>Inaptitude définitive !</b><br>
                                                                    <b>Cause: </b> {{$donneur->getCauseInaptitude()}}
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="/donneur/delete/{{$donneur->id}}"><span class=" btn btn-warning btn-circle btn-md glyphicon glyphicon-remove"></span></a>
                                        <a href="/donneur/edit/{{$donneur->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-pencil"></span></a>
                                        <a href="/donneur/show/{{$donneur->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-list"></span></a>
                                        <a href="/don/{{$donneur->id}}"><span class=" btn btn-default btn-circle btn-md glyphicon glyphicon-heart"></span></a>
                                        <a href="/donneur/{{$donneur->id}}/pdf"><span class="btn btn-default btn-circle btn-md glyphicon glyphicon-print"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$donneurs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jQuery.js"></script>
@endsection
