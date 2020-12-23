@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <a href="{{ route('createTask') }}" type="button" class="btn btn-success mb-3">Crear tarea</a>

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
                            <td class="d-flex">
                                <a href="{{ route('viewUpdateTask',['id' => $task->id]) }}" type="button" class="btn btn-sm btn-primary" style="width: 100px;">Editar</a>
                                <form action="{{ route('removeTask') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $task->id }}" name="id">
                                    <button type="submit" class="btn btn-sm btn-danger ml-2" style="width: 100px;">Eliminar tarea</button>
                                </form>
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
