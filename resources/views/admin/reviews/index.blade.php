@extends('layouts.admin')

@section('content')
    <?php $now = Carbon\Carbon::now() ?>

    <div class="panel">
        <div class="header bg-primary pb-6 pt-5 pt-md-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Blog Reviews</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog posts Reviews</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="{{ route('admin.reviews.create') }}" class="btn btn-sm btn-neutral">New</a>
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
                                action="{{ route('admin.reviews.index') }}"
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
                                            placeholder="Search by message..."
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
                                    <th scope="col">User Name</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col">Create At </th>
                                    <th scope="col">Updated At</th>
                                      <th scope="col">Actions</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($reviews as $review)
                                    <tr>
                                        <th>
                                            <span class="name text-md">
                                                {{ $review->user_name }}
                                            </span>
                                        </th>

                                        <td>
                                            {{ $review->message }}
                                        </td>
                                        <td>
                                           {{ $review->rating }}    
                                        </td>

                                        <td>
                                           {{ $review->created_at }}    
                                        </td>
                                          <td>
                                           {{ (empty($review->updated_at)) ? '--' : $review->updated_at }}    
                                        </td>
                                          <td >
                                          <a class="btn btn btn-sm btn btn-warning" href="{{route('admin.reviews.edit', $review->id)}}">Edit</a>    
                                        </td>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            {{ $reviews->links() }}
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
