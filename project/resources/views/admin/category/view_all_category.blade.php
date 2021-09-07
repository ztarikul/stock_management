<x-admin-master>


@section('content')


<form  method="post" action="{{route('category.store')}}">
@csrf

<div class="row">
  <div class="col-sm-6">
    <div class="form-group" style="color:black;">
        <label for="title"><b>{{trans('lang.category_name')}}</b></label>
        <input type="text" class="form-control" style="width:70%"  name="name" value=""  id="title" aria-describedby="" placeholder="Enter Product Name">
    </div>

    <div class="form-group">
    <button type="submit"  class="btn btn-primary">{{trans('lang.add')}}</button>
    </div>
 </div>
 
</div>   
</form>


<div class="row">
    <div class="col-sm-6">
    <table class="table table-blue table-striped" >
  <thead>
    <tr>
      <th scope="col">{{trans('lang.name')}}</th>
      <th scope="col">{{trans('lang.edit')}}</th>
      <th scope="col">{{trans('lang.delete')}}</th>
     
      
    </tr>
  </thead>
  <tbody>
  @foreach( $categories as $category)
    <tr>
   
      
      <td>{{ $category->name }}</td>
      <td><a href="{{route('category.edit', $category->id)}}" class="btn btn-warning btn-sm">{{trans('lang.edit')}}</a></td>
      <form method="post" action="{{route('category.destroy',$category->id)}}">
        @csrf
        @method('DELETE')
        
        <td><input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?');"  value="{{trans('lang.delete')}}"></td>
        
      </form>
     
      

    </tr>
    @endforeach
</table>
    </div>
</div>
        

@endsection
</x-admin-master>