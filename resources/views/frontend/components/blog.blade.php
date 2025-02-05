
@php
    $blogs = App\Models\Blog::where('status',1)->orderBy('id','desc')->get();
@endphp

<section class="section blog-wrap">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    @foreach ($blogs as $blog)
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
                                            class="icofont-calendar mr-1"></i> {{ date('d-m-Y',strtotime($blog->created_at)) }}</span>
                                </div>

                                <h2 class="mt-3 mb-3"><a href="blog-single.html">{{ $blog->title_bn }}</a></h2>

                                <p class="mb-4">{{ Str::limit($blog->desc_bn,150) }}</p>

                                <a href="blog-single.html" target="_blank"
                                    class="btn btn-main btn-icon btn-round-full"> বিস্তারিত পড়ুন <i
                                        class="icofont-simple-right ml-2  "></i></a>
                            </div>
                            @else
                            <div class="blog-item-content">
                                <div class="blog-item-meta mb-3 mt-4">
                                    {{-- <span class="text-muted text-capitalize mr-3"><i
                                            class="icofont-comment mr-2"></i>5 Comments</span> --}}
                                    <span class="text-black text-capitalize mr-3"><i
                                            class="icofont-calendar mr-1"></i> {{ date('d-m-Y',strtotime($blog->created_at)) }}</span>
                                </div>

                                <h2 class="mt-3 mb-3"><a href="blog-single.html">{{ $blog->title_en }}</a></h2>

                                <p class="mb-4">{{ Str::limit($blog->desc_en,150) }}</p>

                                <a href="blog-single.html" target="_blank"
                                    class="btn btn-main btn-icon btn-round-full">Read More <i
                                        class="icofont-simple-right ml-2  "></i></a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-8">
                <nav class="pagination py-2 d-inline-block">
                    <div class="nav-links">
                        <span aria-current="page" class="page-numbers current">1</span>
                        <a class="page-numbers" href="#">2</a>
                        <a class="page-numbers" href="#">3</a>
                        <a class="page-numbers" href="#"><i class="icofont-thin-double-right"></i></a>
                    </div>
                </nav>
            </div>
        </div>

    </div>
</section>
