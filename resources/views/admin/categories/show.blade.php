<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $category->MainProperties->name }}</h3>

    </div>
    <div class="box-body">
        <div class="form-group col-md-2">

            <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-app"
               title="{{__('admin.edit')}}">
                <i class="fa fa-edit"></i>{{__('admin.edit')}}
            </a>
        </div>
        <div class="form-group col-md-2">
            <div class="box-body">
                <img src="{{ $category->getImage() }}" class="img-fluid img-thumbnail"/>
            </div>
        </div>
    </div>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{ __('admin.child_elements') }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('admin.image') }}</th>
                <th>{{ __('admin.category_name') }}</th>
                <th>URL</th>
                <th>{{__('admin.status')}}</th>
                <th>{{__('admin.created_at')}}</th>
                <th>{{__('admin.actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($category->children as $child)
                <tr>
                    <td>{{$child->id}}</td>
                    <td>
                        <img src="{{$child->getImage()}}" class="direct-chat-img"/>
                    </td>
                    <td>
                        <a href="{{route('admin.categories.show', $child->id)}}" class="product-title">
                            {{$child->mainProperties->name}}
                        </a>
                    </td>
                    <td>{{$child->slug}}</td>
                    <td>{!! $child->approved ? '<i class="fa fa-thumbs-o-up"></i>' : '<i class="fa fa-thumbs-down"></i>' !!}</td>
                    <td>{{$child->created_at}}</td>
                    <td>
                        <a href="{{route('admin.categories.edit', $child->id)}}" class="fa fa-pencil"
                           title="{{__('admin.edit')}}"></a>
                        <a href="{{route('admin.categories.show', $child->id)}}" class="fa fa-eye"
                           title="{{__('admin.show')}}"></a>
                    </td>
                </tr>
            @empty
            @endforelse
            </tbody>
        </table>

    </div>
    <!-- /.box-body -->
</div>












