<!-- CATEGORY LIST -->
<div class="form-group">
    <?php $file_name = $request->get('file_titlename') ? $request->get('file_name') : @$file->file_name ?>

    {!! Form::label('category_id', trans('file::file_admin.file_categoty_name').':') !!}
    {!! Form::select('category_id', @$categories, @$file->category_id, ['class' => 'form-control']) !!}
</div>
<!-- /CATEGORY LIST -->