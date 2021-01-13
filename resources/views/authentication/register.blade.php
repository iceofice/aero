@extends('layout.authentication')
@section('title', 'Register')
@section('content')
<div class="row">
    <div class="col-lg-4 col-sm-12">
        <form class="card auth_form" action="{{route('authentication.register')}}" method="post">
            {{ csrf_field() }}
            <div class="header">
                <img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="">
                <h5>Sign Up</h5>
                <span>Register a new membership</span>
            </div>
            <div class="body">
                @if (count($errors)>0)
                <p class="alert alert-danger">{{$errors->first()}}</p>
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter Username" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter Email" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                </div>                        
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name= "password" placeholder="Enter Password" required>
                    <div class="input-group-append">                                
                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                    </div>                            
                </div>
                    <input id="agree" type="checkbox" required> 
                    <label for="agree">I read and agree to the <a href="javascript:void(0);">terms of usage</a></label>
                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light" >SIGN UP</button>
                <div class="signin_with mt-3">
                    <a class="link" href="{{route('authentication.login')}}">You already have a membership?</a>
                </div>
            </div>
        </form>
        <div class="copyright text-center">
            &copy;
            <script>document.write(new Date().getFullYear())</script>,
            <span>Designed by <a href="https://thememakker.com/" target="_blank">ThemeMakker</a></span>
        </div>
    </div>
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <img src="{{asset('assets/images/signup.svg')}}" alt="Sign Up" />
        </div>
    </div>
</div>
@stop