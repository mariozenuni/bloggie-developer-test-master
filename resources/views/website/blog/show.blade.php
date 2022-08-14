@extends('layouts.app', ['class' => 'bg-white'])

@section('content')
    <div class="header bg-gradient-primary py-3">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">
                            {{ $blog->title }}
                        </h1>
                        <h2 class="text-white">
                            {{ $blog->published_at ? $blog->published_at->diffForHumans() : '' }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <img
            class="img-center img-fluid"
            alt="Blog Image"
            src="{{ $blog->image_url }}"
        >

        @if($blog->featured_at && $blog->featured_at <= \Carbon\Carbon::now())
            <div class="alert alert-default mt-6">
                Featured on: {{ $blog->featured_at->format('D d M yy') }}
            </div>
        @endif

        <p class="py-4">
            {{ $blog->main_content }}
        </p>
          <p class="py-4">
            {{ $blog->additional_content}}  
        </p>
    </div>

    <featured-blogs></featured-blogs>
@endsection
