

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    
    <meta property="og:site_name" content="{{config('siteConfig.sitewide')['SITENAME']}}">
    <meta itemprop="name" content="{{config('siteConfig.sitewide')['SITENAME']}}"/>
    <meta itemprop="url" content="https://{{config('siteConfig.sitewide')['SITE_DOMAIN']}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://kit.fontawesome.com/4d349a1f95.js" crossorigin="anonymous"></script>
    <script async src="{{ config('siteConfig.sitewide')['GOOGLE_SCRIPT_URL'] }}"></script>
    
    @vite('resources/js/app.js')

    <script>
        {!! config('siteConfig.sitewide')['GOOGLE_TAG'] !!}
    </script>
<link rel="stylesheet" href="/css/app.css">
    
    <script src="/js/script.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script src="/js/chat.js"></script>
    <script src="/js/functions.js"></script>
    <script src="/js/agora.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/jquery-2.1.1.min.js"></script>
    <script src="/js/jquery-3.5.1.min.js"></script>
</head>
<body>

    @yield("dashboard")
    
    @stack('javascript')

</body>
</html>