<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/author.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->email }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        {{--<ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Админ-панель</span>
                </a>
            </li>
            <li><a href="{{route('services.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Посты</span></a></li>
            <li><a href="#"><i class="fa fa-beer"></i> <span>Профили</span></a></li>
            <li><a href="#"><i class="fa fa-tags"></i> <span>Теги</span></a></li>
            <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
            <li><a href="#"><i class="fa fa-user-plus"></i> <span>Подписчики</span></a></li>

        </ul>--}}
        @if($menu)

            {{--{!! $menu->asUl(['class'=>'sidebar-menu', 'data-widget'=>'tree']) !!}--}}
            {!! $menu->asUl(
                    ['class' => 'sidebar-menu', 'data-widget'=>'tree'],
                    ['class'=>'treeview-menu']
                )
             !!}

        @endif
    </section>
    <!-- /.sidebar -->
</aside>