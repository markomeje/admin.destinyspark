@extends('layouts.includes')
@section('content')
    <div class="section-padding">
        <div class="container pb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="text-muted mb-0">All Articles</div>
                <div class="text-info">
                    {{ date('F j, Y'); }}
                </div>
            </div>
            @empty($articles)
                <div class="alert alert-danger">No Articles Yet</div>
            @else
                <div class="row">
                    @foreach ($articles as $article)
                        @include('articles.partials.listings')
                    @endforeach
                </div>
                {{ $articles->onEachSide(1)->links() }}
            @endempty 
        </div>
    </div>
@endsection