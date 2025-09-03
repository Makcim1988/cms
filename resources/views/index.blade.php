<x-layout :articles="$articles" :title="$title" :desc="$desc">
    <main class="container grid" id="content">
        @foreach ($articles as $article) 
        <article class="summary">
            <a href=" {{ route('articles.show', $article->title) }}">
            <img src="{{ asset('storage/uploads/' . $article->image->file) }}" alt="{{ $article->image->alt }}">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->summary }}</p>
            </a>
            <p class="credit"> Posted in <a href="category.php?id={{ $article->category_id }}">
            {{ $article->category->title }}</a>
            by <a href="member.php?id={{ $article->member_id }}">
            {{ $article->member->forename . " " . $article->member->surname }}</a>
            </p>
        </article>
        @endforeach
  </main>
</x-layout>