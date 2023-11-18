@extends('layouts.app', ['pageSlug' => 'news'])

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title">News List</h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('news.create') }}" class="btn btn-sm btn-primary">Add News</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-12">
                    <form action="{{ route('news.search') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="query" placeholder="Search news...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('alerts.success')
            <table class="table tablesorter">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse  ($news as $new)
                        <tr>
                            <td>{{ $new->id }}</td>
                            <td>{{ $new->title }}</td>
                            <td>{{ $new->content }}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a href="{{ route('news.show', $new->id) }}" class="dropdown-item">View</a>
                                        <a href="{{ route('news.edit', $new->id) }}" class="dropdown-item">Edit</a>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#confirmDeleteModal{{$new->id}}">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal de confirmação de exclusão -->
                        <div class="modal fade" id="confirmDeleteModal{{$new->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
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
                                        <form action="{{ route('news.destroy', $new->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <!-- Adicione isso se não houver notícias -->
                        <tr>
                            <td colspan="4">No news found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
