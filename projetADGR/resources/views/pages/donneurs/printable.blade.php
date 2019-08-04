<?php
        $donneur = \App\Donneur::find($id);
?>
<div align="center">

<h1> {{$donneur->nom}} {{$donneur->prenom}} </h1>
<table class="table table-striped">
    <tr>
        <td>
            Date de naissance : 
        </td>
        <td>
            {{$donneur->dateNaissance}}
        </td>
    </tr>
    
    <tr>
        <td>
            Sexe : 
        </td>
        <td>
            {{$donneur->sexe}}
        </td>
    </tr>
    <tr>
        <td>
            Groupe sanguin : 
        </td>
        <td>
            {{$donneur->groupeSanguin->libelle.$donneur->groupeSanguin->rhesus}}
        </td>
    </tr>
    <tr>
        <td>
            Date du dernier don : 
        </td>
        <td>
            {{$donneur->dateDernierDon}}
        </td>
    </tr>
    <tr>
        <td>
            CIN : 
        </td>
        <td>
            {{$donneur->CIN}}
        </td>
    </tr>
    <tr>
        <td>
            Etat civil : 
        </td>
        <td>
            {{$donneur->etatCivil->libelle}}
        </td>
    </tr>
    <tr>
        <td>
            Nombre d'enfants : 
        </td>
        <td>
            {{$donneur->nombreEnfants}}
        </td>
    </tr>
    <tr>
        <td>
            Profession : 
        </td>
        <td>
            {{$donneur->profession}}
        </td>
    </tr>
    <tr>
        <td>
            Moyen d'adhésion : 
        </td>
        <td>
            {{$donneur->moyenAdhesion}}
        </td>
    </tr>
    <tr>
        <td>
            Numéro de téléphone : 
        </td>
        <td>
            {{$donneur->numeroTelephone}}
        </td>
    </tr>
    <tr>
        <td>
            Adresse e-mail : 
        </td>
        <td>
            {{$donneur->email}}
        </td>
    </tr>
    <tr>
        <td>
            Adresse : 
        </td>
        <td>
            {{$donneur->adresse}}
        </td>
    </tr>
    <tr>
        <td>
            Ville : 
        </td>
        <td>
            {{$donneur->zone->ville->libVille}}
        </td>
    </tr>
    <tr>
        <td>
            Zone : 
        </td>
        <td>
            {{$donneur->zone->libZone}}
        </td>
    </tr>
</table>
<h1> Dons : </h1>
<h3> Dons ADGR : </h3>
<table class="table table-striped" width="100%">
    <thead>
        <tr>
            <th>Date </th>
            <th>Collecte</th>
            <th>Type collecte</th>
        </tr>
    </thead>
    <tbody>
        @foreach(App\donAdgr::all() as $don)
            <tr>
                <td>{{$don->dateDon}}</td>
                <td>{{$don->collecte->libCollecte}}</td>
                @if($don->collecte->typeCollecte == 0)
                    <td>Collecte fixe</td>
                @else
                    <td>Collecte mobile</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
<h3> Dons externes : </h3>
<table class="table table-striped" width="100%">
    <thead>
        <tr>
            <th>Date </th>
            <th>Raison</th>
        </tr>
    </thead>
    <tbody>
        @foreach(App\donExterne::all() as $don)
            <tr>
                <td>{{$don->date}}</td>
                <td>{{$don->raison}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<h1>Contre indications</h1>
<table class="table table-striped" width="100%">
    <thead>
    <tr>
        <th>Libelle</th>
        <th>Duree</th>
        <th>Date début</th>
        <th>Date fin</th>
        <th>Type</th>
    </tr>
    </thead>
    <tbody>
    @foreach(App\donneurContreIndication::all()->where("donneur_id", $donneur->id) as $dci)
        <tr>
            <td>{{$dci->contreIndication->nom}}</td>
            <?php
            $unite = "jours";
            if($dci->contreIndication->unite == "j"){
                $unite = "jours";
            }elseif($dci->contreIndication->unite == "m"){
                $unite = "mois";
            }elseif($dci->contreIndication->unite == "a"){
                $unite = "ans";
            }else{
                $unite = "-";
            }
            $duree = $dci->contreIndication->duree!=null?$dci->contreIndication->duree:"-";
            ?>
            <td>{{$duree. " " . $unite}}</td>
            <td>{{$dci->dateDebut}}</td>
            @if(!(is_string($dci->dateFin())))
                <td>{{$dci->dateFin()->format("Y-m-d")}}</td>
            @else
                <td>-------</td>
            @endif
            @if($dci->contreIndication->type == "definitive")
                <td>Définitive</td>
            @else
                <td>Provisoire</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>

</div>