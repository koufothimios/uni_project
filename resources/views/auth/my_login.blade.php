@extends('layouts.default')

@section('main')
<div class="vertical-center">
    <div class="container">
        <div class="row">
            <div id="login_section" class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/images/logo.jpg" width="210px;" class="img-circle center-block" alt="Photo of bird in the Philippines">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form id="sign_form" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            @if($errors->has('password'))
                                <div id="input_container" class="max-hei">
                            @else
                                <div id="input_container" class="">
                            @endif
                                <fieldset class="form-group">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </fieldset>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                                <fieldset class="form-group">
                                    <label for="password_confirmation">Password confirmation</label>
                                    <input type="password" class="form-control" id="first_name" name="password_confirmation">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </fieldset>
                            </div>
                            <div class="full-width rel">
                                <button id="login" type="submit" class="btn btn-primary">Login</button>
                                <button id="sign_up" type="submit" class="btn btn-primary">Sign Up</button>
                            </div>
                            <div class="form-group">
                                <div class="rel">
                                    <a id="register_link" href="#">You don't have an account?</a>
                                    <a id="sign_in" href="#">Sign in</a>
                                </div>
                                <div><a id="reset" href="#">Forgot Your Password?</a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
    <script type="text/javascript">
        $('#register_link').click(function(){
            $('#input_container').css('max-height','40rem');
        });

        $('#sign_in').click(function(){
            $('#input_container').css('max-height','11rem');
        });

        $("#sign_form").attr("action", "/register");
    </script>
@stop
