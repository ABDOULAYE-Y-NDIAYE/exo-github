@extends('layouts.app')

@section('title', 'Créer un article')
@section('page-title', 'Créer un nouvel article')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Nouvel article</h5>
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-left me-1"></i>Retour
                </a>
            </div>
            
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">
                            <i class="fas fa-heading me-1"></i>Titre de l'article <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" 
                               placeholder="Entrez le titre de l'article">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">
                            <i class="fas fa-user me-1"></i>Auteur <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" 
                               id="author" name="author" value="{{ old('author') }}" 
                               placeholder="Nom de l'auteur">
                        @error('author')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">
                            <i class="fas fa-file-text me-1"></i>Contenu <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control @error('content') is-invalid @enderror" 
                                  id="content" name="content" rows="8" 
                                  placeholder="Rédigez le contenu de votre article...">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Rédigez un contenu engageant pour vos lecteurs.</div>
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="published" name="published" 
                                   {{ old('published') ? 'checked' : '' }}>
                            <label class="form-check-label" for="published">
                                <i class="fas fa-eye me-1"></i>Publier immédiatement cet article
                            </label>
                        </div>
                        <div class="form-text">Si décoché, l'article sera sauvegardé comme brouillon.</div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-custom">
                            <i class="fas fa-save me-2"></i>Créer l'article
                        </button>
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-resize textarea
    const textarea = document.getElementById('content');
    textarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });
});
</script>
@endsection