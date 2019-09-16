@extends("layouts.app")
@section("title","Appels téléphoniques")
@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table-hover table table-striped">
                <thead>
                    <tr>
                        <td>Téléphone</td>
                        <td>Nom</td>
                        <td>Prénom</td>
                        <td>Réponse</td>
                        <td>Bénévole appelant</td>
                        <td>Date</td>
                        <td>Actions</td>
                        <td><a href="/appelTelephonique/create"><button class="btn btn-primary">Nouvel appel</button></a></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appels as $appel)
                        <?php
                            $reponse =  $appel->reponse == "1"? "Favorable":($appel->reponse == "2"? "Défavorable":"Pas de réponse");
                        ?>
                        <tr>
                            <td><a href="tel:{{$appel->tele}}">{{$appel->tele}}</a></td>
                            <td>{{$appel->nom}}</td>
                            <td>{{$appel->prenom}}</td>
                            <td>{{$reponse}}</td>
                            <td><a href="/benevole/show/{{$appel->Benevole->id}}">{{$appel->Benevole->nom. " ". $appel->Benevole->prenom}}</a></td>
                            <td>{{$appel->created_at}}</td>
                            <td colspan="2">
                                <a href="/appelTelephonique/edit/{{$appel->id}}">Modifier</a>
                                <a href="/appelTelephonique/delete/{{$appel->id}}">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$appels->links()}}
        </div>
    </div>
</div>


@endsection