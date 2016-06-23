@extends('layouts.default')

@section('nav')
<nav id="navigation_bar" class="navbar navbar-dark bg-inverse">
<div class="container">
<!-- Brand -->
<a class="navbar-brand" href="#">Logo</a>

<!-- Links -->
<ul class="nav navbar-nav pull-md-right">
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
    {{Auth::user()->name}}
    </a>
    <div class="dropdown-menu" aria-labelledby="Preview">
    <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
    </div>
    </li>
</ul>
</div>
</nav>
@endsection

@section('main')
<div class="container">
<div class="row">
    <div class="row">
    <?php $loop_counter=0; ?>
    @foreach($teachers as $teacher)
        <div class="col-xl-4">
            <div class="card">
                <div id="{{$teacher->id}}" class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="teacher-photo col-md-4 col-sm-4 col-lg-3 col-xl-6">
                                <img src="{{$teacher->photo}}">
                            </div>
                            <div class="col-md-6">
                                {{$teacher->surname}} {{$teacher->name}} <br> Ηλικία: {{$teacher->age}}
                            </div>
                        </div>
                    </div>
                </div>
                <ul id="list_{{$teacher->id}}" class="list-group list-group-flush lessons-container min-hei">
                    @foreach($teacher->lesson as $lesson)
                    <form id="edit_save_form_{{$lesson->id}}" method="POST" action="{{url('/grade/save')}}">
                    <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
                    {{ csrf_field() }}
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-4 col-md-4 col-lg-3 col-xl-6" style="padding-top:7px">
                                    {{$lesson->name}}
                                </div>
                                    @if(array_key_exists($lesson->id,$grades_final))
                                        <div class="col-sm-3">
                                            <input id="input_{{$lesson->id}}" style="text-align:center;" class="form-control" type="text" name="grade" value="{{$grades_final[$lesson->id]}}" disabled>
                                        </div>
                                        <div id="edit_container_{{$lesson->id}}" class="col-sm-3">
                                            <button class="btn btn-secondary" type="button" id="edit_{{$lesson->id}}"><img id="icon_{{$lesson->id}}" src="images/edit.png"></button>
                                        </div>
                                    @else
                                        <div class="col-sm-3">
                                            <input id="input_{{$lesson->id}}" style="text-align:center;" class="form-control" type="text" name="grade">
                                        </div>
                                        <div  class="col-sm-3">
                                            <button class="btn btn-secondary" type="submit" id="edit_{{$lesson->id}}"><img id="icon_{{$lesson->id}}" src="images/save.png"></button>
                                        </div>
                                    @endif
                            </div>
                        </li>
                    </form>
                    @endforeach
                </ul>
            </div>
        </div>
    @if(fmod($loop_counter,3)==2)
        </div>
    @endif
    @if(fmod($loop_counter,3)==2 && $loop_counter!=sizeof($teachers))
        <div class="row">
    @endif
    <?php $loop_counter++; ?>
    @endforeach
</div>
@endsection

@section('js')
<script type="text/javascript">
    function open_drawer(id) {
        $('#list_'.concat(id)).removeClass('min-hei');
        $('#list_'.concat(id)).addClass('max-hei');
    }

    function close_drawer(id) {
        $('#list_'.concat(id)).removeClass('max-hei');
        $('#list_'.concat(id)).addClass('min-hei');
    }

    function drawer_is_open(id) {
        if($('#list_'.concat(id)).hasClass('max-hei')){
            return true;
        }
        return false;
    }

    $('.card-header').click(function(){

        var id = $(this).attr('id');
        if(drawer_is_open(id)){
            close_drawer(id);
        }else{
            open_drawer(id);
        }

    });

    $('.btn-secondary').click(function(){

        if($(this).attr('type')==="button"){
            var string_id = $(this).attr('id');
            var id = string_id.split('_')[1];
            $('#edit_save_form_'.concat(id)).attr('action','/grade/edit');
            $('#input_'.concat(id)).prop('disabled',false);
            $('#edit_container_'.concat(id)).empty();
            $('#edit_container_'.concat(id)).append("<button class='btn btn-secondary' id='edit_"+id+"' type='submit'><img id='icon_"+id+"' src='images/save.png'></button>");
        }
    });

</script>
@endsection
