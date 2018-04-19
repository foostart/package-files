
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('file::file_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_files_category','method' => 'get']) !!}

        <!--TITLE-->
		<div class="form-group">
            {!! Form::label('file_category_name',trans('file::file_admin.file_category_name_label')) !!}
            {!! Form::text('file_category_name', @$params['file_category_name'], ['class' => 'form-control', 'placeholder' => trans('file::file_admin.file_category_name')]) !!}
        </div>

        {!! Form::submit(trans('file::file_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>




