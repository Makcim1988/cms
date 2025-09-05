  <x-admin-layout :title="$title" :desc="$desc">
    <main class="container admin" id="content">
    <form action=" {{ route('articles.store-categories') }}" method="post" class="narrow">
        @csrf
        <h1>Edit Category</h1>

        <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" value="" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description: </label>
            <textarea name="description" id="description" class="form-control"></textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check">
            <input type="checkbox" name="navigation" id="navigation" value="0" class="form-check-input">
            @error('navigation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label class="form-check-label" for="navigation">Navigation</label>
        </div>

        <input type="submit" value="Save" class="btn btn-primary btn-save">
    </form>
  </main>
</x-admin-layout>