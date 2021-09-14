@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Ajoutez une photo</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="d-flex flex-column  w-75 mt-5" enctype="multipart/form-data" action="{{route('photos.store')}}" method="post">
        @csrf

        <label for="url">Url :</label>
        <input value="{{old('url')}}" type="file" name="url" id="url">

        <label for="joueur">Joueur : </label>
        <select class="form-select" aria-label="Default select example" id="joueur" name="joueur_id">
            <option selected>Selectionnez un joueur</option>
                @foreach ($joueur as $data)
                    <option value="{{$data->id}}">{{$data->name}} {{$data->firstname}}</option>
                @endforeach
        </select>
    
        <button class="btn btn-success mt-3 w-25" type="submit">Ajouter</button>
    </form>
</section>

@endsection