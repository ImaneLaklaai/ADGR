@extends("layouts.app")
<?php
    if(isset($id)){
        $donneur = \App\Donneur::find($id);
    }
?>
@section("title", $donneur->nom. " ". $donneur->prenom);
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <a href="/storage/profilePhotos/{{$donneur->id}}.jpg"><img src="/storage/profilePhotos/{{$donneur->id}}.jpg" width="100%"></a>
            </div>
            <div class="col-md-9">
                <div class="well">
                    <b>Nom et prénom:</b> {{$donneur->nom}} {{$donneur->prenom}}<br>
                    <b>Email: </b> {{$donneur->email}}<br>
                    <b>Date de naissance:</b> {{$donneur->dateNaissance}}<br>
                    <b>Groupe sanguin:</b> {{$donneur->groupeSanguin->libelle.$donneur->groupeSanguin->rhesus}}<br>
                    <b>Dernier don: </b>{{$donneur->dateDernierDon}}<br>
                    <b>Etat de la carte:</b>
                    @if($donneur->carte->etatCarte == 1)
                        <div>
                            <p>
                                <strong>Conçue</strong>
                                <span class="pull-right text-muted">33% Complete</span>
                            </p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                    <span class="sr-only">33% Complete</span>
                                </div>
                            </div>
                        </div>
                    @elseif($donneur->carte->etatCarte == 2)
                        <div>
                            <p>
                                <strong>Imprimée</strong>
                                <span class="pull-right text-muted">66% Complete</span>
                            </p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
                                    <span class="sr-only">66% Complete</span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div>
                            <p>
                                <strong>Livrée</strong>
                                <span class="pull-right text-muted">100% Complete</span>
                            </p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    <span class="sr-only">100% Complete</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Basic Tabs
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Détails</a>
                            </li>
                            <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Profile</a>
                            </li>
                            <li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Messages</a>
                            </li>
                            <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Settings</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="home">
                                <h4>Détails des informations</h4>
                                <table class="table-striped table-bordered" width="50%">
                                    <tr>
                                        <td>CIN</td>
                                        <td>{{$donneur->CIN}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date de naissance</td>
                                        <td> {{$donneur->dateNaissance}}</td>
                                    </tr>
                                    <tr>
                                        <td>Sexe</td>
                                        <td>{{$donneur->sexe}}</td>
                                    </tr>
                                    <tr>
                                        <td>Profession</td>
                                        <td>{{$donneur->profession}}</td>
                                    </tr>
                                    <tr>
                                        <td>Adresse</td>
                                        <td>{{$donneur->adresse}}</td>
                                    </tr>
                                    <tr>
                                        <td>Etat civil</td>
                                        <td>
                                            {{$donneur->etatCivil->libelle}}
                                        </td>
                                </tr>
                                <tr>
                                    <td>Nombre d'enfants</td>
                                    <td>{{$donneur->nombreEnfants}}</td>
                                    </tr>
                                    <tr>
                                        <td>email</td>
                                        <td>{{$donneur->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Remarque(s)</td>
                                        <td>{{$donneur->remarque}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <h4>Profile Tab</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="tab-pane fade" id="messages">
                                <h4>Messages Tab</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="tab-pane fade" id="settings">
                                <h4>Settings Tab</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>
    </div>
@endsection