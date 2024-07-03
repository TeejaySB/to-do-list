@extends('tasks')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-4 form-container">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="task" placeholder="New Task">
                </div>
                <button class="btn btn-primary btn-block" type="submit">Add</button>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $index => $task)
                    <tr>
                        <td class="col-md-1">{{ $index + 1 }}</td>
                        <td class="{{ $task->completed ? 'text-muted' : '' }}">
                            @if ($task->completed)
                                <del>{{ $task->task }}</del>
                            @else
                                {{ $task->task }}
                            @endif
                        </td>
                        <td class="col-md-2">
                            @if (!$task->completed)
                            <form action="{{ route('tasks.update', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">
                                    <span class="glyphicon glyphicon-ok"></span>
                                </button>
                            </form>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
