{{-- use layout --}}
@extends('layouts.app')

@section('content')
    {{-- <h2 class="">top of page</h2> --}}

    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->

                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                {{-- <a href="#!"><img class="card-img-top"
                                        src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a> --}}
                                {{-- uses the `post.show` name attr to map to that route's logic. can also use $post->id --}}
                                <a href="{{ route('post.show', $post) }}"><img class="card-img-top"
                                        src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>

                                <div class="card-body">
                                    <div class="small text-muted">{{ $post->created_at }}</div>
                                    <h2 class="card-title h4">{{ $post->title }}</h2>
                                    <p class="card-text">{{ $post->text }}</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <ul>
                    <li>
                        <a href="{{ route('home') }}?category_id=1">Category 1</a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}?category_id=2">Category 2</a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}?category_id=3">Category 3</a>
                    </li>
                </ul>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                {{--
                                    The view() helper accepts a second parameter as an array. In this case, in the home View file, data will be accessible as a $categories variable.

                                    We can have a foreach loop in the View file to show these categories. In the View files, many Blade directives start with an "@" sign, which we saw previously in the welcome.blade.php.
                                    --}}
                                @foreach ($categories as $category)
                                    {{-- <li><a href="/{{ $category->name }}">{{ $category->name }}</a></li> --}}
                                    <li><a
                                            href="{{ route('home') }}?category_id={{ $category->id }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                                {{-- <li><a href="#!">Web Design</a></li>
                                    <li><a href="#!">HTML</a></li>
                                    <li><a href="#!">Freebies</a></li> --}}
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <h2>inside section.content</h2>
@endsection
