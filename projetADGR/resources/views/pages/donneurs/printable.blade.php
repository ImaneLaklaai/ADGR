<?php
        $donneur = \App\Donneur::find($id);
?>
<center>
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
            {{$donneur->cin}}
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
            {{$donneur->ville_id->libelle}}
        </td>
    </tr>
    <tr>
        <td>
            Zone : 
        </td>
        <td>
            {{$donneur->zone_id->libelle}}
        </td>
    </tr>
</table>
<h1> Dons : </h1>
<h2> Dons ADGR : </h2>
<table class="table table-striped">
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
                <td>{{$don->collecte_id->libCollecte}}</td>
                <td>{{$don->collecte->typeCollecte}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<h2> Dons externes : </h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Date </th>
            <th>Raison</th>
        </tr>
    </thead>
    <tbody>
        @foreach(App\donExterne::all() as $don)
            <tr>
                <td>{{$don->dateDon}}</td>
                <td>{{$don->raison}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</center>