<x-layout :articles="$articles" :title="$title" :desc="$desc">
    <main class="container grid" id="content">
        @foreach ($articles as $article)
        <article class="summary">
            <a href=" {{ route('articles.show', $article->title) }}">
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
    </main>
    <div class="paginate">{{ $articles->links() }}</div>
</x-layout>
