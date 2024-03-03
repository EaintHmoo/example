@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Role Show</h1>
@stop

@section('content')
<div class="card p-4">
    <table class="table">
        <tbody>
          <tr>
            <td>Title</td>
            <td>{{$role->title}}</td>
          </tr>
          <tr>
            <td>Permissions</td>
            <td>
                @foreach ($role->permissions as $permission)
                <span class="badge bg-primary mx-1">{{$permission->title}}</span>
                @endforeach
            </td>
          </tr>
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
