@extends('template.main')

@section('content')

<section class="container my-5 d-flex flex-column align-items-center">
    <h2 class="text-center mb-5">Équipe {{$equipe->name}}</h2>
    
    <div class="card my-5" style="width: 50rem">
        <div class="card-body">
            <h4 class="card-subtitle my-3 text-muted">Nom : </h4>
            <h2>{{$equipe->name}}</h2>
            <h4 class="card-subtitle my-3 text-muted">Origine : </h4>
            <h3 class="card-title">{{$equipe->city}}</h3>
            <h3 class="card-title">{{$equipe->country}}</h3>
            <h3 class="card-title">{{$equipe->continent->name}}</h3>
            <h4 class="card-subtitle my-3 text-muted">Joueurs : </h4>
            @foreach ($equipe->joueurs as $data)
                <p>{{$data->name}} {{$data->firstname}} <i>{{$data->role->name}}</i></p>
            @endforeach
            
            <div class="d-flex justify-content-around mt-5">
                <a class="btn btn-warning" href="{{route('equipes.edit', $equipe->id)}}">Modifier</a>
                <form action="{{route('equipes.destroy', $equipe->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection