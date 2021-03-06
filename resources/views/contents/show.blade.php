@extends('layouts.app')
@section('title') {{ $content->title }} @stop

@section('content')
<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-post">
                    <!-- === blog main image & entry info === -->
                    <div class="blog-image-main">
                        <div class="myarticle-img"
                            style="background-image: url({{ asset('storage/' . $content->photo) }});"></div>
                    </div>
                    <div class="blog-post-content">
                        <!-- === blog post title === -->
                        <div class="blog-post-title">
                            <h1 class="blog-title">{{ $content->title }}</h1>
                            {{-- <div class="blog-info blog-info-top">
                                <div class="entry">
                                    <i class="fa fa-user"></i>
                                    <span>اسم المؤلف</span>
                                </div>
                                <div class="entry">
                                    <i class="fa fa-calendar"></i>
                                    <span>03.مارس.2017</span>
                                </div>
                            </div> <!--/blog-info--> --}}
                        </div>
                        <!-- === blog post text === -->
                        <div class="blog-post-text">
                            {!! $content->subject !!}
                        </div>
                    </div>
                </div><!--blog-post-->
            </div><!--col-sm-8-->
        </div> <!--/row-->
    </div><!--/container-->
</section>
@endsection
