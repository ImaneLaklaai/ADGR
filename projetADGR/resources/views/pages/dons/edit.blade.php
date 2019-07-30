@extends("layouts.app")
@section("title","Modifierdon")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-4">
                <form action="/dons/update" method="post">
                    {{csrf_field()}}
                    <?php
                    $don = App\Don::find($id);
                    ?>
                    <label for="collecte">Collecte</label>
                    <select id="collecte" name="collecte" class="form-control">
                        @foreach(App\Collecte::all() as $collecte)
                            <option value="{{$collecte->id}}">{{$collecte->libCollecte}}</option>
                        @endforeach
                    </select><br>
                    <label for="typeCollecte">Type de la collecte</label>
                    <select id="typeCollecte" name="typeCollecte" class="form-control">
                        <option value="0">Collecte fixe</option>
                        <option value="1">Collecte mobile</option>
                    </select><br>
                    <label for="donneur" >CIN du donneur</label>
                    <input type="text" name="donneur" id="donneur" class="form-control" value={{$don->donneur}}><br>
                    <input type="date" name="dateDon" id="dateDon" class="" value={{$don->dateDon}}> <br>
                    <input type="submit" value="Enregistrer" class="btn btn-primary">
                    <input type="reset" value="Annuler" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection