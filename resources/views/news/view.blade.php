@extends('layouts.app', ['page' => __('News View'), 'pageSlug' => 'news'])

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">View News</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('news.index') }}" class="btn btn-sm btn-primary">Back to News</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Title:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $news->title }}" readonly>
                </div>

                <div class="form-group">
                    <label for="email">Content:</label>
                    <textarea class="form-control" id="content" name="content" rows="4" readonly>{{ $news->content }}</textarea>
                </div>

                <div class="form-group">
                    <label for="created_at">Created At:</label>
                    <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $news->created_at }}" readonly>
                </div>

                <div class="form-group">
                    <label for="updated_at">Updated At:</label>
                    <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $news->updated_at }}" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection
