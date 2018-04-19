@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: {{ trans('file::file_admin.page_edit') }}
@stop
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        {!! !empty($file->file_category_id) ? '<i class="fa fa-pencil"></i>'.trans('file::file_admin.form_edit') : '<i class="fa fa-sitemap"></i>'.trans('file::file_admin.form_add') !!}
                    </h3>
                </div>
                <!-- ERRORS NAME  -->
                {{-- model general errors from the form --}}
                @if($errors->has('file_category_name') )
                    <div class="alert alert-danger">{!! $errors->first('file_category_name') !!}</div>
                @endif
                <!-- /END ERROR NAME -->
                
                <!-- LENGTH NAME  -->
                @if($errors->has('name_unvalid_length') )
                    <div class="alert alert-danger">{!! $errors->first('name_unvalid_length') !!}</div>
                @endif
                <!-- /END LENGTH NAME -->

                {{-- successful message --}}
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                <div class="alert alert-success">{{$message}}</div>
                @endif

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <!-- file CATEGORIES ID -->
                            <h4>{!! trans('file::file_admin.form_heading') !!}</h4>
                            {!! Form::open(['route'=>['admin_files_category.post', 'id' => @$file->file_category_id],  'files'=>true, 'method' => 'post'])  !!}

                            <!--END file CATEGORIES ID  -->

                            <!-- file NAME TEXT-->
                            @include('file::file_category.elements.text', ['name' => 'file_category_name'])
                            <!-- /END file NAME TEXT -->
                            
                            {!! Form::hidden('id',@$file->file_category_id) !!}

                            <!-- DELETE BUTTON -->
                            <a href="{!! URL::route('admin_files_category.delete',['id' => @$file->id, '_token' => csrf_token()]) !!}"
                               class="btn btn-danger pull-right margin-left-5 delete">
                                Delete
                            </a>
                            <!-- DELETE BUTTON -->

                            <!-- SAVE BUTTON -->
                            {!! Form::submit('Save', array("class"=>"btn btn-info pull-right ")) !!}
                            <!-- /SAVE BUTTON -->

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='col-md-4'>
            @include('file::file.admin.file_search')
        </div>

    </div>
</div>
@stop