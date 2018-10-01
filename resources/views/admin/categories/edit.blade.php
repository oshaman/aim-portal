{!! Form::open([
        'url'=>route('admin.categories.update', $category->id),
         'class'=>'contact-form',
          'method'=>'put',
           'files'=>'true'
]) !!}
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{__('admin.category_name')}}</h3>

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
                    {!! Form::label(__('admin.ua_category_name')) !!}
                    {!! Form::text(
                    'properties[uk][name]',
                    $category->ukProperties->name,
                    ['class'=>'form-control', 'required'=>'required', 'placeholder'=>__('admin.enter_category_name')]
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
                    $category->ruProperties->name,
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
                 $category->slug,
                 ['class'=>'form-control', 'required'=>'required', 'placeholder'=>__('admin.enter_slug')])
                  !!}
            </div>
        </div>
    </div>

</div>
<div class="box box-info">

    <div class="box-header with-border">
        {!! Form::label('image', __('admin.image')) !!}
        <small>{{ __('admin.category_image_recommendations') }}</small>
    </div>
    <div class="form-group">
        <div class="box-body">
            <img src="{{ $category->getImage() }}" class="img-fluid img-thumbnail" />
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
                {{Form::text('imgalt', $category->image->imgalt??null,['class'=>'form-control', 'placeholder'=>'Alt'])}}
            </div>
            <div class="col-md-6">
                {!! Form::label('imgtitle', 'Title') !!}
                {{Form::text('imgtitle', $category->image->imgtitle??null,['class'=>'form-control', 'placeholder'=>'Title'])}}
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
                      $category->parent_id,
                      ['class' => 'form-control select2','placeholder'=>__('admin.all_categories')])
            }}
            </div>
            <div class="checkbox box-footer">
                <label>
                    {{Form::checkbox('approved', true, $category->approved, ['class'=>'minimal'])}}
                    {{ __('admin.category_approved') }}
                </label>
            </div>
        </div>
    </div>
</div>
<!-- Submit -->
<div class="box-footer">
    {!! Form::button(__('admin.edit'), ['class' => 'btn btn-primary','type'=>'submit']) !!}
</div>
{!! Form::close() !!}
