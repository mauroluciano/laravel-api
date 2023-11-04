@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <section class="container mt-5">
        <div class="row">
            <div class="mb-3">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-primary" style="color: #ffffff;">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    BACK</a>
                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary" style="color: #ffffff;">
                    <i class="fa-solid fa-pencil"></i>
                    EDIT</a>
            </div>
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>
                            {{ $project->name }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="col">
                            <strong>Nome Progetto: </strong>
                            {{ $project->name }}
                        </div>
                        <div class="col">
                            <strong>Categoria: </strong>
                            {{ $project->category ? $project->category->label : 'nessuna categoria' }}
                        </div>
                        <div class="col">
                            <strong>Slug del Progetto: </strong>
                            {{ $project->slug }}
                        </div>
                        <div class="col">
                            <strong>Tags:</strong>
                            @forelse ($project->tags as $tag)
                              {{ $tag->label }} @unless($loop->last) , @else . @endunless
                            @empty
                              Nessun tag associato
                            @endforelse
                        </div>
                        <div class="col-12 mt-2">
                            <strong>Descrizione: </strong>
                            {{ $project->description }}
                        </div>
                    </div>
                </div>
            </div>
                    </div>
    </section>
@endsection
