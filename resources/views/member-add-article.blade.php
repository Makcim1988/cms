<x-admin-articles-layout :title="$title" :desc="$desc" :articles="$articles" :member="$member">
    <form action="{{ route('articles.store-member-articles') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="">
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
              <input type="text" name="image_alt" id="image_alt" value="" class="form-control">
              @error('image_alt')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
        </section>

        <section class="text">
          <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" name="title" id="title" value=""
                   class="form-control">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="summary">Summary: </label>
            <textarea name="summary" id="summary"
                      class="form-control"></textarea>
            @error('summary')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="content">Content: </label>
            <textarea name="content" id="content"
                      class="form-control"></textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="member_id">Author: </label>
            <select name="member_id" id="member_id">
                
                <option value="{{ auth()->id() }}">{{ $member->forename . ' ' . $member->surname }}</option>

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
          <div class="form-check">
            <input type="checkbox" name="published" value="0" class="form-check-input" id="published">
            <label for="published" class="form-check-label">Published</label>
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






