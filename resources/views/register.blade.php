<x-layout :title="$title" :desc="$desc" :articles="$articles">
    <main class="container" id="content">

        <section class="header">
            <h1>Register</h1>
        </section>
        <form method="post" action="{{ route('register.store')}}" class="form-membership">
            @csrf

            <div class="form-group">
            <label for="forename">Forename: </label><input type="text" name="forename" value="" id="forename" class="form-control">
            
            </div>

            <div class="form-group">
            <label for="surname">Surname: </label><input type="text" name="surname" value="" id="surname" class="form-control">
            
            </div>

            <div class="form-group">
            <label for="email">Email address: </label><input type="email" name="email" value="" id="email" class="form-control">
            
            </div>

            <div class="form-group">
            <label for="password">Password: </label><input type="password" name="password" id="password" class="form-control">
            
            </div>

            <div class="form-group">
            <label for="confirm">Confirm password: </label><input type="password" name="confirm" id="confirm" class="form-control">
            
            </div>

            <input type="submit" class="btn btn-primary" value="Register">
        </form>

    </main>
</x-layout>





