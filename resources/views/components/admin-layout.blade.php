<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Folk Admin</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.ico') }}">
  </head>
  <body>
    <header class="header-admin">
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
            <li><a href=" {{ route('articles.admin-articles') }} ">Articles</a></li>
            <li><a href="{{ route('articles.admin-categories') }}">Categories</a></li>
          </ul>
        </nav>
      </div><!-- .container -->
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