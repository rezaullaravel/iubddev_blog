@extends('frontend.front_master')
@section('title')
    {{ 'Blog Details Page' }}
@endsection



@section('content')

<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
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
                            <livewire:comments :model="$blog"/>
                        </div>
                    </div>
                </div>
              @include('frontend.components.right-side')
            </div>
        </div>
    </section>


@endsection


