@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-secondary btn-sm float-end" href={{route('admin.roles.create')}}>Add</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Permissions</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($roles as $index=>$role)
                <tr>
                <td>{{$index}}</td>
                <td>{{$role->title}}</td>
                <td>@foreach ($role->permissions as $permission)
                    <span class="badge bg-primary mx-1">{{$permission->title}}</span>
                    @endforeach</td>
                <td class="d-flex justify-content-between">
                    <a class="btn btn-secondary btn-sm" href={{route('admin.roles.show',$role->id)}}>show</a>
                    <a class="btn btn-warning btn-sm mx-2" href={{route('admin.roles.edit',$role->id)}}>edit</a>
                    <form action="{{route('admin.roles.destroy',$role->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">delete</button>
                    </form>
                </td>
              </tr>
            @endforeach

        </tbody>
      </table>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
