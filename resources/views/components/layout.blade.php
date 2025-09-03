<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $desc }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.ico') }}">
  </head>
  <body>
    <header>
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
            <li><a href="search.php">
              <span class="icon-search"></span><span class="search-text">Search</span>
            </a></li>
          </ul>
        </nav>
      </div><!-- /.container -->
    </header>

    {{ $slot }}

    <footer>
      <div class="container">
        &copy; Creative Folk <?= date('Y'); ?>
      </div>
    </footer>
    <script src="js/site.js"></script>
  </body>
</html>
