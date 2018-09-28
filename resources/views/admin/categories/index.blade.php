<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{__('admin.menu_categories')}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        {{ $categories->links() }}
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
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>
                        <img src="{{$category->getImage()}}" class="direct-chat-img" />
                    </td>
                    <td>{{$category->mainProperties->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{!! $category->approved ? '<i class="fa fa-thumbs-o-up"></i>' : '<i class="fa fa-thumbs-down"></i>' !!}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                        <a href="{{route('admin.categories.edit', $category->id)}}" class="fa fa-pencil" title="{{__('admin.edit')}}"></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{ $categories->links() }}

    </div>
<!-- /.box-body -->
</div>