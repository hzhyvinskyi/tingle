@extends('layouts.app')

@section('content')
    <div class="container">
        @include ('layouts._messages')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>All questions</h2>
                            <div class="ml-auto">
                                <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask question</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @foreach($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counters">
                                    <div class="vote">
                                        <strong>{{ $question->votes }}</strong> {{ str_plural('vote', $question->votes) }}
                                    </div>
                                    <div class="status {{ $question->status }}">
                                        <strong>{{ $question->answers_count }}</strong> {{ str_plural('answer', $question->answers_count) }}
                                    </div>
                                    <div class="view">
                                        {{ $question->views . ' ' . str_plural('view', $question->views) }}
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                        <div class="ml-auto">
                                            @can('update', $question)
                                                <a href="{{ route('questions.edit', $question->id) }}"
                                                   class="btn btn-sm btn-outline-info">Edit</a>
                                            @endcan
                                            @can('delete', $question)
                                                <form action="{{ route('questions.destroy', $question->id) }}"
                                                      method="post" class="form-delete" onclick="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                    <p class="lead">
                                        Asked by <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                        <small class="text-muted">{{ $question->created_date }}</small>
                                    </p>
                                    <p>{{ str_limit($question->text, 250) }}</p>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
