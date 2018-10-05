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
        @if($menu)
            {!! $menu->asUl(
                    ['class' => 'sidebar-menu', 'data-widget'=>'tree'],
                    ['class'=>'treeview-menu']
                )
             !!}
        @endif
    </section>
    <iframe src="{{asset('images/calendar.svg')}}" width="150px"></iframe>

    <!-- /.sidebar -->
</aside>
