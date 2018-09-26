<div class="box box-primary">
    {!! Form::open(['url'=>route('admin.categories.store'), 'class'=>'contact-form', 'method'=>'post']) !!}
    <div class="box-body">

        <div class="form-group">
            {!! Form::label('slug', trans('admin.slug')) !!}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                {!! Form::text('slug', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>trans('admin.enter_slug')]) !!}
            </div>
        </div>
    </div>
    <!-- Submit -->
    <div class="box-footer">
        {!! Form::button(trans('admin.create'), ['class' => 'btn btn-primary','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
</div>