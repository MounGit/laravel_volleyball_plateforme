@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Modifiez le joueur</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="d-flex flex-column  w-75 mt-5" enctype="multipart/form-data" action="{{route('joueurs.update', $joueur->id)}}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Nom :</label>
        <input value="{{$joueur->name}}" type="text" name="name" id="name">

        <label for="firstname">Prénom :</label>
        <input value="{{$joueur->firstname}}" type="text" name="firstname" id="firstname">
    
        <label for="age">Age : </label>
        <input value="{{$joueur->age}}" type="number" min="18" max="35" name="age" id="age">
    
        <label for="phone">Numéro de téléphone : </label>
        <input value="{{$joueur->phone}}" type="text" name="phone" id="phone">

        <label for="email">Adresse mail :</label>
        <input value="{{$joueur->email}}" type="text" name="email" id="email">
    
        <label for="gender">Genre : </label>
        <select class="form-select" aria-label="Default select example" id="gender" name="gender">
            <option value="{{$joueur->gender}}" selected>{{$joueur->gender}}</option>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
            <option value="Autre">Autre</option>
        </select>
    
        <label for="country">Pays : </label>
        <input value="{{$joueur->country}}" type="text" name="country" id="country">
    
        <label for="role">Rôle : </label>
        <select class="form-select" aria-label="Default select example" id="role" name="role_id">
            <option value="{{$joueur->role->id}}" selected>{{$joueur->role->name}}</option>
                @foreach ($role as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
        </select>

        <label for="team">Équipe : </label>
        <select class="form-select" aria-label="Default select example" id="team" name="equipe_id">
            <option value="{{$joueur->equipe->id}}" selected>{{$joueur->equipe->name}}</option>
                @foreach ($equipe as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
        </select>

        <label for="url">Photo :</label>
        <input type="file" name="url" id="url">

        <button class="btn btn-success mt-3 w-25" type="submit">Modifier</button>
    </form>
</section>

@endsection