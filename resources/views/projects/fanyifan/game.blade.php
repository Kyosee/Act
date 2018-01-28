@extends('projects.fanyifan._default')
@section('head')
    <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
@endsection
@section('content')
    <img src="/images/projects/{{ $project->template->template_folder }}/all_bg.png" class="pa">
<div class="box">
    <div class="row">
        @foreach ($prizes as $prize)
            @if(isset($prize['has_draw']))
                <div class="col-xs-4"><img width="180" height="168"data-model="{{ $prize['prize_desc'] }}" data-prize="{{ $prize['id'] }}" data-special="{{ $prize['is_special'] }}" src="{{ $prize['prize_img'] }}" class="draw_img animated flipInX"></div>
            @else
                <div class="col-xs-4"><img width="181" height="168" data-img="{{ $prize['prize_img'] }}" data-model="{{ $prize['prize_desc'] }}" data-prize="{{ $prize['id'] }}" data-special="{{ $prize['is_special'] }}" src="/images/projects/{{ $project->template->template_folder }}/game_fan.png" class="draw_img animated flipInX"></div>
            @endif
        @endforeach
    </div>
    <img src="/images/projects/{{ $project->template->template_folder }}/guize.png" class="pa" style="left: -10px">
</div>
<div class="model" onclick="toggleModel()">
</div>
<script>
    $(function(){
        $(".draw_img").click(function() {
            var _this = $(this);
            if(!_this.data('draw')){
                _this.removeClass('flipInX')
                _this.addClass('flipInY')
                _this.attr('src', _this.data('img'));
                var model = _this.data('model');

                $.ajax({
                    type: 'post',
                    async: false,
                    data: {
                        'prize': _this.data('prize'),
                        'special': _this.data('special')
                    },
                    success: function(data){
                        if(data.is_lucky){
                            model = data.model
                        }
                        $('.model').html(model)
                        toggleModel()
                    }
                })
            }else{
                return false;
            }
        });
    })

    var toggleModel = function(){
        $(".box").toggle();
        $(".model").toggle();
    }
</script>
@endsection
