@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

    <h2>Menu Settings</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>url</th>
                <th>role </th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menuItems as $menuItem)
                <tr>
                    <td>{{ $menuItem->name }}</td>
                    <td>{{ $menuItem->url }}</td>
                    <td>{{ $menuItem->role_id }}</td>
                    <td>{{ $menuItem->is_active }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
