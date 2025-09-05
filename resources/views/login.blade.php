<x-layout :title="$title" :desc="$desc" :articles="$articles">
    <main class="container" id="content">

        <section class="header">
            <h1>Log in</h1>
        </section>
        <form method="post" action="{{ route('login') }}" class="form-membership">
            @csrf
            
            <div class="form-group">
                <label for="email">Email </label>
                <input type="text" name="email" id="email" value="" class="form-control">
                
            </div>

            <div class="form-group">
                <label for="password">Password </label>
                <input type="password" name="password" id="password" class="form-control">

            </div>

            <input type="submit" class="btn btn-primary" value="Log in"><br>
            <p><a href="password-lost.php">Lost password?</a></p>
        </form>

    </main>
</x-layout>





