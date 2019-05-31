<style type="text/css">
    html, body {
        font-family: "Nunito", sans-serif;
        line-height: 1.6;
    }

    a, .btn-link, .page-link {
        color: #3490dc;
    }

    a:hover {
        color: #1d68a7;
    }

    .blog-header {
        line-height: 1;
        border-bottom: 1px solid #e5e5e5;
    }

    #brand {
        font-family: "Merriweather", Georgia, "Times New Roman", serif;
        font-weight: bolder;
        font-size: 2.25rem;
    }

    #brand:hover {
        text-decoration: none;
    }

    .blog-sidebar li {
        padding: 5px 0;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: "Merriweather", Georgia, "Times New Roman", serif;
    }

    .display-4 {
        font-size: 2.5rem;
    }

    @media (min-width: 768px) {
        .display-4 {
            font-size: 3rem;
        }
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .nav-scroller .nav-link {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: .875rem;
    }

    .dropdown-item {
        font-size: 0.9rem;
        padding: 0.55rem 1.5rem;
    }

    .card-img-right {
        height: 100%;
        border-radius: 0 3px 3px 0;
    }

    .flex-auto {
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
    }

    .h-250 {
        height: 250px;
    }

    @media (min-width: 768px) {
        .h-md-250 {
            height: 250px;
        }
    }

    .blog-title {
        margin-bottom: 0;
        font-size: 2rem;
        font-weight: 400;
    }

    .blog-description {
        font-size: 1.1rem;
        color: #999;
    }

    @media (min-width: 40em) {
        .blog-title {
            font-size: 3.5rem;
        }
    }

    .blog-post {
        margin-bottom: 4rem;
    }

    .blog-post-title {
        margin-bottom: .25rem;
        font-size: 1.75rem;
    }

    .blog-post-meta {
        margin-bottom: 1.25rem;
        color: #999;
    }

    .tag {
        font-family: Nunito, sans-serif;
    }

    .serif {
        font-family: "Merriweather", serif;
    }

    .sans-serif {
        font-family: "Nunito", sans-serif;
    }

    .content-title {
    color: #444;
    font-size: 36px;
    }

    .content-title a {
    color: #444;
    }

    .content-body {
        font-family: "Merriweather", serif;
        font-weight: 300;
        color: hsla(0,0%,0%,0.9);
        font-size: 1.1rem;
        line-height: 2;
        position: relative !important;
        -webkit-box-align: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
        overflow-y: visible !important;
    }

    .content-body .h1,
    .content-body .h2,
    .content-body .h3,
    .content-body .h4,
    .content-body .h5,
    .content-body .h6,
    .content-body h1,
    .content-body h2,
    .content-body h3,
    .content-body h4,
    .content-body h5,
    .content-body h6 {
        margin-top: 2.75rem;
        margin-bottom: 1rem;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.2;
        color: inherit
    }

    .content-body .h1,
    .content-body h1 {
        font-size: 2.25rem
    }

    .content-body .h2,
    .content-body h2 {
        font-size: 1.8rem
    }

    .content-body .h3,
    .content-body h3 {
        font-size: 1.575rem
    }

    .content-body .h4,
    .content-body h4 {
        font-size: 1.35rem
    }

    .content-body .h5,
    .content-body h5 {
        font-size: 1.125rem
    }

    .content-body .h6,
    .content-body h6 {
        font-size: .9rem
    }

    .content-body blockquote {
        margin-top: 2em;
        margin-bottom: 2em;
        font-style: italic;
        border-left: 4px solid #ccc;
        padding-left: 16px;
    }

    .content-body .embedded_image img {
        max-width: 100%;
        height: auto;
        margin-bottom: 30px;
        display: block;
    }

    .content-body .embedded_image[data-layout="wide"] img {
        max-width: 1024px;
        margin: 0 auto 30px;
    }

    div.content-body.serif.mt-4.pb-3 > div.embedded_image[data-layout=wide] {
        width: 100vw;
        position: relative;
        left: 50%;
        margin-left: -50vw;
    }

    div.embedded_image p {
        text-align: center !important;
        color: #6c757d !important;
        font-size: 0.9rem !important;
        line-height: 1.6 !important;
        font-weight: 400 !important;
        font-family: "Nunito", sans-serif;
    }

    div.embedded_image a {
        text-decoration: none !important;
    }

    .content-body hr {
        border: none;
        color: #111;
        letter-spacing: 1em;
        text-align: center;
    }

    .content-body hr:before {
        content: '...';
    }

    .content-body a {
        text-decoration: underline !important;
    }

    .content-body p code {
        background-color: rgba(0, 0, 0, 0.05) !important;
        padding: 2px 4px !important;
        -webkit-border-radius: 3px !important;
        -moz-border-radius: 3px !important;
        border-radius: 3px !important;
    }

    .content-body pre.ql-syntax {
        background-color: rgba(0, 0, 0, 0.05) !important;
        border: none !important;
        -webkit-border-radius: 3px !important;
        -moz-border-radius: 3px !important;
        border-radius: 3px !important;
        color: #000 !important;
        overflow-x: auto !important;
        padding: 1em !important;
    }

    .read-more a.title {
        text-decoration: none;
        color: inherit;
    }

    .read-more p.body {
        font-size: 1.1rem;
    }

    @media screen and (max-width: 1024px) {
        .content-body .embedded_image[data-layout=wide] img {
            max-width: 100%
        }
    }
</style>
