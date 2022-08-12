@extends('layouts.app', ['class' => 'bg-white'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">
                            Welcome to <strong>Bloggie</strong>,
                        </h1>
                        <h2 class="text-white">
                            The #1 Blog on the web!
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>

    <div class="container pb-5">
        <h3 class="text-lg">What we do</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus optio veniam vero voluptatum! Accusamus ad
            beatae dolorum error in iure, neque odio praesentium quia quibusdam sit voluptas voluptatibus. Aspernatur,
            esse.
        </p>

        <p>
            Ad at doloribus facere illo natus omnis quae, repudiandae ut. Architecto explicabo facilis, itaque nam quae
            quaerat unde. Iure mollitia porro sunt? Esse exercitationem molestiae quas quod voluptatem? Facilis, nihil!
        </p>

        <p>
            Adipisci alias assumenda deserunt excepturi explicabo nam nobis sequi! Amet autem expedita inventore
            laboriosam libero natus, perferendis praesentium quasi quis repudiandae totam velit voluptatibus. Animi
            beatae officia quia vero voluptatum.
        </p>
    </div>


    <featured-blogs></featured-blogs>
    <latest-blogs></latest-blogs>
@endsection
