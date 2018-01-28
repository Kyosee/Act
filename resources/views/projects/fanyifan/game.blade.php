@extends('projects.fanyifan._default')
@section('head')
    <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="box">
    <img src="/images/projects/{{ $project->template->template_folder }}/all_bg.png" class="pa">
    <div class="row">
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img animated flipInX"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img animated flipInX"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img animated flipInX"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img animated flipInX"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img animated flipInX"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img animated flipInX"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img animated flipInX"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img animated flipInX"></div>
        <div class="col-xs-4"><img src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img animated flipInX"></div>
    </div>
    <img src="/images/projects/{{ $project->template->template_folder }}/guize.png" class="pa" style="left: -10px">
</div>
<div class="model">
    <img onclick="$('.model').hide()" src="" class="model_img" >
</div>
<script>
    $(function(){
        function shuffle(arr){
            var len = arr.length;
            for(var i = 0; i < len - 1; i++){
            var idx = Math.floor(Math.random() * (len - i));
            var temp = arr[idx];
            arr[idx] = arr[len - i - 1];
            arr[len - i -1] = temp;
            }
            return arr;
        }

        var arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        var newArr = shuffle(arr);

        $('.draw_img').each(function(index, el) {
            $(el).data('img',"/images/projects/{{ $project->template->template_folder }}/game_"+newArr[index]+".png");
            $(el).data('model',"/images/projects/{{ $project->template->template_folder }}/game_tan"+newArr[index]+".png");
            $(el).data('prize', newArr[index]);
        });

        $(".draw_img").click(function() {
            var _this = $(this);
            if(!_this.data('draw')){
                _this.data('draw', 1)
                _this.removeClass('flipInX')
                _this.addClass('flipInY')
                _this.attr('src', _this.data('img'));

                if(_this.data('prize') === 9){
                    $.ajax({
                        type: 'post',
                        success: function(data){

                        }
                    })
                }else{
                    $('.model_img').attr('src', _this.data('model'))
                    $('.model').show();
                }
            }else{
                return false;
            }
        });
    })
</script>
@endsection
