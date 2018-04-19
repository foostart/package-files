
@if( ! $files->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <th style='width:10%'>{{ trans('file::file_admin.order') }}</th>
            <th style='width:20%'>{{ trans('file::file_admin.id') }}</th>
            <th style='width:50%'>{{ trans('file::file_admin.title') }}</th>
            <th style='width:20%'>{{ trans('file::file_admin.operations') }}</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $files->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($files as $file)
        <tr>
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <td>{!! $file->file_id !!}</td>
            <td>{!! $file->file_name !!}</td>
            <td>
                <a href="{!! URL::route('admin_files.edit', ['id' => $file->file_id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <a href="{!! URL::route('admin_files.delete',['id' =>  $file->file_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
 <span class="text-warning">
	<h5>
		{{ trans('file::file_admin.message_find_failed') }}
	</h5>
 </span>
@endif
<div class="paginator">
    {!! $files->appends($request->except(['page']) )->render() !!}
</div>