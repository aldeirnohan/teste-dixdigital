@extends('layouts.app', ['page' => __('User View'), 'pageSlug' => 'users'])

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">View User</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">Back to Users</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                </div>

                {{-- Adicione outros campos conforme necessário --}}

                <div class="form-group">
                    <label for="created_at">Created At:</label>
                    <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $user->created_at }}" readonly>
                </div>

                <div class="form-group">
                    <label for="updated_at">Updated At:</label>
                    <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $user->updated_at }}" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection
