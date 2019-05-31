<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <a class="btn btn-sm btn-outline-secondary" href="https://cnvs.io" target="_blank">{{ __('canvas::blog.buttons.learn') }}</a>
        </div>
        <div class="col-4 text-center">
            <a id="brand" class="text-dark text-decoration-none font-weight-bolder"
               href="{{ route('blog.index') }}">{{ config('app.name', __('canvas::blog.title')) }}</a>
        </div>

        @auth()
            <div class="col-4 d-flex justify-content-end align-items-center">
                <div class="dropdown">
                    <a href="#" id="navbarDropdown" class="nav-link px-0 py-0 text-secondary" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=200') }}"
                             class="rounded-circle my-0"
                             style="width: 31px"
                             alt="{{ auth()->user()->name }}"
                        >
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('canvas.post.index') }}">{{ __('canvas::blog.nav.user.posts') }}</a>
                        <a class="dropdown-item" href="{{ route('canvas.tag.index') }}">{{ __('canvas::blog.nav.user.tags') }}</a>
                        <a class="dropdown-item" href="{{ route('canvas.topic.index') }}">{{ __('canvas::blog.nav.user.topics') }}</a>
                        <a class="dropdown-item" href="{{ route('canvas.index') }}">{{ __('canvas::blog.nav.user.stats') }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('canvas::blog.nav.user.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        @endauth

        @guest()
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="{{ route('canvas.index') }}">{{ __('canvas::blog.nav.user.login') }}</a>
            </div>
        @endguest
    </div>
</header>
