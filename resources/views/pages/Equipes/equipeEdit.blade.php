@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Modifiez l'équipe {{$equipe->name}}</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="d-flex flex-column  w-75 mt-5" action="{{route('equipes.update', $equipe->id)}}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Nom :</label>
        <input value="{{$equipe->name}}" type="text" name="name" id="name">
    
        <label for="city">Ville : </label>
        <input value="{{$equipe->city}}" type="text" name="city" id="city">
    
        <label for="country">Pays : </label>
        <input value="{{$equipe->country}}" type="text" name="country" id="country">
    
        <label for="max">Nombre maximum de joueurs : </label>
        <input value="{{$equipe->max}}" type="number" min="6" max="12" name="max" id="max">
    
        <label for="continent">Continent : </label>
        <select class="form-select" aria-label="Default select example" id="continent" name="continent_id">
            <option value="{{$equipe->continent_id}}" selected>{{$equipe->continent->name}}</option>
                @foreach ($continent as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
        </select>
        
        <button class="btn btn-success mt-3 w-25" type="submit">Modifier</button>
    </form>
</section>

@endsection