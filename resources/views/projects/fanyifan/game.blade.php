@extends('projects.fanyifan._default')
@section('head')
    <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <script src="/libs/layui/layui.js"></script>
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
<div class="model" >
	<div class="prize_img">
		
	</div>
	<img class="exc_btn not_exchange_btn" src="/images/projects/{{ $project->template->template_folder }}/bt_hexiao.png" alt="">
	<img class="exc_btn is_exchange_btn" src="/images/projects/{{ $project->template->template_folder }}/bt_yidui.png" alt="">
	<img class="exc_btn back_btn" src="/images/projects/{{ $project->template->template_folder }}/bt_jixu.png" alt="">
</div>
<script>
    $(function(){
		layui.use(['layer', 'form'], function(){
			var layer = layui.layer
			,form = layui.form;
		});

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
                    	$(".back_btn").hide();
                    	$(".not_exchange_btn").hide();
                        $(".is_exchange_btn").hide();

                        if(data.is_lucky || data.model){
                            model = data.model

                            if(data.exchange == 1 && data.is_lucky){
	                            $(".is_exchange_btn").show();
	                        }else if(data.exchange == 0 && data.is_lucky){
	                            $(".not_exchange_btn").show();
	                        }else if(!data.exchange && data.is_lucky === false){
	                            $(".back_btn").show();
	                        }
                        }else{
                        	if(!data.exchange && data.is_lucky === false){
	                            $(".back_btn").show();
	                        }
                        }

                        $('.prize_img').html(model)
                        toggleModel()
                    }
                })
            }else{
                return false;
            }
        });
    })

    $(".back_btn").click(function(event) {
    	toggleModel();
    });

    $(".model").delegate('.prize_img', 'click', function(){
    	toggleModel();
    });
    
    var toggleModel = function(){
        $(".box").toggle();
        $(".model").toggle();
    }

    $(".not_exchange_btn").click(function() {
		layer.prompt({title: '请输入核销密码', formType: 1}, function(pass, index){
			layer.close(index);
			$.ajax({
				url: "{{ '/app/'.$project->id.'/exchange' }}",
				type: 'post',
				data: {pass: pass},
				success: function(data){
					if(data){
						layer.alert('核销成功', {
						  closeBtn: 0
						},function(){
							location.reload();
						})
					}else{
						layer.msg('核销失败或密码错误');
					}
				}
			})
		});
    });
</script>
@endsection
