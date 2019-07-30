@extends("layouts.app")
@section("title","Nouveau bureau")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(count(\App\Ville::all())==0)
                    <div class="alert alert-warning">
                        Vous devez ajouter une ville d'abord !
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-4">

                <form action="/bureau/store" method="post">
                    {{csrf_field()}}
                    <label for="idVille">Ville</label>
                    <select name="ville_id" class="form-control">
                        @foreach(App\Ville::all() as $ville)
                            @if($idVille == $ville->id)
                                <option value="{{$ville->id}}" selected>{{$ville->libVille}}</option>
                            @else
                                <option value="{{$ville->id}}">{{$ville->libVille}}</option>
                            @endif
                        @endforeach
                    </select><br>
                    <label for="dateCreation">Date de création</label>
                    <input type="date" name="dateCreation" id="dateCreation" class="form-control"><br>
                    @if(count(\App\Ville::all())>0)
                        <input type="submit" value="Ajouter" class="btn btn-primary">
                        <input type="reset" value="Annuler" class="btn btn-primary">
                    @else
                        <input type="submit" value="Ajouter" class="btn btn-primary" disabled>
                        <input type="reset" value="Annuler" class="btn btn-primary">
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection