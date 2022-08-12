@extends('layouts.admin')

@section('content')
    <?php $now = Carbon\Carbon::now() ?>

    <div class="panel">
        <div class="header bg-primary pb-6 pt-5 pt-md-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Blog Posts</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Blog Posts</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn-neutral">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.blog.update', $blog) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-3">Edit Blog Post</h3>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">

                                @if(count($errors))
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(session('success'))
                                    <div class="alert alert-success">
                                        <p class="mb-0">{{ session('success') }}</p>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label
                                        for="title"
                                        class="form-control-label"
                                    >
                                        Title
                                    </label>
                                    <input
                                        id="title"
                                        class="form-control"
                                        name="title"
                                        placeholder="Blog Title"
                                        required
                                        type="text"
                                        value="{{ old('title') ?? ($blog->title ?? '') }}"
                                    />
                                </div>

                                <div class="form-group">
                                    <label
                                        for="slug"
                                        class="form-control-label"
                                    >
                                        Slug
                                    </label>
                                    <input
                                        id="slug"
                                        class="form-control"
                                        name="slug"
                                        placeholder="Blog Slug"
                                        required
                                        type="text"
                                        value="{{ old('slug') ?? ($blog->slug ?? '') }}"
                                    />
                                </div>

                                <div class="form-group">
                                    <label
                                        for="image_url"
                                        class="form-control-label"
                                    >
                                        Image Url
                                    </label>
                                    <input
                                        id="image_url"
                                        class="form-control"
                                        name="image_url"
                                        placeholder="Blog Image URL"
                                        required
                                        type="text"
                                        value="{{ old('image_url') ?? ($blog->image_url ?? '') }}"
                                    />
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label
                                                for="published_at"
                                                class="form-control-label"
                                            >
                                                Publish Date
                                            </label>
                                            <input
                                                id="published_at"
                                                class="form-control"
                                                name="published_at"
                                                type="datetime-local"
                                                value="{{ old('published_at') ?? ($blog->published_at ? $blog->published_at->toDateTimeLocalString() : '') }}"
                                            />
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label
                                                for="featured_at"
                                                class="form-control-label"
                                            >
                                                Featured Date
                                            </label>
                                            <input
                                                id="featured_at"
                                                class="form-control"
                                                name="featured_at"
                                                type="datetime-local"
                                                value="{{ old('featured_at') ?? ($blog->featured_at ? $blog->featured_at->toDateTimeLocalString() : '') }}"
                                            />
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label
                                                for="expired_at"
                                                class="form-control-label"
                                            >
                                                Expiry Date
                                            </label>
                                            <input
                                                id="expired_at"
                                                class="form-control"
                                                name="expired_at"
                                                type="datetime-local"
                                                value="{{ old('expired_at') ?? ($blog->expired_at ? $blog->expired_at->toDateTimeLocalString() : '') }}"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="main_content"
                                        class="form-control-label"
                                    >
                                        Main Content
                                    </label>
                                    <textarea
                                        id="main_content"
                                        class="form-control"
                                        name="main_content"
                                        required
                                        rows="5"
                                        type="text"
                                    >{{ old('main_content') ?? ($blog->main_content ?? '') }}</textarea>
                                </div>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer py-4 text-right">
                                <button
                                    class="btn btn-primary"
                                    type="submit"
                                >
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
