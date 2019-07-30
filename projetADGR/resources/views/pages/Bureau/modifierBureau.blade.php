@extends("layouts.app")
@section("title","Modifier bureau")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-4">
                <form action="/bureau/update/{{$idBureau}}" method="post">
                    {{csrf_field()}}
                    <?php
                    $bureau = App\Bureau::find($idBureau)
                    ?>
                    <label for="libVille">Ville</label>
                    <select id="libVille" class="form-control" name="ville_id">
                        @foreach(App\Ville::all() as $ville)
                            @if($ville->id == $bureau->ville->id)
                                <option value="{{$ville->id}}" selected>{{$ville->libVille}}</option>
                            @else
                                <option value="{{$ville->id}}">{{$ville->libVille}}</option>
                            @endif
                        @endforeach
                    </select><br>
                    <input type="date" class="form-control" name="dateCreation" value={{$bureau->dateCreation}}><br>
                    <input type="submit" value="Modifier" class="btn btn-primary">
                    <input type="reset" value="Annuler" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection