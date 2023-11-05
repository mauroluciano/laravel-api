@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="mb-3">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-success" style="color: #ffffff;">
                <i class="fa-solid fa-plus"></i>
                NEW </a>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body py-0">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="mb-0 table table-hover">
                            <thead>
                                <tr>
                        
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome Progetto</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Descrizione</th>
                                    <th scope="col">Tag</th>
                                    <th scope="col">Data Creazione</th>
                                    <th scope="col">Ultima Modifica</th>
                                    <th scope="col">Admin Mode</th>
                        
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr>
                                        <th scope="row">{{ $project->id }}</th>
                                        <td scope="col">{{ $project->name }}</td>
                                        <td scope="col">{{ $project->category?->label }}</td>
                                        <td scope="col">{{ mb_strimwidth($project->description, 0, 50, '...') }}</td>
                                        <td>
                                            @forelse($project->tags as $tag)
                                              {{ $tag->label }} @unless($loop->last) , @else . @endunless
                                            @empty
                                              -
                                            @endforelse
                                            </td>
                                        <td scope="col">{{ $project->created_at }}</td>
                                        <td scope="col">{{ $project->updated_at }}</td>
                                        <td scope="col">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn mx-1">
                                                        Modifica
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="{{ route('admin.projects.show', $project) }}" class="btn mx-1">
                                                        Mostra
                                                    </a>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $project->id }}">
                                                        Cancella
                                                    </button>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModal-{{ $project->id }}" tabindex="-1"
                                                        aria-labelledby="deleteModal-{{ $project->id }}Label" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="deleteModal-{{ $project->id }}Label">Delete File
                                                                        "<strong>{{ $project->name }}</strong>"
                                                                    </h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Sei sicuro di voler cancellare "<strong>{{ $project->name }}</strong>" dalla tua lista?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                                                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-danger">ELIMINA</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <h2>NOT FOUND</h2>
                                @endforelse
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="card-footer"></div>
                </div>
                <div>
                    {{ $projects->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
