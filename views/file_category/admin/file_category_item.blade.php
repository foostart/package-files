<!--ADD file CATEGORY ITEM-->
<div class="row margin-bottom-12">
    <div class="col-md-12">
        <a href="{!! URL::route('admin_files_category.edit') !!}" class="btn btn-info pull-right">
            <i class="fa fa-plus"></i>{{trans('file::file_admin.file_category_add_button')}}
        </a>
    </div>
</div>
<!--/END ADD file CATEGORY ITEM-->

@if( ! $files_categories->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:10%'>
                {{ trans('file::file_admin.order') }}
            </td>

            <th style='width:20%'>
                {{ trans('file::file_admin.file_categoty_id') }}
            </th>

            <th style='width:50%'>
                {{ trans('file::file_admin.file_categoty_name') }}
            </th>

            <th style='width:20%'>
                {{ trans('file::file_admin.operations') }}
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $files_categories->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($files_categories as $file_category)
        <tr>
            <!--COUNTER-->
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <!--/END COUNTER-->

            <!--file CATEGORY ID-->
            <td>
                {!! $file_category->file_category_id !!}
            </td>
            <!--/END file CATEGORY ID-->

            <!--file CATEGORY NAME-->
            <td>
                {!! $file_category->file_category_name !!}
            </td>
            <!--/END file CATEGORY NAME-->

            <!--OPERATOR-->
            <td>
                <a href="{!! URL::route('admin_files_category.edit', ['id' => $file_category->file_category_id]) !!}">
                    <i class="fa fa-edit fa-2x"></i>
                </a>
                <a href="{!! URL::route('admin_files_category.delete',['id' =>  $file_category->file_category_id, '_token' => csrf_token()]) !!}"
                   class="margin-left-5 delete">
                    <i class="fa fa-trash-o fa-2x"></i>
                </a>
                <span class="clearfix"></span>
            </td>
            <!--/END OPERATOR-->
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <!-- FIND MESSAGE -->
    <span class="text-warning">
        <h5>
            {{ trans('file::file_admin.message_find_failed') }}
        </h5>
    </span>
    <!-- /END FIND MESSAGE -->
@endif
<div class="paginator">
    {!! $files_categories->appends($request->except(['page']) )->render() !!}
</div>