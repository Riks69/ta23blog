@extends('layouts.admin')

@section('content')
<div class="grid md:grid-cols-2 gap-6">
    
    <!-- Lisa postitus -->
    <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all">
        <div class="card-body text-center">
            <div class="text-6xl mb-4">✏️</div>
            <h2 class="card-title text-2xl justify-center">Lisa uus postitus</h2>
            <p class="text-base-content/70">Jaga oma mõtteid maailmaga</p>
            <div class="card-actions justify-center mt-4">
                <a href="/admin/posts/create" class="btn btn-primary">Loo postitus →</a>
            </div>
        </div>
    </div>
    
    <!-- Halda silte -->
    <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all">
        <div class="card-body text-center">
            <div class="text-6xl mb-4">🏷️</div>
            <h2 class="card-title text-2xl justify-center">Halda silte</h2>
            <p class="text-base-content/70">Loo, muuda või kustuta silte</p>
            <div class="card-actions justify-center mt-4">
                <a href="/admin/tags" class="btn btn-secondary">Halda silte →</a>
            </div>
        </div>
    </div>
    
    <!-- Vaata blogi -->
    <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all">
        <div class="card-body text-center">
            <div class="text-6xl mb-4">📝</div>
            <h2 class="card-title text-2xl justify-center">Vaata blogi</h2>
            <p class="text-base-content/70">Vaata oma blogi nagu külastaja</p>
            <div class="card-actions justify-center mt-4">
                <a href="/" class="btn btn-ghost">Mine blogisse →</a>
            </div>
        </div>
    </div>
    
    <!-- Statistika (placeholder) -->
    <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all">
        <div class="card-body text-center">
            <div class="text-6xl mb-4">📊</div>
            <h2 class="card-title text-2xl justify-center">Statistika</h2>
            <p class="text-base-content/70">Vaata blogi statistika</p>
            <div class="card-actions justify-center mt-4">
                <button class="btn btn-ghost" disabled>Varsti →</button>
            </div>
        </div>
    </div>
</div>
@endsection