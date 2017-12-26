@extends('layouts.app')

@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Редактировать задачу</h3>
            </div>
            <div class="panel-body">

                <form action="{{ url('tasks/update/' . $task->id) }}" method="post" class="form">
                    <div class="form-group">
                        <input type="text" name="title" value="{{ $task->title }}" class="form-control" id="title"
                               placeholder="Введите название задачи">
                    </div>
                    @if ($errors->has('title'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('title') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <textarea name="description" placeholder="Введите описание задачи" id="description"
                                  class="form-control">{{ $task->description }}</textarea>
                    </div>
                    @if ($errors->has('description'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('description') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button class="btn btn-success btn-block" type="submit">Изменить задачу</button>
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                </form>

            </div>
        </div>
    </div>


@endsection