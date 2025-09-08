<x-layout :articles="$articles" :title="$title" :desc="$desc">
    <main class="container grid" id="content">
        @foreach ($articles as $article)
        @if($article->published == 1)
        <article class="summary">
            <a href=" {{ route('articles.show', $article->id) }}">
            <img src="{{ asset('storage/uploads/' . $article->image->file) }}" alt="{{ $article->image->alt }}">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->summary }}</p>
            </a>
            <p class="credit"> Posted in <a href=" {{ route('articles.showCategory', $article->category->id) }}">
            {{ $article->category->name }}</a>
            by <a href=" {{ route('articles.showMember', $article->member->id) }}">
            {{ $article->member->forename . " " . $article->member->surname }}</a>
            </p>
        </article>
        @endif
        @endforeach
    </main>
    <div class="paginate">{{ $articles->links() }}</div>
</x-layout>
