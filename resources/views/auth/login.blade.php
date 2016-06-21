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
                        <form role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <fieldset class="form-group">
                                <label for="first_name">Username</label>
                                <div style="position:relative;top:0;height:2rem">
                                    <input type="text" class="form-control" id="email" name="email">
                                    <input type="text" class="form-control" id="email2" name="email2">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color:red;">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </fieldset>
                            <fieldset style="position:relative;top:0;" class="form-group">
                                <label for="last_name">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color:red;">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </fieldset>
                            <div class="full-width rel">
                                <button id="login" type="submit" class="btn btn-primary">Login</button>
                                <button id="sign" type="submit" class="btn btn-primary">Sign Up</button>
                            </div>
                            <div class="form-group">
                                <div><a id="register_link" href="#">You don't have an account?</a></div>
                                <div><a id="test" href="#">Forgot Your Password?</a></div>
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
    <script src="js/jquery.transform2d.js"></script>

    <script type="text/javascript">
        $('#register_link').click(function(){
            //$(this).addClass('not-visible');
            $('#email').animate({
              transform: 'translateX(250px)'
            });
            $('#login').animate({
              transform: 'translateX(250px)'
            });
            $('#email2').animate({
              transform: 'translateX(250px)'
            });
            $('#sign').animate({
              transform: 'translateX(250px)'
            });
        });
        $('#test').click(function(){
            //$('#register_link').removeClass('not-visible');
        });
    </script>
@stop
