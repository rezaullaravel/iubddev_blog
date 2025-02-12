@extends('frontend.front_master')

@section('title')
    {{ 'Blog Details Page' }}
@endsection
@section('content')
    <section class="section blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div class="single-blog-item">
                                <img src="{{ asset($blog->image) }}" alt="" class="img-fluid">
                                <div class="blog-item-content mt-5">
                                    <div class="blog-item-meta mb-3">
                                        <span class="text-color-2 text-capitalize mr-3"><i
                                                class="icofont-book-mark mr-2"></i> Equipment</span>
                                        <span class="text-muted text-capitalize mr-3"><i class="icofont-comment mr-2"></i>5
                                            Comments</span>
                                        <span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-2"></i>
                                            @if (session()->get('lang') == 'bangla')
                                                {{ convertToBanglaDate($blog->created_at) }}
                                            @else
                                                {{ date('d-F-Y', strtotime($blog->created_at)) }}
                                            @endif
                                        </span>
                                    </div>
                                    <h2 class="mb-4 text-md">
                                        <a href="">
                                            @if (Session::get('lang') == 'bangla')
                                                {{ $blog->title_bn }}
                                            @else
                                                {{ $blog->title_en }}
                                            @endif
                                        </a>
                                    </h2>
                                    <p>
                                        @if (Session::get('lang') == 'bangla')
                                            {{ $blog->desc_bn }}
                                        @else
                                            {{ $blog->desc_en }}
                                        @endif
                                    </p>


                                    <div class="mt-5 clearfix">
                                        <ul class="float-right list-inline">
                                            <li class="list-inline-item"> Share: </li>
                                            <li class="list-inline-item"><a href="#" target="_blank"><i
                                                        class="icofont-facebook" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#" target="_blank"><i
                                                        class="icofont-twitter" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#" target="_blank"><i
                                                        class="icofont-pinterest" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#" target="_blank"><i
                                                        class="icofont-linkedin" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="comment-area mt-4 mb-5">
                                <h4 class="mb-4">2 Comments on Healthy environment... </h4>
                                <ul class="comment-tree list-unstyled">
                                    <li class="mb-5">
                                        <div class="comment-area-box">
                                            <div class="comment-thumb float-left">
                                                <img alt="" src="images/blog/testimonial1.jpg" class="img-fluid">
                                            </div>
                                            <div class="comment-info">
                                                <h5 class="mb-1">John</h5>
                                                <span>United Kingdom</span>
                                                <span class="date-comm">| Posted April 7, 2019</span>
                                            </div>
                                            <div class="comment-meta mt-2">
                                                <a href="#"><i class="icofont-reply mr-2 text-muted"></i>Reply</a>
                                            </div>
                                            <div class="comment-content mt-3">
                                                <p>Some consultants are employed indirectly by the client via a consultancy
                                                    staffing company, a company that provides consultants on an agency
                                                    basis. </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="comment-area-box">
                                            <div class="comment-thumb float-left">
                                                <img alt="" src="images/blog/testimonial2.jpg" class="img-fluid">
                                            </div>
                                            <div class="comment-info">
                                                <h5 class="mb-1">Philip W</h5>
                                                <span>United Kingdom</span>
                                                <span class="date-comm">| Posted June 7, 2019</span>
                                            </div>
                                            <div class="comment-meta mt-2">
                                                <a href="#"><i class="icofont-reply mr-2 text-muted"></i>Reply </a>
                                            </div>
                                            <div class="comment-content mt-3">
                                                <p>Some consultants are employed indirectly by the client via a consultancy
                                                    staffing company, a company that provides consultants on an agency
                                                    basis. </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <form class="comment-form my-5" id="comment-form">
                                <h4 class="mb-4">Write a comment</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="name" id="name"
                                                placeholder="Name:">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="mail" id="mail"
                                                placeholder="Email:">
                                        </div>
                                    </div>
                                </div>
                                <textarea class="form-control mb-4" name="comment" id="comment" cols="30" rows="5" placeholder="Comment"></textarea>
                                <input class="btn btn-main-2 btn-round-full" type="submit" name="submit-contact"
                                    id="submit_contact" value="Submit Message">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">
                        <div class="sidebar-widget search  mb-3 ">
                            <h5>Search Here</h5>
                            <form action="#" class="search-form">
                                <input type="text" class="form-control" placeholder="search">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                        <div class="sidebar-widget latest-post mb-3">
                            <h5>
                                @if (Session::get('lang') == 'bangla')
                                    জনপ্রিয় পোস্ট
                                @else
                                    Popular Posts
                                @endif

                            </h5>

                            @php
                                $popular_blogs = App\Models\Blog::
                                where(['status'=>1,'is_popular'=>1])
                                ->where('id','!=',$blog->id)
                                    ->orderBy('id', 'desc')
                                    ->limit(8)
                                    ->get();
                            @endphp

                            @foreach ($popular_blogs as $blog)
                                <div class="py-2">
                                    <span class="text-sm text-muted">
                                        @if (session()->get('lang') == 'bangla')
                                            {{ convertToBanglaDate($blog->created_at) }}
                                        @else
                                            {{ date('d-F-Y', strtotime($blog->created_at)) }}
                                        @endif
                                    </span>
                                    <h6 class="my-2">
                                        <a href="{{ route('blog.details',[
                                        'id'=>$blog->id,
                                        'slug'=>$blog->slug
                                        ]) }}">
                                            @if (session()->get('lang') == 'bangla')
                                            {{ $blog->title_bn }}
                                        @else
                                            {{ $blog->title_en }}
                                        @endif
                                        </a>
                                    </h6>
                                </div>
                            @endforeach

                        </div>
                        <div class="sidebar-widget category mb-3">
                            <h5 class="mb-4">
                                @if (session()->get('lang') == 'bangla')
                                    ক্যাটাগরি
                                @else
                                    Category
                                @endif
                            </h5>
                            <ul class="list-unstyled">


                                @foreach ($categories as $category)
                                    <li class="align-items-center">
                                        <a href="{{ route('categorywiseBlog',[
                                        'category_id'=>$category->id,
                                        'slug'=>$category->slug
                                        ]) }}">
                                            @if (session()->get('lang') == 'bangla')
                                                {{ $category->name_bn }}
                                            @else
                                                {{ $category->name_en }}
                                            @endif
                                        </a>
                                        @php
                                        $catBlogs = App\Models\Blog::where('status',1)->where('category_id',$category->id)->count();
                                        @endphp
                                        <span>({{ $catBlogs }})</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="sidebar-widget schedule-widget mb-3">
                            <h5 class="mb-4">Time Schedule</h5>
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between align-items-center">
                                    <a href="#">Monday - Friday</a>
                                    <span>9:00 - 17:00</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <a href="#">Saturday</a>
                                    <span>9:00 - 16:00</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <a href="#">Sunday</a>
                                    <span>Closed</span>
                                </li>
                            </ul>
                            <div class="sidebar-contatct-info mt-4">
                                <p class="mb-0">Need Urgent Help?</p>
                                <h3>+23-4565-65768</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
