<x-admin-master>


@section('content')


<form  method="post" action="{{route('category.update', $category->id)}}">
@csrf
@method('PATCH')

<div class="row">
  <div class="col-sm-6">
    <div class="form-group" style="color:black;">
        <label for="title"><b>{{trans('lang.category_name')}}</b></label>
        <input type="text" class="form-control" style="width:70%"  name="name" value="{{$category->name}}"  id="title" aria-describedby="" placeholder="Enter Product Name">
    </div>

    <div class="form-group">
    <button type="submit"  class="btn btn-success">{{trans('lang.update')}}</button>
    </div>
 </div>
 
</div>   
</form>

        

@endsection
</x-admin-master>