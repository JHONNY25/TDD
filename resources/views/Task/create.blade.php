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
            <form action="{{ isset($task) ? route('updateTask') : route('saveTask') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input value="{{ isset($task) ? $task->name : '' }}" name="name" type="text" class="form-control" id="name" placeholder="Ingresa el nombre de la tarea">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input value="{{ isset($task) ? $task->description : '' }}" name="description" type="text" class="form-control" id="description" placeholder="Ingresa la descripción de la tarea">
                </div>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="user">Asigar a :</label>
                  <select name="user" class="form-control" id="user">
                      @if (isset($task))
                        <option selected value="{{ $task->user->id }}">{{ $task->user->name }}</option>
                      @endif
                      @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endforeach
                  </select>
                </div>
                @error('user')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input value="{{ isset($task) ? $task->id : '' }}" name="id" type="hidden">

                <button type="submit" class="w-100 btn btn-primary">{{ isset($task) ? 'Actualizar' : 'Crear' }}</button>
              </form>
        </div>
    </div>
</div>
@endsection
