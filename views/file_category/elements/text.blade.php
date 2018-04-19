<!-- file NAME -->
<div class="form-group">
    <?php $file_category_name = $request->get('file_titlename') ? $request->get('file_name') : @$file->file_category_name ?>
    {!! Form::label($name, trans('file::file_admin.name').':') !!}
    {!! Form::text($name, $file_category_name, ['class' => 'form-control', 'placeholder' => trans('file::file_admin.name').'']) !!}
</div>
<!-- /file NAME -->