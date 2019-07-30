@extends("layouts.app")
@section("title","Nouvelle ville")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-4">
                <form action="/ville/store" method="post">
                    {{csrf_field()}}
                    <label for="libVille">Libellé ville</label><input type="text" name="libVille" class="form-control" id="libVille"><br>
                    <input type="submit" value="Ajouter" class="btn btn-primary">
                    <input type="reset" value="Annuler" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection