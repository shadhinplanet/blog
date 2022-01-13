@extends('frontend.layouts.app')
@section('title')
Blog | Home
@endsection
@section('content')
<section class="tm-section">
    <div class="container-fluid">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">





                @if ( $blogs->currentPage() === 1)

                <div class="tm-blog-post">
                    <h3 class="tm-gold-text">{{ $blogs->first()->name }}</h3>
                    <img src="{{ $blogs->first()->featured_image }}" width="100%" alt="Image"
                        class="img-fluid tm-img-post">

                    <p><small>Published {{ $blogs->first()->created_at->diffForHumans() }}</small></p>

                    <p>{!! \Illuminate\Support\Str::limit( $blogs->first()->description, 300, '...') !!}</p>
                    <a href="{{ route('single-blog',$blogs->first()->slug) }}" class="tm-btn">Read More</a>
                </div>
                @endif


                <div class="row tm-margin-t-big" style="display: flex;flex-wrap:wrap">

                    @foreach ($blogs->currentPage() === 1 ? $blogs->skip(1) : $blogs as $blog)


                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"
                        style="margin-bottom: 15px;display:flex;margin-bottom:30px">

                        <div class="tm-content-box" style="    display: flex;
                        flex-direction: column;
                        justify-content: space-between;">
                            <div class=""
                                style="background-image: url({{ $blog->featured_image }}); flex:1; min-height:200px;margin-bottom:15px">
                            </div>
                            <p><small>Published {{ $blog->created_at->diffForHumans() }}</small></p>
                            <h4 class="tm-margin-b-20 tm-gold-text">{{ $blog->name }}</h4>
                            <p class="tm-margin-b-20">{!! \Illuminate\Support\Str::limit( $blog->description, 100, '...')
                                !!}</p>
                            <a href="{{ route('single-blog',$blog->slug) }}" class="tm-btn" style="text-align: center">Read More</a>
                        </div>

                    </div>
                    @endforeach


                </div>

                {!! $blogs->links('vendor.pagination.bootstrap-4') !!}

            </div>

            <aside class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 tm-aside-r">

                <div class="tm-aside-container">
                    <h3 class="tm-gold-text tm-title">
                        Categories
                    </h3>
                    <nav>
                        <ul class="nav">
                            <li><a href="#" class="tm-text-link">Lorem ipsum dolor sit</a></li>
                            <li><a href="#" class="tm-text-link">Tincidunt non faucibus placerat</a></li>
                            <li><a href="#" class="tm-text-link">Vestibulum tempor ac lectus</a></li>
                            <li><a href="#" class="tm-text-link">Elementum egestas dui</a></li>
                            <li><a href="#" class="tm-text-link">Nam in augue consectetur</a></li>
                            <li><a href="#" class="tm-text-link">Fusce non turpis euismod</a></li>
                            <li><a href="#" class="tm-text-link">Text Link Color #006699</a></li>
                        </ul>
                    </nav>
                    <hr class="tm-margin-t-small">
                    <h3 class="tm-gold-text tm-title tm-margin-t-small">
                        Useful Links
                    </h3>
                    <nav>
                        <ul class="nav">
                            <li><a href="#" class="tm-text-link">Suspendisse sed dui nulla</a></li>
                            <li><a href="#" class="tm-text-link">Lorem ipsum dolor sit</a></li>
                            <li><a href="#" class="tm-text-link">Duiss nec purus et eros</a></li>
                            <li><a href="#" class="tm-text-link">Etiam pulvinar et ligula sed</a></li>
                            <li><a href="#" class="tm-text-link">Proin egestas eu felis et iaculis</a></li>
                        </ul>
                    </nav>
                    <hr class="tm-margin-t-small">

                    <div class="tm-content-box tm-margin-t-small">
                        <a href="#" class="tm-text-link">
                            <h4 class="tm-margin-b-20 tm-thin-font">Duis sit amet tristique #1</h4>
                        </a>
                        <p class="tm-margin-b-30">Vestibulum arcu erat, lobortis sit amet tellus ut, semper tristique
                            nibh. Nunc in molestie elit.</p>
                    </div>
                    <hr class="tm-margin-t-small">
                    <div class="tm-content-box tm-margin-t-small">
                        <a href="#" class="tm-text-link">
                            <h4 class="tm-margin-b-20 tm-thin-font">Duis sit amet tristique #2</h4>
                        </a>
                        <p>Vestibulum arcu erat, lobortis sit amet tellus ut, semper tristique nibh. Nunc in molestie
                            elit.</p>
                    </div>
                    <hr class="tm-margin-t-small">
                    <div class="tm-content-box tm-margin-t-small">
                        <a href="#" class="tm-text-link">
                            <h4 class="tm-margin-b-20 tm-thin-font">Duis sit amet tristique #3</h4>
                        </a>
                        <p>Vestibulum arcu erat, lobortis sit amet tellus ut, semper tristique nibh. Nunc in molestie
                            elit.</p>
                    </div>
                </div>


            </aside>

        </div>

    </div>
</section>
@endsection
