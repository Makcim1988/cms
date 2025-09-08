<x-admin-layout :members="$members" :title="$title" :desc="$desc">
    <main class="container" id="content">
        <section class="header">
            <h1>Members</h1>
        </section>
        <table>
            <tr>
                <th>Picture</th>
                <th>Forename</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Password</th>
                <th>Joined</th>
                <th>Role</th>
                <th class="edit">Edit</th>
                <th class="del">Delete</th>
            </tr>
            @foreach ($members as $member)
                <tr>
                    <td><img src="{{ asset('storage/uploads/' . $member->picture) }}"></td>
                    <td><strong>{{ $member->forename }}</strong></td>
                    <td><strong>{{ $member->surname }}</strong></td>
                    <td><strong>{{ $member->email }}</strong></td>
                    <td><strong>{{ $member->password }}</strong></td>
                    <td><strong>{{ $member->joined }}</strong></td>
                    <td><strong>{{ $member->role }}</strong></td>
                    <td>
                        <a href="{{ route('admin-member-show', $member->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('member-destroy', $member->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
</x-admin-layout>


