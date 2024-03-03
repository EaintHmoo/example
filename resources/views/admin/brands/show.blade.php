@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Brand</h1>
@stop

@section('content')
<div class="card p-4">
    <table class="table">
        <tbody>
          <tr>
            <td>Title</td>
            <td>{{$brand->title}}</td>
          </tr>
          <tr>
            <td>Image</td>
            <td>
                <img src="{{asset('storage/'.$brand->image)}}"/>
            </td>
          </tr>
          <tr>
            <td>Images</td>
            <td>
                <div class="row">
                    @foreach ($brand->media as $file)
                    <div class="col-4">
                        <img src="{{asset('storage/'.$file->url)}}" class="w-100"/>
                    </div>
                    @endforeach
                </div>
            </td>
          </tr>
        </tbody>
      </table>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')

@stop
