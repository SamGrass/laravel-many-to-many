@extends('layouts.app')

@section('content')
<h2>Progetti per categoria</h2>

@foreach ($types as $type)
<h3>{{ $type->name }}</h3>
<ul class="list-group my-3">
    @foreach ($type->projects as $project)
    <li class="list-group-item d-flex justify-content-between">
        <span>{{ $project->name }}</span>
        <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-success"><i
                class="fa-solid fa-eye"></i></a>
    </li>
    @endforeach
</ul>
@endforeach
@endsection