<x-layout :title="$title" :desc="$desc" :articles="$articles" :result="$result">
    <main class="container" id="content">
    <section class="header">
      <form action="{{route('articles.search')}}" method="get" class="form-search">
        <label for="search"><span>Search for: </span></label>
        <input type="text" name="term" value="{{ old('term', $term) }}" id="search" placeholder="Enter search term">
        <input type="submit" value="Search" class="btn btn-search">
      </form>
    </section>

    <section class="grid">
    @if($result && $result->count())
      @foreach ($result as $article) 
      <article class="summary">
        <a href="{{ route('articles.show', $article->title) }}">
          <img src="{{ asset('storage/uploads/' . $article->image->file) }}" alt="{{ $article->image->alt }}">
          <h2>{{ $article->title }}</h2>
          <p>{{ $article->summary }}</p>
        </a>
        <p class="credit"> Posted in <a href=" {{ route('articles.showCategory', $article->category->name) }}">
            {{ $article->category->name }}</a>
            by <a href=" {{ route('articles.showMember', $article->member->id) }}">
            {{ $article->member->forename . " " . $article->member->surname }}</a>
            </p>
      </article>
      @endforeach
    @else
        <article class="summary">
            <p>Ничего не найдено</p>
        </article>
    @endif
    </section>
    
  </main>
</x-layout>
