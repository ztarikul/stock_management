<x-admin-master>


@section('content')

<div class="container">

    <h2 align="center">{{trans('lang.stock_mngt')}}</h2>
    <div class="form-group" width=50%>
      <form  id="add_name" method="post" action="{{route('stock.store')}}">
        @csrf
      
          <table align="center" class="table " id="articles" style="width: 800px; margin: auto;">
            <tr>

              <td><select class="form-control" id="category_id-0" name="category_id[]"><option value="">{{trans('lang.select')}}</option>@foreach($categories as $category)<option value="{{$category->id}}">{{$category->name}}</option>@endforeach</select></td>
              <td><select class="form-control" id="product_id-0" name="product_id[]"><option selected>Please Select</option></select></td>
              <td><input  type="number" id="quantity-0" name="qnty[]" placeholder="Quantity" class="form-control name_list" /></td>
              <td><button class="btn btn-success btn-sm" id="prev_qty-0">0</button></td>
             
              <td><button type="button" name="add" id="add" class="btn btn-success">{{trans('lang.add')}} {{trans('lang.new')}}</button></td>
            </tr>
          </table>
          <input align="center" type="submit" name="submit"  class="btn btn-info" value="{{trans('lang.submit')}}" />
        
      </form>
    </div>
  </div>


<script>
  $(document).ready(function() {
  var i = 0;
  var array = [0];
  $("#category_id-" + i).click(function() {
    upd_art(i)
  });
  $("#product_id-" + i).click(function() {
    
    uppro_art(i)
  });
  $("#quantity-" + i).change(function() {
    upd_art(i)
  });

  


  $('#add').click(function() {
    i++;
    $('#articles').append('<tr id="row' + i + '"><td><select class="form-control" id="category_id-' + i +'" name="category_id[]"><option value="">Please Select</option>@foreach($categories as $category)<option value="{{$category->id}}">{{$category->name}}</option>@endforeach</select><td><select class="form-control" id="product_id-' + i +'" name="product_id[]"><option value="">Please Select</option></select><td><input type="number" id="quantity-' + i + '" name="qnty[]" placeholder="Quantity" class="form-control name_list" /></td><td><button class="btn btn-success btn-sm" id="prev_qty-'+ i +'">0</button></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');

    $("#category_id-" + i).click(function() {
      upd_art(i)
    });
    $("#product_id-" + i).click(function() {
        uppro_art(i)
    });
    
    $("#quantity-" + i).change(function() {
    upd_art(i)
    });

  });


  $(document).on('click', '.btn_remove', function() {
    var button_id = $(this).attr("id");
    $('#row' + button_id + '').remove();
  });




  // $('#submit').click(function() {
  //   alert($('#add_name').serialize()); //alerts all values           
  //   $.ajax({
  //     url: "wwwdb.php",
  //     method: "POST",
  //     data: $('#add_name').serialize(),
  //     success: function(data) {
  //       $('#add_name')[0].reset();
  //     }
  //   });
  // });
  function uppro_art(i){
    var product_id = $('#product_id-' + i).val();
    console.log(product_id);
    const found = array.find(element => element = product_id);
    console.log(array);
    
        // array.push(product_id);
    if(found){
        alert("Duplicate Entry");
    }
    else{
        
        
        array.push(product_id);
        console.log(array);
            var _p= product_id;
            if(_p.length>0){
                $.ajax({
                    url:"{{url('product_prev_stock')}}",
                    data: {
                        p:_p
                    },
                    dataType:'json',
                    beforeSend:function(){
                        // $(".search-result").html('<li>Loading...</li>');
                    },
                    success:function(res){

                        // console.log(res.stock.qnty);

                        // $('#prev_qty-' + i).val(res.stock.qnty);

                        var _html= '<button class="btn btn-success btn-sm">' +res.stock.qnty +'</button>';
                        // $.each(res.data, function(index,data){
                        //     _html+='<option>'+data.p_name+'</option>';
                           
                        // });
                       $('#prev_qty-' + i).html(_html);
                    }
                })
            }

            


        }

              

  }


  function upd_art(i) {
    var category_id = $('#category_id-' + i).val();
    
   

            var _q= category_id;
            if(_q.length>0){
                $.ajax({
                    url:"{{url('category_products')}}",
                    data: {
                        q:_q
                    },
                    dataType:'json',
                    beforeSend:function(){
                        // $(".search-result").html('<li>Loading...</li>');
                    },
                    success:function(res){

                        console.log(res.data);

                        //$('#unit-' + i).val(res.data[0].description);

                        var _html='';
                        $.each(res.data, function(index,data){
                            _html+='<option value="'+ data.id+'">'+data.p_name+'</option>';
                           
                        });
                       $('#product_id-' + i).html(_html);
                    }
                })
            }

    
  }



  //  setInterval(upd_art, 1000);
});

</script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



















        
<table align="center" class="table table-blue table-striped" style="width: 800px;">
  <thead>
    <tr>

      
      <th scope="col">{{trans('lang.s_n')}}</th>
      <th scope="col">{{trans('lang.product_name')}}</th>
      <th scope="col">{{trans('lang.category')}}</th>
      <th scope="col">{{trans('lang.quantity')}}</th>
      <th scope="col">{{trans('lang.edit')}}</th>
      <th scope="col">{{trans('lang.delete')}}</th>
     
      
    </tr>
  </thead>
  <tbody>
    @php $rows = 0 ;@endphp
    @foreach( $stocks as $stock)
    <tr>
    <!-- @method('DELETE') -->
      
      <td>{{ ++$rows }}</td>
      <td>{{ $stock->product->p_name }}</td>
      <td>{{ $stock->category->name}}</td>
      <td>{{ $stock->qnty}}</td>
      <td><a href="{{route('stock.edit', $stock->id)}}" class="btn btn-warning btn-sm">{{trans('lang.edit')}}</a></td>
      <form method="post" action="{{route('stock.destroy',$stock->id)}}">
        @csrf
        @method('DELETE')
        
        <td><input type="submit" class="btn btn-danger btn-sm" value="{{trans('lang.delete')}}"></td>
        
      </form>
     
      

    </tr>
    @endforeach
</table>
@endsection
</x-admin-master>