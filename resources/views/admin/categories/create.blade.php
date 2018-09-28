{!! Form::open(['url'=>route('admin.categories.store'), 'class'=>'contact-form', 'method'=>'post', 'files'=>'true']) !!}
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('admin.category_name')}}</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label(trans('admin.ua_category_name')) !!}
                    {!! Form::text(
                    'properties[uk][name]',
                    null,
                    ['class'=>'form-control ru-title', 'required'=>'required', 'placeholder'=>trans('admin.enter_category_name')]
                    ) !!}
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label(trans('admin.ru_category_name')) !!}
                    {!! Form::text(
                    'properties[ru][name]',
                    null,
                    ['class'=>'form-control', 'required'=>'required', 'placeholder'=>trans('admin.enter_category_name')]
                    ) !!}
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>


</div>
<div class="box box-danger">

    <div class="box-header with-border">
        {!! Form::label('slug', trans('admin.slug')) !!}
    </div>
    <div class="form-group">
        <div class="box-body">

            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                {!! Form::text(
                'slug',
                 null,
                 ['class'=>'form-control eng-alias', 'required'=>'required', 'placeholder'=>trans('admin.enter_slug')])
                  !!}
            </div>
        </div>
    </div>

</div>
<div class="box box-info">

    <div class="box-header with-border">
        {!! Form::label('image', trans('admin.image')) !!}
        <small>{{ __('admin.category_image_recommendations') }}</small>
    </div>
    <div class="form-group">
        <div class="box-body">

            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-image"></i></span>
                {!! Form::file('image', ['accept'=>'image/*', 'id'=>'image', 'class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="form-group box-body">
        <div class="row">
            <div class="col-md-6">
                {!! Form::label('imgalt', 'Alt') !!}
                {{Form::text('imgalt', null,['class'=>'form-control', 'placeholder'=>'Alt'])}}
            </div>
            <div class="col-md-6">
                {!! Form::label('imgtitle', 'Title') !!}
                {{Form::text('imgtitle', null,['class'=>'form-control', 'placeholder'=>'Title'])}}
            </div>
        </div>

    </div>
</div>

<div class="box box-success">
    <div class="box-header with-border">
        {!! Form::label('slug', trans('admin.category_parent')) !!}
    </div>
    <div class="form-group">
        <div class="box-body">
            <div class="input-group">
                {{Form::select('parent_id',
                      $categories,
                      null,
                      ['class' => 'form-control select2','data-placeholder'=>trans('admin.all_categories')])
            }}
            </div>
            <div class="checkbox box-footer">
                {{--{!! Form::label('approved', trans('admin.approved')) !!}--}}
                <label>
                    {{Form::checkbox('approved', true, null, ['class'=>'minimal'])}}
                    {{ trans('admin.category_approved') }}
                </label>
            </div>
        </div>
    </div>
</div>
<!-- Submit -->
<div class="box-footer">
    {!! Form::button(trans('admin.create'), ['class' => 'btn btn-primary','type'=>'submit']) !!}
</div>
{!! Form::close() !!}