@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Ajoutez un joueur</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form class="d-flex flex-column  w-75 mt-5" action="{{route('joueurs.store')}}" enctype="multipart/form-data" method="post">
        @csrf

        <label for="name">Nom :</label>
        <input value="{{old('name')}}" type="text" name="name" id="name">

        <label for="firstname">Prénom :</label>
        <input value="{{old('firstname')}}" type="text" name="firstname" id="firstname">
    
        <label for="age">Age : </label>
        <input value="{{old('age')}}" type="number" min="18" max="35" name="age" id="age">
    
        <label for="phone">Numéro de téléphone : </label>
        <input value="{{old('phone')}}" type="text" name="phone" id="phone">

        <label for="email">Adresse mail :</label>
        <input value="{{old('email')}}" type="text" name="email" id="email">
    
        <label for="gender">Genre : </label>
        <select class="form-select" aria-label="Default select example" id="gender" name="gender">
            <option selected>Selectionnez le genre</option>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
            <option value="Autre">Autre</option>
        </select>
    
        <label for="country">Pays : </label>
        <input value="{{old('country')}}" type="text" name="country" id="country">
    
        <label for="role">Rôle : </label>
        <select class="form-select" aria-label="Default select example" id="role" name="role_id">
            <option selected>Selectionnez un rôle</option>
                @foreach ($role as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
        </select>

        

            <label for="team">Équipe : </label>
            <select class="form-select" aria-label="Default select example" id="team" name="equipe_id">
                <option selected>Selectionnez une équipe</option>
                    @foreach ($equipe as $data)
                        @if ($data->max > count($data->joueurs))
                            <option value="{{$data->id}}">{{$data->name}}</option>
                        @endif
                    @endforeach
                        <option value="">Pas d'équipe</option>
            </select>
        
        

        <label for="url">Photo :</label>
        <input value="{{old('url')}}" type="file" name="url" id="url">


        <button class="btn btn-success mt-3 w-25" type="submit">Ajouter</button>
    </form>
</section>

@endsection