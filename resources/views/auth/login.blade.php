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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        @if($errors->has('password') || $errors->has('name') || $errors->has('password_confirmation'))
                            <div id="input_container" class="max-hei">
                        @elseif($errors->has('email'))
                            <div id="input_container" class="err-hei">
                        @else
                            <div id="input_container" class="">
                        @endif
                            <fieldset class="form-group">
                                <label for="email">E-mail</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
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

                            <fieldset class="form-group">
                                <label for="password_confirmation">Password confirmation</label>
                                <input type="password" class="form-control" id="first_name" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
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

@endsection

@section('js')
<script type="text/javascript">
    $('#register_link').click(function(){
        $('#input_container').css('max-height','40rem');
        $("form").attr("action", "/register");
        $('#sign_up').css('opacity','1');
        $('#login').css('opacity','0');
    });
</script>
@stop
