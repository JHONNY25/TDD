@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="button" class="btn btn-success mb-3">Crear tarea</button>

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tarea</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Asignado a</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <th scope="row">{{ $task->id }}</th>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->user->name }}</td>
                            <td>
                                <button onclick="editTask({{ $task->id }})" type="button" class="btn btn-primary">Editar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>

              {{ $tasks->links() }}
        </div>
    </div>
</div>
@endsection
