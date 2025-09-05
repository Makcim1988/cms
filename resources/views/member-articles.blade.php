<x-admin-articles-layout :articles="$articles" :title="$title" :desc="$desc">
    <main class="container" id="content">
    <section class="header">
      <h1>Articles</h1>
      <p><a href="{{ route('articles.create-articles') }}" class="btn btn-primary">Add new article</a></p>
    </section>
    <table>
      <tr>
        <th>Image</th><th>Title</th><th>Summary</th><th>Content</th><th class="created">Created</th><th class="pub">Published</th><th class="edit">Edit</th><th class="del">Delete</th>
      </tr>
      @if(count($articles) > 0)
      @foreach ($articles as $article) 
      <tr>
        <td>
            <img src="{{ asset('storage/uploads/' . $article->image->file) }}" alt="{{ $article->image->alt }}" alt="{{ $article->alt }}">
        </td>
        <td><strong>{{ $article->title }}</strong></td>
        <td><strong>{{ $article->summary }}</strong></td>
        <td><strong>{{ $article->content }}</strong></td>
        <td><a href="{{ route('articles.edit-articles', $article->id) }}" class="btn btn-primary}}">Edit</a></td>
        <td><a href="{{ route('articles.destroy-articles', $article->id) }}" class="btn btn-danger">Delete</a></td>
      </tr>
      @endforeach
      @else 
        <tr>
            <td colspan="8">you don't have any articles yet</td>
        </tr>
      @endif
    </table>
  </main>
</x-admin-articles-layout>






