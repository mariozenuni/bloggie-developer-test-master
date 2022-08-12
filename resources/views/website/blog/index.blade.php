@extends('layouts.app', ['class' => 'bg-white'])

@section('content')
    <div class="header bg-gradient-primary py-3">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">
                            Blogs
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        @foreach ($blogs as $blog)
            <blog-card-row
                class="mb-4 shadow-sm"
                :blog="{{ json_encode($blog->toArray()) }}"
            ></blog-card-row>
        @endforeach

        <div class="mt-6">
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
