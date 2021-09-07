

<!-- Management_sidebar -->

<li class="nav-item">
  <a  href="{{route('admin.index')}}" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
   


  

   <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#prouctcollapse" aria-expanded="true" aria-controls="collapseone">
  <i class="fas fa-user-cog"></i>
    <span>{{trans('lang.product')}}</span>
  </a>
  <div id="prouctcollapse" class="collapse" aria-labelledby="headingdata" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">{{trans('lang.product')}}:</h6>

      <a class="collapse-item" href="{{route('category.index')}}">{{trans('lang.category')}} </a>
      <a class="collapse-item" href="{{route('product.index')}}">{{trans('lang.product')}} </a>
     
    </div>
  </div>

   <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapsedata" aria-expanded="true" aria-controls="collapseone">
  <i class="fas fa-user-cog"></i>
    <span>{{trans('lang.stock')}}</span>
  </a>
  <div id="collapsedata" class="collapse" aria-labelledby="headingdata" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">{{trans('lang.stock')}}:</h6>

      <a class="collapse-item" href="{{route('stock.index')}}">{{trans('lang.stock_make')}} </a>
     
    </div>
  </div>
  
  

    
  </a>
 
</li>





