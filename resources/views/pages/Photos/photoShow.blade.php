@extends('template.main')

@section('content')

<section class="container my-5 d-flex flex-column align-items-center">
    <h2 class="text-center mb-5">Photo {{$photo->joueur->name}} {{$photo->joueur->firstname}}</h2>
    
    <div class="card my-5" style="width: 25rem">
        <div class="card-body">
            <img src="{{asset('img/'.$photo->url)}}" class="card-img-top" alt="">
            <h4 class="card-subtitle my-3 text-muted">Nom : </h4>
            <h2>{{$photo->joueur->name}}</h2>            
            <div class="d-flex justify-content-around mt-5">
                <a class="btn btn-warning" href="{{route('photos.edit', $photo->id)}}">Modifier</a>
                <form action="{{route('photos.destroy', $photo->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection