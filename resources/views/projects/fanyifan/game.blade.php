@extends('projects.fanyifan._default')
@section('content')
<div class="box">
    <img src="/images/projects/{{ $project->template->template_folder }}/all_bg.png" class="pa">
    <div class="row">
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img"></div>
    </div>
    <img src="/images/projects/{{ $project->template->template_folder }}/guize.png" class="pa" style="left: -10px">
</div>
<script>
    $(function(){
        $(".draw_img").click(function() {
            $.ajax({
                type: 'post',
                data: {'123': '123'},
                success: function(data){
                    
                }
            })
        });
    })
</script>
@endsection