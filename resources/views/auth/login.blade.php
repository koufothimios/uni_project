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
                            <div id="fieldset_container">
                            <fieldset class="form-group">
                                <label for="first_name">Username</label>
                                <div class="rel">
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
                                <div class="rel">
                                    <input type="password" class="form-control" id="password" name="password">
                                    <input type="password" class="form-control" id="password2" name="password2">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color:red;">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </fieldset>

                            <fieldset id="2" class="form-group">
                                <label for="first_name">Username</label>
                                <div class="rel">
                                    <input type="text" class="form-control" id="email3" name="email3">
                                </div>
                            </fieldset>
                            <fieldset id="3" style="position:relative;top:0;" class="form-group">
                                <label for="last_name">Password</label>
                                <div class="rel">
                                    <input type="password" class="form-control" id="password3" name="password3">
                                </div>
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
    <script src="js/jquery.transform2d.js"></script>

    <script type="text/javascript">
        function makeTranslations(translation_array) {
            for(var i=0;i<translation_array.length;i++){
                $('#'.concat(translation_array[i])).animate({
                    transform: 'translateX(250px)'
                });
            }
        }

        function hide(el) {
            for(var i=0;i<el.length;i++){
                $('#'.concat(el[i])).addClass('not-visible');
            }
        }

        $('#register_link').click(function(){
            makeTranslations(['email','email2','login','sign_up','password','password2','register_link','sign_in']);
            hide(['reset','2','3']);

        });

        $('#sign_in').click(function(){
            window.location.replace('/login');
        });

        $("#sign_form").attr("action", "/register");

    </script>
@stop
