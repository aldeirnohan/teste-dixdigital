@extends('layouts.app', ['page' => __('News Edit'), 'pageSlug' => 'news'])

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Edit News</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('news.index') }}" class="btn btn-sm btn-primary">Back to News</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('news.update', $news->id) }}">
                    @csrf
                    @method('PUT')

                    @include('alerts.success')

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
                    </div>

                    <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea class="form-control" id="content" name="content" rows="4">{{ $news->content }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update News</button>
                </form>
            </div>
        </div>
    </div>
@endsection
