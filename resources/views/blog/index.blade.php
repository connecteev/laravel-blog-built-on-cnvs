@extends('blog.layouts.app')

@section('title', sprintf('%s — %s', config('app.name'), __('canvas::blog.title')))

@push('styles')
    @include('blog.partials.styles')
@endpush

@section('content')
    <div class="container">
        @include('blog.partials.navbar')

        @if($data['topics']->isNotEmpty())
            <div class="nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-between">
                    @foreach($data['topics'] as $topic)
                        <a class="p-2 text-muted" href="{{ route('blog.topic', $topic->slug) }}">{{ $topic->name }}</a>
                    @endforeach
                </nav>
            </div>
        @endif

        @if(count($data['posts']) > 0)
            @foreach($data['posts'] as $post)
                @if($loop->first)
                    <div class="jumbotron p-4 p-md-5 text-white rounded @if(empty($post->featured_image)) bg-dark @endif"
                         @if(!empty($post->featured_image)) style="background: linear-gradient(rgba(0, 0, 0, 0.85),rgba(0, 0, 0, 0.85)),url({{ $post->featured_image }}); background-size: cover" @endif>
                        <div class="col-md-8 px-0">
                            <h1 class="display-4 font-italic"><a href="{{ route('blog.post', $post->slug) }}"
                                                                 class="text-white text-decoration-none">{{ $post->title }}</a>
                            </h1>
                            <p class="lead my-3"><a href="{{ route('blog.post', $post->slug) }}"
                                                    class="text-white text-decoration-none">{{ $post->summary }}</a></p>
                            <p class="lead mb-0"><a href="{{ route('blog.post', $post->slug) }}"
                                                    class="text-white font-weight-bold">Continue reading...</a></p>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    {{ __('canvas::blog.posts.label') }}
                </h3>
                @if(count($data['posts']) > 0)
                    @foreach($data['posts'] as $post)
                        @if(!$loop->first)
                            <div class="blog-post">
                                <h2 class="blog-post-title"><a href="{{ route('blog.post', $post->slug) }}" class="text-dark text-decoration-none">{{ $post->title }}</a></h2>
                                <p class="blog-post-meta small">{{ $post->published_at->format('M d') }} — {{ $post->read_time }}</p>
                                <p><a href="{{ route('blog.post', $post->slug) }}" class="text-dark text-decoration-none">{{ $post->summary }}</a></p>
                            </div>
                        @endif
                    @endforeach

                    {{ $data['posts']->links() }}
                @else
                    <p class="mt-4">{{ __('canvas::blog.empty.description') }} <a href="{{ route('canvas.post.create') }}">
                            {{ __('canvas::blog.empty.action') }}</a>.</p>
                @endif
            </div>

            <aside class="col-md-4">
                <div class="p-4">
                    <h4 class="font-italic">{{ __('canvas::blog.tags.label') }}</h4>
                    <ol class="list-unstyled mb-0">
                        @foreach($data['tags'] as $tag)
                            <li><a href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }}</a></li>
                        @endforeach
                    </ol>
                </div>
            </aside>
        </div>
    </main>
@endsection
