<x-admin-layout :categories="$categories" :title="$title" :desc="$desc">
    <main class="container" id="content">
        <section class="header">
            <h1>Categories</h1>
            <p>
                <a href="{{ route('articles.create-member-categories') }}" class="btn btn-primary">Add new category</a>
            </p>
        </section>
        <table class="categories">
            @if (count($categories) > 0)
                <tr>
                    <th>Name</th>
                    <th class="edit">Edit</th>
                    <th class="del">Delete</th>
                </tr>
                @foreach ($categories as $category) 
                <tr>
                    <td><strong> {{ $category->name }} </strong></td>
                    <td>
                        <a href="{{ route('articles.edit-categories', $category->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('articles.destroy-categories', $category->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            @else 
                <tr>
                    <td colspan="3"><strong> You don't have any categories yet </strong></td>
                </tr>
            @endif
        </table>
    </main>
</x-admin-layout>