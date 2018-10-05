<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{trans('admin.all_users')}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        {{ $users->links() }}
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>E-mail</th>
                <th>{{trans('admin.roles')}}</th>
                <th>{{trans('admin.status')}}</th>
                <th>{{trans('admin.user_date')}}</th>
                <th>{{trans('admin.actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach($user->roles as $role)
                            @if('admin' === $role->name)
                                <span class="label label-danger">{{ trans('roles.' . $role->name) }}</span>
                            @else
                                <span class="label label-primary">{{ trans('roles.' . $role->name) }}</span>
                            @endif
                        @endforeach
                    </td>
                    <td>{!! $user->verified ? '<i class="fa fa-thumbs-o-up"></i>' : '<i class="fa fa-thumbs-down"></i>' !!}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <a href="{{route('admin.users.edit', $user->id)}}" class="fa fa-pencil" title="{{trans('admin.edit')}}"></a>
                        <a href="{{--{{route('users.edit', $user->id)}}--}}" class="fa fa-lock" title="{{trans('admin.ban')}}"></a>
                        {{Form::open(['route'=>['admin.users.destroy', $user->id], 'method'=>'delete'])}}
                        <button onclick="return confirm({{trans('admin.sure')}})" type="submit" class="delete"  title="{{trans('admin.delete')}}">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        {{Form::close()}}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{ $users->links() }}

    </div>
<!-- /.box-body -->
</div>
