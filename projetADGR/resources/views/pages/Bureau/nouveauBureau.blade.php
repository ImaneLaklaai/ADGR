@extends("layouts.app")
@section("title","Nouveau bureau")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(count(\App\Benevole::all())==0)
                    <div class="alert alert-warning">
                        Vous devez ajouter un benevole d'abord !
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
                    <label for="dateCreation">Date de création</label>
                    <input type="date" name="dateCreation" id="dateCreation" class="form-control"><br>
                    <label for="responsable">Responsable</label><br>
                    <select name="responsable" class="form-control" id="responsable">
                        @foreach(\App\Benevole::all() as $benevole)
                            <option value="{{$benevole->id}}">{{$benevole->nom." ".$benevole->prenom}}</option>
                        @endforeach
                    </select><br>
                    @if(count(\App\Benevole::all())>0)
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