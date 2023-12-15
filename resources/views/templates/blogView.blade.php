<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:site_name" content="Fact100">
    <meta property="og:title" content="{{$blog['currentPost']['title']}}" />
    <meta property="og:description" content="{{$blog['currentPost']['category']}}" />
    <meta property="og:image" itemprop="image" content="{{ url($url) }}uploads/blog_thumbnails/{{$blog['currentPost']['thumbnail']}}">
    <link itemprop="url" href="{{ url($url) }}uploads/blog_thumbnails/{{$blog['currentPost']['thumbnail']}}">
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="{{date('F jS Y', strtotime($blog['currentPost']['created_at']))}}" />

    <!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">

    <!-- Website to visit when clicked in fb or WhatsApp-->
    <meta property="og:url" content="fact100.com/blogs/{{$blog['currentPost']['slug']}}">
    <title></title>

    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
<link itemprop="thumbnailUrl" href="{{ url($url) }}uploads/blog_thumbnails/{{$blog['currentPost']['thumbnail']}}">
<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
  <link itemprop="url" href="{{ url($url) }}uploads/blog_thumbnails/{{$blog['currentPost']['thumbnail']}}">
</span>
<livewire:nav-bar />
@livewire('blog-view', [
'blog' => $blog,
'time'=>$time
])
<livewire:footer />


@livewireScripts
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>
<script src="https://use.fontawesome.com/05ffe9175a.js"></script>
</body>
</html>
