<x-admin-master>


@section('content')


        <!-- Blog Post -->
<form  method="post" action="{{route('product.store')}}">
@csrf

<div class="row">
  <div class="col-sm-6">
    <div class="form-group" style="color:black; width:70%;">
    <label for="title"><b>{{trans('lang.category')}}</b></label>
    <select class="form-select" name="category_id" aria-label="Default select example">
        <option value="">{{trans('lang.select')}} {{trans('lang.category')}}</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
        </select>
    </div>
      
    <div class="form-group" style="color:black;">
        <label for="title"><b>{{trans('lang.product_name')}}</b></label>
        <input type="text" class="form-control" style="width:70%"  name="p_name" id="title" aria-describedby="" placeholder="Enter product name">
    </div>
  

    <div class="form-group">
    <button type="submit"  class="btn btn-primary">{{trans('lang.add')}}</button>
    </div>
 </div>

</div>   
</form>



        
        <table class="table table-blue table-striped">
  <thead>
    <tr>

      
      <th scope="col">{{trans('lang.name')}}</th>
      <th scope="col">{{trans('lang.category')}}</th>
      <th scope="col">{{trans('lang.edit')}}</th>
      <th scope="col">{{trans('lang.delete')}}</th>
     
      
    </tr>
  </thead>
  <tbody>
  @foreach( $products as $product)
    <tr>
    <!-- @method('DELETE') -->
      
      <td>{{ $product->p_name }}</td>
      <td>{{ $product->category->name }}</td>
      <td><a  href="{{route('product.edit', $product->id)}}" class="btn btn-warning btn-sm">{{trans('lang.edit')}}</a></td>
      <form method="post" action="{{route('product.destroy',$product->id)}}">
        @csrf
        @method('DELETE')
        
        <td><input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');" value="{{trans('lang.delete')}}"></td>
        
      </form>
     
      

    </tr>
    @endforeach


</table>
    
@endsection
</x-admin-master>