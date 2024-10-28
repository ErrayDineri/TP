@extends('layout')
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des Etudiants</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('etudiant.create')}}" class="btn btn-success">Create New Student</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-hover">
        <tr>
            <th>Numéro</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Classe</th>
            <th width="350px">Action</th>
        </tr>
        @foreach ($liste as $value)
        <tr>
            <td>{{$loop->index}}</td>
            <td>{{$value->nom}}</td>
            <td>{{$value->prenom}}</td>
            <td>{{$value->classe->libelle}}</td>
            <td>
                <form action="{{ route('etudiant.delete',$value->id) }}" method="post">
                    <a href="{{route('etudiant.show', $value->id)}}" class="btn btn-info">Show</a>
                    <a href="{{route('etudiant.edit', $value->id)}}" class="btn btn-primary">Edit</a>
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes vous sur de vouloir effectuer cette opération');">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection