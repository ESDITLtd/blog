@extends('admin.admin_master')
@section('admin_content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Category</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['url' => '/save_category.aspx','method'=>'post']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="CategoryName">Category Name</label>
                        <input type="text" name="category_name" class="form-control" placeholder="Category Name">
                    </div>                    
                    <div class="form-group">
                        <label>Category Description</label>                           
                        <textarea class="form-control" name="category_description" cols="50"></textarea>
                    </div> 
                    <div class="form-group">
                        <label>Publication Status</label>                           
                        <select name="publication_status">
                            <option>....Please select .....</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>  
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection