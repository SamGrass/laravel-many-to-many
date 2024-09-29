@extends('layouts.app')

@section('content')
<div class="py-2 px-4">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="d-flex gap-2">
        <h2>Dettagli del Project: {{ $project->name }}</h2>
        <div>
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning"><i
                    class="fa-solid fa-pencil"></i></a>
        </div>
        @include('admin.partials.deletebtn')
    </div>

    <p>Creato il: {{ $project->created_at->format('d/m/Y') }}</p>
    @if($project->type)
    <p>Tipo: {{ $project->type->name }}</p>
    @endif
    @if($project->technologies)
    <h4>Tecnologie</h4>
    @foreach ($project->technologies as $technology)
    <span class="badge text-bg-secondary mb-4">{{ $technology->name }}</span>
    @endforeach
    @endif
    <div>
        <img class="img-fluid" src="{{ $project->img }}" alt="">
    </div>
    <h3>Descrizione</h3>
    <p>{{ $project->description }}</p>
</div>
@endsection
