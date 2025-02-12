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

                        @foreach ($categoryBlogs as $blog)
                            <div class="col-lg-12 col-md-12 mb-5">
                                <div class="blog-item">
                                    <div class="blog-thumb">
                                        <img src="{{ asset($blog->image) }}" alt="" class="img-fluid ">
                                    </div>

                                    @if (Session::get('lang') == 'bangla')
                                        <div class="blog-item-content">
                                            <div class="blog-item-meta mb-3 mt-4">
                                                {{-- <span class="text-muted text-capitalize mr-3"><i
                                                class="icofont-comment mr-2"></i>5 Comments</span> --}}
                                                <span class="text-black text-capitalize mr-3"><i
                                                        class="icofont-calendar mr-1"></i>
                                                    {{ date('d-m-Y', strtotime($blog->created_at)) }}</span>
                                            </div>

                                            <h2 class="mt-3 mb-3"><a href="blog-single.html">{{ $blog->title_bn }}</a></h2>

                                            <p class="mb-4">{{ Str::limit($blog->desc_bn, 150) }}</p>

                                            <a href="{{ route('blog.details', [
                                                'id' => $blog->id,
                                                'slug' => $blog->slug,
                                            ]) }}"
                                                class="btn btn-main btn-icon btn-round-full"> বিস্তারিত পড়ুন <i
                                                    class="icofont-simple-right ml-2  "></i></a>
                                        </div>
                                    @else
                                        <div class="blog-item-content">
                                            <div class="blog-item-meta mb-3 mt-4">
                                                {{-- <span class="text-muted text-capitalize mr-3"><i
                                                class="icofont-comment mr-2"></i>5 Comments</span> --}}
                                                <span class="text-black text-capitalize mr-3"><i
                                                        class="icofont-calendar mr-1"></i>
                                                    {{ date('d-m-Y', strtotime($blog->created_at)) }}</span>
                                            </div>

                                            <h2 class="mt-3 mb-3"><a href="blog-single.html">{{ $blog->title_en }}</a></h2>

                                            <p class="mb-4">{{ Str::limit($blog->desc_en, 150) }}</p>

                                            <a href="{{ route('blog.details', [
                                                'id' => $blog->id,
                                                'slug' => $blog->slug,
                                            ]) }}"
                                                class="btn btn-main btn-icon btn-round-full">Read More <i
                                                    class="icofont-simple-right ml-2  "></i></a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        {{-- pagination  --}}
                        <div>
                            @if (session()->get('lang') == 'bangla')
                                {{ $categoryBlogs->links('vendor.pagination.bangla') }}
                            @else
                                {{ $categoryBlogs->links('vendor.pagination.bootstrap-5') }}
                            @endif
                        </div>
                        {{-- pagination  --}}
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
                                $popular_blogs = App\Models\Blog::where(['status' => 1, 'is_popular' => 1])
                                    ->where('id', '!=', $blog->id)
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
                                        <a
                                            href="{{ route('blog.details', [
                                                'id' => $blog->id,
                                                'slug' => $blog->slug,
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
                                        <a
                                            href="{{ route('categorywiseBlog', [
                                                'category_id' => $category->id,
                                                'slug' => $category->slug,
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
