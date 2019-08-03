@extends("layouts.app")
@section("title","Nouveau donneur")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-4">
                <form action="/donneur/store" method="post">
                    {{csrf_field()}}
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control"><br>

                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control"><br>

                    <label for="cin">CIN</label>
                    <input type="text" name="cin" id="cin" class="form-control"><br>

                    <label for="numeroTelephone">Numéro de téléphone</label>
                    <input type="tel" name="numeroTelephone" id="numeroTelephone" class="form-control"><br>

                    <label for="numeroTelephoneSecondaire">Numéro de téléphone secondaire</label>
                    <input type="tel" name="numeroTelephoneSecondaire" id="numeroTelephoneSecondaire" class="form-control"><br>

                    <label for="dateNaissance">Date de naissance</label>
                    <input type="date" name="dateNaissance" id="dateNaissance" class="form-control"> <br>

                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" id="adresse" class="form-control"><br>

                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control"><br>

                    <label for="profession">Profession</label>
                    <input type="text" name="profession" id="profession" class="form-control"><br>

                    <label for="sexe">Sexe</label>
                    <select id="sexe" name="sexe" class="form-control">
                        <option value="Femme">Femme</option>
                        <option value="Homme">Homme</option>
                        {{--<option value="Autre">Autre</option>--}}
                    </select><br>

                    <label for="moyen">Moyen d'adhésion</label>
                    <select id="moyen" name="moyen" class="form-control">
                        <option value="Rencontre ADGR">Une rencontre organisée par l'ADGR</option>
                        <option value="conseil d'un ami">Conseil d'un ami</option>
                    </select><br>

                    <label for="etat">Etat d'activité</label>
                    <select id="etat" name="etat" class="form-control">
                        <option value="1">Actif</option>
                        <option value="0">Inactif</option>
                    </select><br>

                    <label for="groupe">Groupe sanguin</label>
                    <select id="groupe" name="groupe" class="form-control">
                        @foreach(App\groupeSanguin::all() as $groupe)
                            @if($groupe->rhesus == '-')
                                <?php $rhesus = 'négatif' ?>
                            @else
                                <?php $rhesus = 'positif' ?>
                            @endif
                            <option value="{{$groupe->id}}">{{$groupe->libelle." ".$rhesus}}</option>
                        @endforeach
                    </select><br>

                    <label for="dateDernierDon">Date du dernier don</label>
                    <input type="date" name="dateDernierDon" id="dateDernierDon" class="form-control" > <br>

                    <label for="etatCivil">Etat civil</label>
                    <select id="etatCivil" name="etatCivil" class="form-control">
                        @foreach(App\etatCivil::all() as $etat)
                            <option value="{{$etat->id}}">{{$etat->libelle}}</option>
                        @endforeach
                    </select><br>

                    <label for="nombreEnfants">Nombre d'enfants</label>
                    <input type="text" name="nombreEnfants" id="nombreEnfants" class="form-control"><br>

                    <label for="ville">Ville</label>
                    <select id="ville" name="ville" class="form-control">
                        @foreach(App\Ville::all() as $ville)
                            <option value="{{$ville->id}}">{{$ville->libVille}}</option>
                        @endforeach
                    </select><br>

                    <label for="zone">Zone</label>
                    <div id="listeZones">
                        <select id="zone" name="zone_id" class="form-control">
                            @foreach(App\Zone::all()->where("ville_id", App\Ville::all()->first()->id) as $zone)
                                <option value="{{$zone->id}}">{{$zone->libZone}}</option>
                            @endforeach
                        </select><br>
                    </div>

                    <label for="remarque">Remarque(s)</label>
                    <input type="textarea" name="remarque" id="remarque" class="form-control"><br>

                    <div class="form-check">
                        <input class="form-check-input" name="type" type="checkbox" value="1" id="type">
                        <label class="form-check-label" for="type">
                            Donneur confidentiel
                        </label>
                    </div>

                    <input type="submit" value="Ajouter" id='ajouter' class="btn btn-primary">
                    <input type="reset" value="Annuler" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script type="text/javascript">
        let divZone = document.getElementById("listeZones");
        $(document).ready(function() {
            $("#ville").ready(function(){
                $("#ville").on("change",function(){
                    $.get("/getZones/"+$("#ville").val(), function(data){
                        let zones = JSON.parse(data);
                        let html = "";
                        html += "<select id=\"zone\" class=\"form-control\" name='zone_id'>";
                        for (let i in zones){
                            html += "<option value='"+zones[i].id+"'>"+zones[i].libZone+"</option>";
                        }
                        html +="</select><br>";
                        divZone.innerHTML = html;
                    })
                })
            });
            $("#cin").on("keyup", function(){
                let cin = $("#cin").val();
                $.ajax({
                    type: 'POST',
                    url: '/cinTest',
                    data: {
                        "_token": "<?php echo csrf_token() ?>",
                        "CIN": cin
                    },
                    success:function(data){
                        if(data == 1){
                            $("#cin").css("background-color", "#FF5050");
                            $("#cin").css("color", "#FFFFFF");
                            $("#ajouter").className += " disabled";
                        }else{
                            $("#cin").css("background-color","");
                            $("#cin").css("color", "");
                            $("#ajouter").className -= " disabled";
                        }
                    },
                    error: function(reject){
                        console.log(reject);
                    }
                });
            });
        });
    </script>
@endsection
