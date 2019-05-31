<?php

namespace App\Http\Controllers;

use Canvas\Tag;
use Canvas\Post;
use Canvas\Topic;
use Illuminate\View\View;
use Canvas\Events\PostViewed;

class BlogController extends Controller
{
    /**
     * Show the blog homepage with a paginated list of results.
     *
     * @return View
     */
    public function index(): View
    {
        $data = [
            'posts'  => Post::published()->orderByDesc('published_at')->simplePaginate(10),
            'topics' => Topic::all(['name', 'slug']),
            'tags'   => Tag::all(['name', 'slug']),
        ];

        return view('blog.index', compact('data'));
    }

    /**
     * Show a single post.
     *
     * @param string $slug
     * @return View
     */
    public function post(string $slug): View
    {
        $posts = Post::with('tags', 'topic')->published()->get();
        $post = $posts->firstWhere('slug', $slug);

        if (optional($post)->published) {
            $next = $posts->sortBy('published_at')->firstWhere('published_at', '>', optional($post)->published_at);

            $filtered = $posts->filter(function ($value, $key) use ($slug, $next) {
                return $value->slug != $slug && $value->slug != optional($next)->slug;
            });

            if ($post->tags->isNotEmpty()) {
                $related = Post::whereHas('tags', function ($query) use ($post, $next) {
                    return $query->whereIn('name', $post->tags->pluck('slug'));
                })
                    ->where('id', '!=', $post->id)
                    ->where('id', '!=', optional($next)->id)
                    ->get();

                if ($related->isEmpty()) {
                    $random = $filtered->count() > 1 ? $filtered->random() : null;
                } else {
                    $random = $related->random();
                }
            } else {
                if ($filtered->isNotEmpty()) {
                    $filtered->random();
                }
                $random = null;
            }

            $data = [
                'author' => $post->author,
                'post'   => $post,
                'meta'   => $post->meta,
                'next'   => $next,
                'random' => $random,
                'topic'  => $post->topic->first() ?? null,
            ];

            event(new PostViewed($post));

            return view('blog.show', compact('data'));
        } else {
            abort(404);
        }
    }

    /**
     * Show all posts with a given tag.
     *
     * @param string $slug
     * @return View
     */
    public function tag(string $slug): View
    {
        $tag = Tag::with('posts')->where('slug', $slug)->first();

        if ($tag) {
            $data = [
                'tag'    => $tag,
                'tags'   => Tag::all(['name', 'slug']),
                'topics' => Topic::all(['name', 'slug']),
                'posts'  => Post::whereHas('tags', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })->published()->orderByDesc('published_at')->simplePaginate(10),
            ];

            return view('blog.index', compact('data'));
        } else {
            abort(404);
        }
    }

    /**
     * Show all posts under a given topic.
     *
     * @param string $slug
     * @return View
     */
    public function topic(string $slug): View
    {
        $topic = Topic::with('posts')->where('slug', $slug)->first();

        if ($topic) {
            $data = [
                'tags'   => Tag::all(['name', 'slug']),
                'topics' => Topic::all(['name', 'slug']),
                'topic'  => $topic,
                'posts'  => Post::whereHas('topic', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })->published()->orderByDesc('published_at')->simplePaginate(10),
            ];

            return view('blog.index', compact('data'));
        } else {
            abort(404);
        }
    }
}
