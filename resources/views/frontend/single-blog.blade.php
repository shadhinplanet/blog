@extends('frontend.layouts.app')

@section('title')
Blog | {{ $blog->name }}
@endsection
@section('content')
<section class="tm-section">
    <div class="container-fluid">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">

                @php
                function getFileUrl($name){
                    if(str_starts_with($name, 'http')){
                        return $name;
                    }
                    return url('storage/uploads/'.$name);
                }
                @endphp



                <div class="tm-blog-post">

                    <h3 class="tm-gold-text">{{ $blog->name }}</h3>
                    <img src="{{ getFileUrl($blog->featured_image) }}" width="100%" alt="Image"
                        class="img-fluid tm-img-post">
                        <p>
                            @foreach ($blog->categories as $item)
                                <a class="btn btn-primary btn-sm" href="{{ $item->slug }}">{{ $item->name }}</a>
                            @endforeach
                        </p>
                    <p>{!!  $blog->description !!}</p>
                </div>







            </div>

           @include('frontend.layouts.sidebar')

        </div>

    </div>
</section>
@endsection
