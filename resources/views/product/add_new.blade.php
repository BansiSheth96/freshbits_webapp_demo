@extends('Layout.master')

@section('content')
    <div class="content-page">
        <div class="content">
            <ol class="breadcrumb" style="padding-left: 30px;">
                <li>
                    <a href="{{ url('dashboard')}}">Product List</a>
                </li>
                <li><b>
                    Add Product</b>
                </li>
            </ol>
            <div class="container">
                <div class="card-box col-sm-10">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title"><b>Add New Product</b></h4><hr>
                        </div>

                        <?php 
                        if(isset($data)){
                            $form_url = url('/').'/product/update/'.$data->id;
                        }else{
                            $form_url = url('/').'/product';
                        }
                        ?>

                        <form class="form-horizontal" id="productform" name="productform" method='POST' action="<?php echo $form_url; ?>" enctype="multipart/form-data">
                            @csrf
                            
                            <input type="hidden" name="product_details_id" id="product_details_id" 
                            value="">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Product Name:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="Name" placeholder="Product Name" name="Name" value="{{{ old('Name', isset($data) ? $data->Name : null) }}}">
                                </div>
                                 <span class="text-danger">{{ $errors->first('Name') }}</span>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Product Price:</label>
                                <div class="col-sm-7">
                                    <input type="number_format" class="form-control" id="Price" placeholder="Product Price" name="Price" value="{{{ old('Price', isset($data) ? $data->Price : null) }}}">
                                </div>
                                 <span class="text-danger">{{ $errors->first('Price') }}</span>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Product UPC:</label>
                                <div class="col-sm-7">
                                    <input type="number_format" class="form-control" id="UPC" placeholder="Product UPC" name="UPC" value="{{{ old('UPC', isset($data) ? $data->UPC : null) }}}">
                                </div>
                                 <span class="text-danger">{{ $errors->first('UPC') }}</span>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Product Status:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="Status" placeholder="Product Status" name="Status" value="{{{ old('Status', isset($data) ? $data->Status : null) }}}">
                                </div>
                                 <span class="text-danger">{{ $errors->first('Status') }}</span>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Product Image</label>
                                <div class="col-sm-7">
                                    <?php 
                                        if(isset($data)){ ?>
                                           <img src="{{ url('/storage/product-images/', $data->Product_Image)}}" width='100' height='100' class='img-thumbnail' />
                                        <?php 
                                        } 
                                    ?>
                                     <input type="file" class="form-control" id="Product_Image" name="Product_Image">
                                </div>
                                 <span class="text-danger">{{ $errors->first('Product_Image') }}</span>
                            </div>  
          
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Add
                                    </button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
                         
@endsection
