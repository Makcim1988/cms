<x-admin-layout :categories="$categories">
    <main class="container" id="content">
        <section class="header">
            <h1>Categories</h1>
            <p><a href="category.php" class="btn btn-primary">Add new category</a></p>
        </section>
        <table class="categories">
            <tr>
            <th>Name</th>
            <th class="edit">Edit</th>
            <th class="del">Delete</th>
            </tr>
            @foreach ($categories as $category) 
            <tr>
                <td><strong> {{ $category->name }}</strong></td>
                <td><a href="category.php?id={{ $category->id }}"
                    class="btn btn-primary">Edit</a></td>
                <td><a href="category-delete.php?id={{ $category->id }}"
                    class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </main>
</x-admin-layout>

