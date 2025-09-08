<x-admin-articles-layout :title="$title" :desc="$desc" :article="$article" :members="$members" :categories="$categories">
    <form action="{{ route('articles.store-articles-after-edit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $article->id }}">
    <main class="container admin" id="content">

      <h1>Edit Article</h1>

      <div class="admin-article">
        <section class="image">

            <label for="image">Upload image:</label>
            <div class="form-group image-placeholder">
              <input type="file" name="image" class="form-control-file" id="image"><br>
              @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
              <label for="image_alt">Alt text: </label>
              <input type="text" name="image_alt" id="image_alt" value="{{ old('image_alt', $article->image->alt) }}" class="form-control">
              @error('image_alt')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
        </section>

        <section class="text">
          <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}"
                   class="form-control">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="summary">Summary: </label>
            <textarea name="summary" id="summary"
                      class="form-control">{{ old('summary', $article->summary) }}</textarea>
            @error('summary')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="content">Content: </label>
            <textarea name="content" id="content"
                      class="form-control">{{ old('content', $article->content) }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="member_id">Author: </label>
            <select name="member_id" id="member_id">
                @foreach ($members as $member)
                @if($member->id === $article->member_id)
                <option value="{{ $member->id }}">{{ $member->forename . ' ' . $member->surname }}</option>
                @endif
                @endforeach
            </select>
            @error('member_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="category">Category: </label>
            <select name="category_id" id="category">
                @foreach($categories as $category)
                <option value=" {{ $category->id }}"> {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="category">Published: </label>
            <select name="published" id="published">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            @error('published')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <input type="submit" name="update" value="Save" class="btn btn-primary">
        </section><!-- /.text -->
      </div><!-- /.admin-article -->
    </main>
  </form>
</x-admin-articles-layout>






