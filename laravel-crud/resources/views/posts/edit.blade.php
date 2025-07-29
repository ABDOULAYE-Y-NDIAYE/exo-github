@extends('layouts.app')

@section('title', 'Modifier l\'article')
@section('page-title', 'Modifier l\'article')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Modifier l'article</h5>
                <div>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary btn-sm me-2">
                        <i class="fas fa-eye me-1"></i>Voir
                    </a>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i>Retour
                    </a>
                </div>
            </div>
            
            <div class="card-body">
                <div class="alert alert-info d-flex align-items-center mb-4">
                    <i class="fas fa-info-circle me-2"></i>
                    <div>
                        <strong>Article #{{ $post->id }}</strong> • 
                        Créé le {{ $post->created_at->format('d/m/Y à H:i') }}
                        @if($post->updated_at != $post->created_at)
                            • Dernière modification le {{ $post->updated_at->format('d/m/Y à H:i') }}
                        @endif
                    </div>
                </div>

                <form action="{{ route('posts.update', $post) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">
                            <i class="fas fa-heading me-1"></i>Titre de l'article <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $post->title) }}" 
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
                               id="author" name="author" value="{{ old('author', $post->author) }}" 
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
                                  id="content" name="content" rows="10" 
                                  placeholder="Rédigez le contenu de votre article...">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            <span class="text-muted">Rédigez un contenu engageant pour vos lecteurs.</span>
                            <span class="float-end" id="charCount">0 caractères</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="published" name="published" 
                                   {{ old('published', $post->published) ? 'checked' : '' }}>
                            <label class="form-check-label" for="published">
                                <i class="fas fa-eye me-1"></i>Article publié
                            </label>
                        </div>
                        <div class="form-text">
                            Statut actuel : 
                            <span class="badge {{ $post->published ? 'bg-success' : 'bg-warning' }}">
                                {{ $post->published ? 'Publié' : 'Brouillon' }}
                            </span>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-custom">
                            <i class="fas fa-save me-2"></i>Sauvegarder les modifications
                        </button>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary">
                            <i class="fas fa-eye me-2"></i>Aperçu
                        </a>
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
    const textarea = document.getElementById('content');
    const charCount = document.getElementById('charCount');
    
    // Update character count
    function updateCharCount() {
        const count = textarea.value.length;
        charCount.textContent = count + ' caractère' + (count > 1 ? 's' : '');
    }
    
    // Auto-resize textarea
    function autoResize() {
        textarea.style.height = 'auto';
        textarea.style.height = textarea.scrollHeight + 'px';
    }
    
    // Initialize
    updateCharCount();
    autoResize();
    
    // Add event listeners
    textarea.addEventListener('input', function() {
        updateCharCount();
        autoResize();
    });
    
    // Confirm navigation away with unsaved changes
    let hasChanges = false;
    const form = document.querySelector('form');
    const originalValues = new FormData(form);
    
    form.addEventListener('input', function() {
        hasChanges = true;
    });
    
    form.addEventListener('submit', function() {
        hasChanges = false;
    });
    
    window.addEventListener('beforeunload', function(e) {
        if (hasChanges) {
            e.preventDefault();
            e.returnValue = '';
        }
    });
});
</script>
@endsection