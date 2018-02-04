<div class="col-md-1">
    <div class="list-group fixed">
        <a href="{{ route('manage.user.index') }}" class="list-group-item {{ request()->route()->action['as'] == 'manage.user.index'? 'active' : '' }}">
            用户中心
        </a>
        <a href="{{ route('manage.user.edit') }}" class="list-group-item {{ request()->route()->action['as'] == 'manage.user.edit'? 'active' : '' }}">
            资料修改
        </a>
        <a href="{{ route('manage.user.security') }}" class="list-group-item {{ request()->route()->action['as'] == 'manage.user.security'? 'active' : '' }}">
            安全中心
        </a>
    </div>
</div>
