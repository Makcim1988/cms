<x-admin-articles-layout :title="$title" :desc="$desc" :member="$member">
    <form action="{{ route('member-store', $member->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <main class="container admin" id="content">

            <h1>Edit Member {{ $member->forename . ' ' . $member->surname}}</h1>

            <div class="admin-article">
                <div class="form-group">
                    <label for="role">Role: </label>
                    <select name="role" id="role">
                        <option value="member">Member</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('published')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" name="update" value="Save" class="btn btn-primary">

            </div><!-- /.admin-article -->
        </main>
    </form>
</x-admin-articles-layout>






