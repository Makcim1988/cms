<x-admin-articles-layout :title="$title" :desc="$desc" :articles="$articles" :member="$member">
    <main class="container" id="content">

        <section class="header"><h1>Update profile</h1></section>
        <form action="{{ route('member.store-after-edit') }}" class="form-membership" method="POST" enctype="multipart/form-data">

        @csrf
            @method('PUT')

            <img src="{{ asset('storage/uploads/' . $member->picture) }}" alt="{{ $member->forename }}"><br>

            <div class="form-group">
                <label for="image">Select profile picture:</label>
                <input type="file" name="image" id="image" />
            </div>

            <div class="form-group">
                <label for="forename">Forename: </label>
                <input type="text" name="forename" value="{{ $member->forename }}" id="forename" class="form-control" />
                <span class="errors"></span><br>
            </div>

            <div class="form-group">
                <label for="surname">Surname: </label>
                <input type="text" name="surname" value="{{ $member->surname }}"  id="surname" class="form-control" />
                <span class="errors"></span><br>
            </div>

            <div class="form-group">
                <label for="email">Email address: </label>
                <input type="email" name="email" value="{{ $member->email }}"  id="email" class="form-control" />
                <span class="errors"></span><br>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">update</button>
            </div>

        </form>
    </main>
</x-admin-articles-layout>

