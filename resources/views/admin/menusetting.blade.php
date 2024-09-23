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
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($menuItems as $menuItem)
                <tr>
                    <td>{{ $menuItem->name }}</td>
                    <td>{{ $menuItem->url }}</td>
                    <td>{{ $menuItem->role_id }}</td>
                    <td>{{ $menuItem->is_active }}</td>
                    <td>
                        @if($menuItem->is_active == true)
                            <form action="{{ route('menu.deactivedMenu', $menuItem->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger mt-2">Deactive</button>
                            </form>
                        @else
                            <form action="{{ route('menu.activedMenu', $menuItem->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success mt-2">Active</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Button to trigger the modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Menu Item
    </button>

    <!-- Modal Structure -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('menu.storeMenu')}}" method="POST">
                        @csrf
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Menu Item's Name" required>
                        <label for="url">URL</label>
                        <input type="text" name="url" id="url" class="form-control" placeholder="Menu Item's URL" required>
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
