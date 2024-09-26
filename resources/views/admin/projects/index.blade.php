@extends('layouts.app')

@section('content')
<div class="py-2 px-4">
    @if(session('deleted'))
    <div class="alert alert-danger" role="alert">
        {{ session('deleted') }}
    </div>
    @endif
    <h2>I tuoi Progetti</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Immagine</th>
                <th scope="col">Tipo</th>
                <th scope="col">Data di creazione</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <th>{{ $project->id }}</th>
                <td>{{ $project->name }}</td>
                <td><img width="15%" class="img-fluid" src="{{ $project->img }}" alt=""></td>
                <td><span class="badge text-bg-primary">{{ $project->type?->name }}</span></td>
                <td>{{ $project->created_at->format('d/m/Y') }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-success"><i
                                class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning"><i
                                class="fa-solid fa-pencil"></i></a>
                        @include('admin.partials.deletebtn')
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $projects->links() }}
</div>
@endsection