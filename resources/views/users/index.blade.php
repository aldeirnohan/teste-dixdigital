@extends('layouts.app', ['pageSlug' => 'users'])

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title">Users List</h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Add user</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @include('alerts.success')
            <table class="table tablesorter">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a href="{{ route('users.show', $user->id) }}" class="dropdown-item">View</a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="dropdown-item">Edit</a>
                                        @if($user->id != auth()->user()->id)
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#confirmDeleteModal{{$user->id}}">Remove</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal de confirmação de exclusão -->
                        <div class="modal fade" id="confirmDeleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this user?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
