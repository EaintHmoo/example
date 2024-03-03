@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
<div class="card p-4">
    <form action={{route('admin.roles.update',$role->id)}} method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-4 my-2">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" value={{old('title',$role->title)}} id="title" name="title">
                @if($errors->has('title'))
                <div class="text-sm text-danger">
                    {{$errors->first('title')}}
                </div>
                @endif
            </div>
            <div class="col-4 my-2">
                <label for="title" class="form-label">Permission</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">Select All</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">Deselect All</span>
                </div>
                <select class="select2 form-control" name="permissions[]" multiple="multiple">
                    @foreach ($permissions as $id=>$permission)
                        <option value={{$id}} {{in_array($id,old('permissions',[])) || $role->permissions->contains($id)?'selected':''}}>{{$permission}}</option>
                    @endforeach
                    <option value="AL">Alabama</option>
                  </select>
                @if($errors->has('permissions'))
                <div class="text-sm text-danger">
                    {{$errors->first('permissions')}}
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.select-all').click(function () {
                let $select2 = $(this).parent().siblings('.select2')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            })
            $('.deselect-all').click(function () {
                let $select2 = $(this).parent().siblings('.select2')
                $select2.find('option').prop('selected', '')
                $select2.trigger('change')
            })
$('.select2').select2();
</script>
@stop
