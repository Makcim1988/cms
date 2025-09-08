<x-layout :articleData="$articleData" :title="$title" :desc="$desc" :articles="$articles">
    <main class="article container" id="content">
        <section class="image">
        <img src="{{ asset('storage/uploads/' . $articleData->image->file) }}" alt="{{ $articleData->image->alt }}"
            alt="{{ $articleData->alt }}">
        </section>
        <section class="text">
        <h1>{{ $articleData->title }}</h1>
        <div class="date">{{ $articleData->created }}</div>
        <div class="content"><pre>{{ $articleData->content }}</pre></div>
        <p class="credit">
            Posted in <a href="{{ route('articles.showCategory', $articleData->category->id) }}">{{ $articleData->category->name }}</a> by <a href=" {{ route('articles.showMember', $articleData->member->id) }}">
            {{ $articleData->member->forename . ' ' . $articleData->member->surname }}</a>
        </p>
        </section>
    </main>
</x-layout>
