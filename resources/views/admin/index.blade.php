@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

    <h2>Manage User Roles</h2>

    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Roles</th>
                <th>Assign Role</th>
                <th>Remove Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                    <td>
                        <form action="{{ route('admin.assign-role', $user->id) }}" method="POST">
                            @csrf
                            <select name="role" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Assign</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.remove-role', $user->id) }}" method="POST">
                            @csrf
                            <select name="role" class="form-control">
                                @foreach($user->getRoleNames() as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-danger mt-2">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
