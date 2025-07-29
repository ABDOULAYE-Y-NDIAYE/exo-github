@extends('layouts.app')

@section('title', $post->title)
@section('page-title', 'Détails de l\'article')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <span class="badge {{ $post->published ? 'bg-success' : 'bg-warning' }} me-2">
                        <i class="fas {{ $post->published ? 'fa-eye' : 'fa-eye-slash' }} me-1"></i>
                        {{ $post->published ? 'Publié' : 'Brouillon' }}
                    </span>
                    <small class="text-muted">
                        Créé le {{ $post->created_at->format('d/m/Y à H:i') }}
                        @if($post->updated_at != $post->created_at)
                            • Modifié le {{ $post->updated_at->format('d/m/Y à H:i') }}
                        @endif
                    </small>
                </div>
                <div>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-warning btn-sm">
                        <i class="fas fa-edit me-1"></i>Modifier
                    </a>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i>Retour
                    </a>
                </div>
            </div>
            
            <div class="card-body">
                <article>
                    <header class="mb-4">
                        <h1 class="h2 mb-3">{{ $post->title }}</h1>
                        <div class="d-flex align-items-center text-muted mb-3">
                            <i class="fas fa-user me-2"></i>
                            <span class="me-3">Par <strong>{{ $post->author }}</strong></span>
                            <i class="fas fa-calendar me-2"></i>
                            <span>{{ $post->created_at->format('d F Y') }}</span>
                        </div>
                        <hr>
                    </header>
                    
                    <div class="content">
                        <div class="fs-6 lh-lg">
                            {!! nl2br(e($post->content)) !!}
                        </div>
                    </div>
                </article>
            </div>
            
            <div class="card-footer bg-light">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex gap-2">
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit me-1"></i>Modifier cet article
                        </a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ? Cette action est irréversible.')">
                                <i class="fas fa-trash me-1"></i>Supprimer
                            </button>
                        </form>
                    </div>
                    
                    <div class="text-muted small">
                        <i class="fas fa-info-circle me-1"></i>
                        Article #{{ $post->id }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Confirmation de suppression améliorée
    const deleteButton = document.querySelector('button[onclick*="confirm"]');
    if (deleteButton) {
        deleteButton.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('⚠️ Attention !\n\nÊtes-vous absolument sûr de vouloir supprimer cet article ?\n\n"{{ $post->title }}"\n\nCette action est définitive et ne peut pas être annulée.')) {
                this.closest('form').submit();
            }
        });
        // Remove inline onclick to avoid double confirmation
        deleteButton.removeAttribute('onclick');
    }
});
</script>
@endsection