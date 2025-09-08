<x-layout :category="$category" :title="$title" :desc="$desc" :articles="$articles">
    <main class="container" id="content">
        <section class="header">
            <h1>{{ $category->name }}</h1>
            <p>{{ $category->description }}</p>
        </section>
        <section class="grid">
            @foreach ($articles as $article)
            <article class="summary">
                <a href="{{ route('articles.show', $article->id) }}">
                    <img src="{{ asset('storage/uploads/' . $article->image->file) }}" alt="{{ $article->image->alt }})">
                    <h2>{{ $article->title }}</h2>
                    <p>{{ $article->summary }}</p>
                </a>
                <p class="credit">
                    Posted in <a href="{{ route('articles.showCategory', $article->category->id) }}">
                        {{ $article->category->name }}</a>
                    by <a href="{{ route('articles.showMember', $article->member->id) }}">
                        {{ $article->member->forename . ' ' . $article->member->surname }}</a>
                </p>
            </article>
            @endforeach
        </section>
        <div class="paginate">{{ $articles->links() }}</div>
    </main>
</x-layout>
