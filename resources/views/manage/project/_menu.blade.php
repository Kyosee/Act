<div class="col-md-1">
    <div class="list-group fixed">
        <a href="{{ route('wechat.project.show', [$wechat, $project]) }}" class="list-group-item {{ request()->route()->action['as'] == 'wechat.project.show'? 'active' : '' }}">
            应用信息
        </a>
        <a href="{{ route('wechat.project.edit', [$wechat, $project]) }}" class="list-group-item {{ request()->route()->action['as'] == 'wechat.project.edit'? 'active' : '' }}">
            修改应用
        </a>
        <a href="{{ route('wechat.project.prize.index', [$wechat, $project]) }}" class="list-group-item {{ request()->is("manage/wechat/$wechat->id/project/$project->id/prize*") ? 'active' : '' }}">
            管理奖品
        </a>
        <a href="{{ route('wechat.project.prize.log', [$wechat, $project]) }}" class="list-group-item {{ request()->is("manage/wechat/$wechat->id/project/$project->id/log") ? 'active' : '' }}">
            中奖纪录
        </a>
        <a href="{{ route('wechat.project.ticket.index', [$wechat, $project]) }}" class="list-group-item {{ request()->is("manage/wechat/$wechat->id/project/$project->id/ticket") ? 'active' : '' }}">
            订单管理
        </a>
    </div>
</div>
