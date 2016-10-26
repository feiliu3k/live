<ul class="nav navbar-nav">
    <li><a href="/">首页</a></li>
    @if (Auth::check())
        <li @if (Request::is('admin/weblive*')) class="active" @endif>
            <a href="{{ url('/admin/fre') }}">微直播</a>
        </li>
    @endif
</ul>

<ul class="nav navbar-nav navbar-right">
    @if (Auth::guest())
        <li><a href="{{ url('/login') }}">登陆</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                    aria-expanded="false">
                {{ Auth::user()->name }}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/resetpassword') }}">修改密码</a></li>
                <li><a href="{{ url('/logout') }}">注销</a></li>
            </ul>
        </li>
    @endif
</ul>