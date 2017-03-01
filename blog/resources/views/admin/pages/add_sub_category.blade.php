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
                {!! Form::open(['url' => '/save_subcategory.aspx','method'=>'post']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label>Category Name</label>
                        <select class="form-control select2" id="category" name="category" style="width: 100%;">
                            <option value="0" selected="selected">------Select Category-------</option>
                            @foreach($category as $cat)
                            <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <p>Suggestions: <span id="txtHint"></span></p>
                    <div class="form-group">
                        <label>Sub-Category Name</label>
                        <select class="form-control select2" id="subcate" name="subcate" style="width: 100%;">
                            <option selected="selected">.....Select Sub-Category......</option> 

                        </select>
                    </div>                   
                    <div class="form-group">
                        <label for="CategoryName">Product Name</label>
                        <input type="text" name="product_name" class="form-control" placeholder="Product Name">
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

<script>

    $(document).ready(function() {

        $(document).on('change', '#category', function() {
            var category_id = $(this).val();
            //alert(category_id);
            load_subcategory_by_catId(category_id);
        });
        function load_subcategory_by_catId(category_id) {
            if (category_id.length == 0) {
                // alert(category_id);
                // document.getElementById("txtHint").innerHTML = "";

                return;
            } else {

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // document.getElementById("txtHint").innerHTML = this.responseText;
                        myObj = JSON.parse(this.responseText);
                        alert(myObj.length);
                        if (myObj.length > 0) {
                            $("#subcate").empty();
                            $("#subcate").append('<option value=0> .... Sub-Category......</option>');
                            for (x in myObj) {
                                $("#subcate").append('<option value=' + myObj[x].subcategory_id + '>' + myObj[x].subcategory_name + '</option>');
                            }
                            //  alert(this.responseText);
                        } else {
                            $("#subcate").empty();
                            $("#subcate").append('<option value=0>...No sub-category found....</option>');
                        }

                    }
                };
                xmlhttp.open("GET", "get-subcategory-by-categoryid/" + category_id, true);
                xmlhttp.send();
            }
        }


    });
</script>



@endsection