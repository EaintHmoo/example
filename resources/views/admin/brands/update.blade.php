@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Branch</h1>
@stop

@section('content')
<div class="card p-4">
    <form action={{route('admin.brands.update',$brand)}} method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-4 my-2">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" value="{{old('title',$brand->title)}}" id="title" name="title">
                @if($errors->has('title'))
                <div class="text-sm text-danger">
                    {{$errors->first('title')}}
                </div>
                @endif
            </div>
            <div class="col-4 my-2">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if(isset($brand->image))
                <img src="{{asset('storage/'.$brand->image)}}" width="100px"/>
                @endif
                @if($errors->has('image'))
                <div class="text-sm text-danger">
                    {{$errors->first('image')}}
                </div>
                @endif
            </div>
            <div class="col-4 my-2">
                <label for="images" class="form-label">Images</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple>
                @if(isset($brand->media))
                <div class="row">
                    @foreach ($brand->media as $file)
                        <div class="col-3">
                            <img src="{{asset('storage/'.$file->url)}}" width="100px">
                        </div>
                    @endforeach
                </div>
                @endif
                @if($errors->has('images'))
                <div class="text-sm text-danger">
                    {{$errors->first('images')}}
                </div>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')

</script>
@stop
