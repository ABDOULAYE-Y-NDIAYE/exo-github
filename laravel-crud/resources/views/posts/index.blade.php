@extends('layouts.app')

@section('title', 'Liste des articles')
@section('page-title', 'Liste des articles')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="mb-0">Gestion des articles</h3>
                <p class="text-muted mb-0">{{ $posts->total() }} article(s) au total</p>
            </div>
            <a href="{{ route('posts.create') }}" class="btn btn-custom">
                <i class="fas fa-plus me-2"></i>Nouvel article
            </a>
        </div>

        @if($posts->count() > 0)
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge {{ $post->published ? 'bg-success' : 'bg-warning' }}">
                                    <i class="fas {{ $post->published ? 'fa-eye' : 'fa-eye-slash' }} me-1"></i>
                                    {{ $post->published ? 'Publié' : 'Brouillon' }}
                                </span>
                                <small class="text-muted">{{ $post->created_at->format('d/m/Y') }}</small>
                            </div>
                            
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ Str::limit($post->title, 50) }}</h5>
                                <p class="card-text text-muted mb-2">
                                    <i class="fas fa-user me-1"></i>{{ $post->author }}
                                </p>
                                <p class="card-text flex-grow-1">{{ Str::limit($post->content, 100) }}</p>
                                
                                <div class="d-flex gap-2 mt-auto">
                                    <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye me-1"></i>Voir
                                    </a>
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-edit me-1"></i>Modifier
                                    </a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" 
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                            <i class="fas fa-trash me-1"></i>Supprimer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <div class="mb-3">
                    <i class="fas fa-file-alt fa-3x text-muted"></i>
                </div>
                <h4 class="text-muted">Aucun article trouvé</h4>
                <p class="text-muted">Commencez par créer votre premier article !</p>
                <a href="{{ route('posts.create') }}" class="btn btn-custom">
                    <i class="fas fa-plus me-2"></i>Créer un article
                </a>
            </div>
        @endif
    </div>
</div>
@endsection