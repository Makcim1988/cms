<x-layout :member="$member" :title="$title" :desc="$desc" :articles="$articles">
    <main class="container" id="content">
        <section class="header">
            <h1> {{ $member->forename . ' ' . $member->surname }}</h1>
            <p class="member"><b>Member since:</b> {{ $member->joined }}</p>
            <img src="{{ asset('storage/uploads/' . $member->picture) }}" alt="{{ $member->forename }}"><br>
        </section>
        <section class="grid">
            @foreach ($articles as $article)
            @if ($article->published == 1)
            <article class="summary">
                <a href="{{ route('articles.show', $article->id) }}">
                    <img src="{{ asset('storage/uploads/' . $article->image->file) }}"
                         alt="{{ $article->image->alt }}">
                    <h2>{{ $article->title }}</h2>
                    <p>{{ $article->summary }}</p>
                </a>
                <p class="credit">
                    Posted in <a href="{{ route('articles.showCategory', $article->category->id) }}">
                        {{ $article->category->name }}</a>
                    by <a href="{{ route('articles.showMember', $article->member->id) }}">
                        {{ $article->member->forename . ' ' . $article->member->surname }} </a>
                </p>
            </article>
            @endif
            @endforeach
        </section>
    </main>
</x-layout>
