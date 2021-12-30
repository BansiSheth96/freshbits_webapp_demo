@extends('Layout.master')

@section('content')
        <div class="content">
            <div class="container">
                <div class="card-box col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title" style="display: inline-block; "><b>Product List</b></h4>
                                <a class="btn btn-success" href="{{ action('ProductController@create')}}" id="add_product" style="float: right;">
                                <i class="glyphicon glyphicon-plus-sign"></i> Add New</a><hr>
                        </div>
                    </div>
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                          <p>{{ $message}}</p>
                        </div>
                    @endif
                        <table class="data-table table-bordered text-center" style="width: 100%;">
                          <thead>
                            <tr>
                              <th width="50" height="50" style="text-align: center; padding-left: 30px;">Sr No.</th>
                              <th style="text-align: center; ">ProductImage</th>
                              <th style="text-align: center; padding-left: 30px;">Name</th>
                              <th style="text-align: center; padding-left: 30px;">Price</th>
                              <th style="text-align: center; padding-left: 30px;">UPC</th>
                              <th style="text-align: center; padding-left: 30px;">Status</th>
                              <th style="text-align: center;">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                </div>
            </div>
        </div>

@endsection

@section('scripts')

<script type="text/javascript">  
     $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,     
        ajax: "{{ url('dashboard') }}",
        /* Fetch-data into table*/
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Product_Image',name: 'Product_Image',
                  render: function(data, type, full, meta){
                  return "<img src={{ URL::to('/storage') }}/product-images/" + data + " width='100' height='100' class='img-thumbnail' />";
            } ,orderable: false, searchable: false},
            {data: 'Name', name: 'Name'},
            {data: 'Price',name: 'Price'},
            {data: 'UPC' , name: 'UPC'},
            {data: 'Status' , name: 'Status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},   
        ]
    });
    
    $(document).on('click', '.delete', function(){
      product_details_id = $(this).attr('id');
      $('#confirmModal').modal('show');

      $('#btn_delete').click(function(){
        $.ajax({
              url:"product/destroy/"+product_details_id,
              beforeSend:function(){
              $('#btn_delete').text('Deleting...');
          },
          success:function(data)
          {
            setTimeout(function(){
              $('#confirmModal').modal('hide');
              $('.data-table').DataTable().ajax.reload();
            }, 1000);
          }
        })
      });
    });
});      
</script>

@endsection