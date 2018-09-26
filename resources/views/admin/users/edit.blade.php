<div class="box box-primary">
    {!! Form::open(['url'=>route('admin.users.update', $user->id), 'class'=>'contact-form', 'method'=>'put']) !!}
    <div class="box-body">

        <div class="form-group">
            {!! Form::label('email', trans('admin.email')) !!}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                {!! Form::email('email', $user->email, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>trans('admin.enter_email')]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password', trans('admin.password')) !!}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>trans('admin.enter_password')]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('permissions', trans('admin.permissions')) !!}

            {{Form::select('permissions[]',
                      $permissions,
                      $availablePermissions,
                      ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>trans('admin.enter_permissions')])
            }}
        </div>
    </div>
    <!-- Submit -->
    <div class="box-footer">
        {!! Form::button(trans('admin.save'), ['class' => 'btn btn-primary','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
</div>