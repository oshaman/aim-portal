<div class="box box-primary">
    {!! Form::open(['url'=>route('admin.users.store'), 'class'=>'contact-form', 'method'=>'post']) !!}
    <div class="box-body">

        <div class="form-group">
            {!! Form::label('email', trans('admin.email')) !!}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                {!! Form::email('email', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>trans('admin.enter_email')]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password', trans('admin.password')) !!}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                {!! Form::password('password', ['class'=>'form-control', 'required'=>'required', 'placeholder'=>trans('admin.enter_password')]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('permissions', trans('admin.permissions')) !!}

            {{Form::select('permissions[]',
                      $permissions,
                      null,
                      ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>trans('admin.enter_permissions')])
            }}
        </div>
    </div>
    <!-- Submit -->
    <div class="box-footer">
        {!! Form::button(trans('admin.create'), ['class' => 'btn btn-primary','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
</div>