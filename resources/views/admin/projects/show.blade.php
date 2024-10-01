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
    @if($project->img)
    <div>
        <h3>Immagine URL</h3>
        <img class="img-fluid" src="{{ $project->img }}" alt="">
    </div>
    @endif
    <div>
        <h3>Immagine file</h3>
        <img class="img-fluid" src="{{ asset('storage/' . $project->img_path) }}" alt="{{ $project->img_name }}"
            onerror="this.src='/img/no-img.jpg'">
    </div>
    <h3>Descrizione</h3>
    <p>{{ $project->description }}</p>
</div>
@endsection