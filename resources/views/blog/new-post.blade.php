@extends('layout.master')
@section('title', 'Blog Post')
@section('parentPageTitle', 'Blog')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
@stop
@section('content')
<form action="new-post" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="form-group">
                    <input type="text" class="form-control" name ="title" placeholder="Enter Blog title" required/>
                </div>
                <select class="form-control show-tick" name="category">
                    <option>Web Design</option>
                    <option>Photography</option>
                    <option>Technology</option>
                    <option>Lifestyle</option>
                    <option>Sports</option>
                </select>
            </div>
        </div>

        <div class="card">
            <div class="body">
                    <input type="file" name="image"/>
                </form>
            </div>
            <div>
                <textarea class="summernote" name='content'></textarea>
                <button type="submit" class="btn btn-info waves-effect m-t-20">POST</button>
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