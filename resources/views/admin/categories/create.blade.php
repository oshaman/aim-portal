{!! Form::open(['url'=>route('admin.categories.store'), 'class'=>'contact-form', 'method'=>'post', 'files'=>'true']) !!}
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{__('admin.category_name')}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label(__('admin.ua_category_name')) !!}
                    {!! Form::text(
                    'properties[uk][name]',
                    null,
                    ['class'=>'form-control ru-title', 'required'=>'required', 'placeholder'=>__('admin.enter_category_name')]
                    ) !!}
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label(__('admin.ru_category_name')) !!}
                    {!! Form::text(
                    'properties[ru][name]',
                    null,
                    ['class'=>'form-control', 'required'=>'required', 'placeholder'=>__('admin.enter_category_name')]
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
        {!! Form::label('slug', __('admin.slug')) !!}
    </div>
    <div class="form-group">
        <div class="box-body">

            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                {!! Form::text(
                'slug',
                 null,
                 ['class'=>'form-control eng-alias', 'required'=>'required', 'placeholder'=>__('admin.enter_slug')])
                  !!}
            </div>
        </div>
    </div>

</div>
<div class="box box-info collapsed-box">

    <div class="box-header with-border">
        {!! Form::label('image', __('admin.image')) !!}
        <small>{{ __('admin.category_image_recommendations') }}</small>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="form-group">
        <div class="box-body">

            <div class="input-group col-md-6">
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
        {!! Form::label('slug', __('admin.category_parent')) !!}
    </div>
    <div class="form-group">
        <div class="box-body">
            <div class="form-group">
                {{Form::select('parent_id',
                      $categories,
                      null,
                      ['class' => 'form-control select2','placeholder'=>__('admin.all_categories')])
            }}
            </div>
            <div class="checkbox box-footer">
                <label>
                    {{Form::checkbox('approved', true, null, ['class'=>'minimal'])}}
                    {{ __('admin.category_approved') }}
                </label>
            </div>
        </div>
    </div>
</div>
<!-- Submit -->
<div class="box-footer">
    {!! Form::button(__('admin.create'), ['class' => 'btn btn-primary','type'=>'submit']) !!}
</div>
{!! Form::close() !!}
