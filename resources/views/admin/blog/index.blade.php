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
                                    <li class="breadcrumb-item active" aria-current="page">Blog posts</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="{{ route('admin.blog.create') }}" class="btn btn-sm btn-neutral">New</a>
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
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-3">Filters</h3>

                            <form
                                action="{{ route('admin.blog.index') }}"
                                method="get"
                            >
                                <div class="form-group mb-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="search-addon">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </div>
                                        <input
                                            id="search"
                                            class="form-control"
                                            aria-describedby="search-addon"
                                            aria-label="Search"
                                            name="search"
                                            type="text"
                                            placeholder="Search..."
                                            value="{{ request()->get('search') ?? '' }}"
                                        >
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive" style="overflow-y: hidden">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Published At</th>
                                    <th scope="col">Expired At </th>
                                    <th scope="col">Featured At</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($blogs as $blog)
                                    <tr>
                                        <th>
                                            <span class="name text-md">
                                                {{ $blog->title }}
                                            </span>
                                        </th>

                                        <td>
                                            {{ $blog->slug }}
                                        </td>

                                        <td>
                                            @if($blog->published_at)
                                                <span class="badge badge-dot mr-4">
                                                    @if($blog->published_at > $now)
                                                        <i class="bg-danger"></i>
                                                    @else
                                                        <i class="bg-success"></i>
                                                    @endif

                                                    <span class="status">
                                                        {{ $blog->published_at }}
                                                    </span>
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td>
                                            @if($blog->expired_at)
                                                <span class="badge badge-dot mr-4">
                                                    @if($blog->expired_at < $now)
                                                        <i class="bg-danger"></i>
                                                    @else
                                                        <i class="bg-success"></i>
                                                    @endif

                                                    <span class="status">
                                                        {{ $blog->expired_at }}
                                                    </span>
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td>
                                            @if($blog->featured_at)
                                                <span class="badge badge-dot mr-4">
                                                    @if($blog->featured_at > $now)
                                                        <i class="bg-danger"></i>
                                                    @else
                                                        <i class="bg-success"></i>
                                                    @endif

                                                    <span class="status">
                                                        {{ $blog->featured_at }}
                                                    </span>
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('admin.blog.edit', $blog) }}">Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
