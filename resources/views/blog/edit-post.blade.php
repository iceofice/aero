@extends('layout.master')
@section('title', 'Edit Post')
@section('parentPageTitle', 'Blog')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
@stop
@section('content')
<form action="{{$post->id}}/edit" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="form-group">
                    <input type="text" class="form-control" name ="title" placeholder="Enter Blog title" required value ="{{$post->title}}"/>
                </div>
                <select class="form-control show-tick" name="cid">
                    @foreach($category as $cat)
                        <option value = "{{$cat->cid}}" @if ($post->cid==$cat->cid){{ 'selected' }}@endif > {{$cat->category}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card">
            <div class="body">
                    <span><strong>File choosen: {{$post->image}}</strong></span>
                    
            </div>
            <div class="body">
                Update File<br>
                <input type="file" name="image"/>
                </form>
            </div>
            <div>
                <textarea class="summernote" name='content'>{!! $post->content !!}</textarea>
                <button type="submit" class="btn btn-info waves-effect m-t-20">EDIT</button>
                <form action="{{$post->id}}/edit" method="POST" class="d-inline">
                    @method('DELETE')
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-danger waves-effect m-t-20">DELETE</button>
                </form>
            </div>
        </div>
    </div>            
</div>
</form>
@stop
@section('page-script')
<script src="{{asset('assets/plugins/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
@stop