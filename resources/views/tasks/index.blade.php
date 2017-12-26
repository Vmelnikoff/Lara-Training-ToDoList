@extends('layouts.app')

@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Список задач</h3>
                </div>
                <div class="panel-body">

                    <table class="table table-striped table-condensed table-responsive">
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>
                                    @if ($task->status === 'new')

                                        <form action="{{ url('tasks/update/' . $task->id . '/done') }}" method="post">
                                            <button type="submit" class="btn btn-danger btn-link">
                                                <i class="fa fa-square-o fa-2x" aria-hidden="true"></i>
                                            </button>
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                        </form>

                                        &nbsp {{ $task->title }}
                                    @elseif ($task->status === 'done')

                                        <form action="{{ url('tasks/update/' . $task->id . '/new') }}" method="post">
                                            <button type="submit" class="btn btn-danger btn-link">
                                                <i class="fa fa-check-square fa-2x" aria-hidden="true"></i>
                                            </button>
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                        </form>

                                        &nbsp <span class="executed">{{ $task->title }}</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="row">
                                        <a href="{{ url('tasks/' . $task->id)}}"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                                        <a href="{{ url('tasks/' . $task->id . '/edit')}}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>

                                        <form action="{{ url('tasks/' . $task->id) . '/destroy'}}" method="post">
                                            <button type="submit" class="btn btn-danger btn-link">
                                                <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                            </button>
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    @if (count($tasks) < 1)
                        <p class="text-center">У Вас еще нет добавленных задач</p>
                    @endif

                    <a href="{{ route ('tasks.create') }}" class="btn btn-success btn-block">Добавить задачу</a>

                </div>
            </div>
        </div>
    </div>

@endsection

