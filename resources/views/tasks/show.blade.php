@extends('layouts.app')

@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Посмотреть задачу</h3>
            </div>
            <div class="panel-body">

                <table class="table table-striped table-hover table-condensed table-responsive">
                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $task->id }}</td>
                    </tr>
                    <tr>
                        <td>Название</td>
                        <td>{{ $task->title }}</td>
                    </tr>
                    <tr>
                        <td>Описание</td>
                        <td>{{ $task->description }}</td>
                    </tr>
                    <tr>
                        <td>Дата создания</td>
                        <td>{{ $task->created_at->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <td>Дата изменения</td>
                        <td>{{ $task->updated_at->format('d-m-Y') }}</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


@endsection