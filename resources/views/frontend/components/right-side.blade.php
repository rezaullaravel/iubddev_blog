<div class="col-lg-4">
    <div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">
        <div class="sidebar-widget search  mb-3">
            <h5>
                @if (Session::get('lang') == 'bangla')
                    সার্চ করুন
                @else
                    Search Here
                @endif
            </h5>
            <form action="{{ route('blog.search') }}" method="GET" class="search-form d-flex">
                <input type="text" name="string" class="form-control mr-2"
                @if (Session::get('lang') == 'bangla')
                    placeholder="সার্চ করুন"
                @else
                    placeholder="search"
                @endif
                >
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
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
                            $catBlogs = App\Models\Blog::where('status', 1)
                                ->where('category_id', $category->id)
                                ->count();
                        @endphp
                        <span>({{ $catBlogs }})</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
