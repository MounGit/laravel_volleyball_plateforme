@extends('template.main')

@section('content')

<section class="container my-5 d-flex flex-column align-items-center">
    <h2 class="text-center mb-5">Continent</h2>
    
    <div class="card my-5" style="width: 50rem">
        <div class="card-body">
            <h4 class="card-subtitle my-3 text-muted">Nom : </h4>
            <h2>{{$continent->name}}</h2>            
            <div class="d-flex justify-content-around mt-5">
                <a class="btn btn-warning" href="{{route('continents.edit', $continent->id)}}">Modifier</a>
                <form action="{{route('continents.destroy', $continent->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection