@extends('frontend.layouts.app')
@section('title')
Blog | Home
@endsection
@section('content')
<section class="tm-section">
    <div class="container-fluid">
        <div class="row">
            @php
            function getFileUrl($name){
                if(str_starts_with($name, 'http')){
                    return $name;
                }
                return url('storage/uploads/'.$name);
            }
            @endphp
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                @if ( $blogs->currentPage() === 1)

                <div class="tm-blog-post">
                    <h3 class="tm-gold-text">{{ $blogs->first()->name }}</h3>
                    <img src="{{ getFileUrl($blogs->first()->featured_image) }}" width="100%" alt="Image"
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
                                style="background-image: url({{ getFileUrl($blog->featured_image) }}); flex:1; min-height:200px;margin-bottom:15px">
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
            @include('frontend.layouts.sidebar')

        </div>

    </div>
</section>
@endsection
