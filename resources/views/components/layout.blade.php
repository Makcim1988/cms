<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} @php if(isset($_GET['page'])){ echo " - Page " . $_GET['page'];} @endphp</title>
    <meta name="description" content="{{ $desc }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') . '?v=' . time() }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.ico') }}">
    <style>
        @font-face {
            font-family: 'icons';
            src: url('{{ asset('fonts/icons/icons.eot') }}');
            src: url('{{ asset('fonts/icons/icons.eot') }}?#iefix') format('embedded-opentype'),
            url('{{ asset('fonts/icons/icons.woff2') }}') format('woff2'),
            url('{{ asset('fonts/icons/icons.woff') }}') format('woff'),
            url('{{ asset('fonts/icons/icons.ttf') }}') format('truetype'),
            url('{{ asset('fonts/icons/icons.svg') }}#icons') format('svg');
            font-weight: normal;
            font-style: normal;
        }
    </style>
</head>
<body>
<header>
    <nav class="member-menu">
        <div class="container">
            @guest
                <a href="{{ route('login') }}" class="nav-item nav-link">Log in</a> /
                <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
            @endguest

            @php
                $admin = \App\Models\Member::where('role', 'admin')->first();
            @endphp


            @auth
                @if(auth()->user()->role === 'member')
                    <a href=" {{ route('member-edit') }} ">Profile</a> /
                    <a href="{{ route('articles.member-articles') }}">Articles</a> /
                @endif
            @endauth

            @auth
                @if(auth()->user()->role === 'admin')
                    <a href=" {{ route('admin-members-show') }} ">All profiles</a> /
                    <a href=" {{ route('member-edit') }} ">Profile</a> /
                    <a href="{{ route('articles.admin-categories') }}">Categories</a> /
                    <a href="{{ route('articles.admin-articles') }}">Articles</a> /
                @endif
            @endauth

            @auth
                <a href="{{ route('logout') }}">Logout</a>
            @endauth

        </div>
    </nav>
    <div class="container">
        <a class="skip-link" href="#content">Skip to content</a>
        <div class="logo">
            <a href="{{ route('articles.index') }}"><img src="{{ asset('images/logo.png') }}" alt="Creative Folk"></a>
        </div>
        <nav>
            <button id="toggle-navigation" aria-expanded="false">
                <span class="icon-menu"></span><span class="hidden">Menu</span>
            </button>
            <ul id="menu">
                @foreach ($articles->unique('category_id') as $article)
                    <li><a href=" {{ route('articles.showCategory', $article->category->name) }}" aria-current="page">
                            {{ $article->category->name }}
                        </a></li>
                @endforeach
                <li><a href=" {{ route('articles.search') }} ">
                        <span class="icon-search"></span><span class="search-text">Search</span>
                    </a></li>
            </ul>
        </nav>
    </div><!-- /.container -->
</header>

{{ $slot }}

<footer>
    <div class="container">
        &copy; <a href="http://lemaxdeveloper.su">lemaxdeveloper</a> <?= date('Y'); ?>
    </div>
</footer>
<script src="js/site.js"></script>
</body>
</html>
