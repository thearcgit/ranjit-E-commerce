@include('common_include.header')
    <title>Product Detail</title>
    
@include('common_include.navbar')


<h4 class="w-100 text-center bg-danger p-1 mt-1">Product Detail Page</h4>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5">
       
       
    @auth
   
    <form action="{{ route('add_toCart') }}" method="post" enctype="multipart/form-data">

@else
<form action="{{ route('cookie_cart', ['productId' => $specific_product->product_id]) }}" method="post" enctype="multipart/form-data">

@endauth
    
    
            @csrf
            <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('storage/' . $specific_product->p_image1) }}" width="100%" height="400" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('storage/' . $specific_product->p_image2) }}" width="100%" height="400" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('storage/' . $specific_product->p_image3) }}" width="100%" height="400" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('storage/' . $specific_product->p_image4) }}" width="100%" height="400" alt="First slide">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

           

        <!-- <img src="coverImageFolder\demoPics.jpg"   alt="profile_image/glowing-bulb.jpg" width="100%" height="400"> -->
        </div>
       
        
        <div class="col-lg-7">
            <h4 class="w-100 text-center text-light p-1 bg-success">Product Description</h4>
        <table class="table" style="width:100%">
    <tbody>
        <tr>
            <th>Name</th>
            <td>{{ $specific_product->p_name}}</td>
            <input type="hidden" name="product_name" value="{{ $specific_product->p_name }}">
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{ $specific_product->p_price}}</td>
            <input type="hidden" name="product_price" value="{{ $specific_product->p_price }}">
        </tr>
        <tr>
            <th>Color</th>
            <td>{{ $specific_product->p_color}}</td>
            <input type="hidden" name="product_color" value="{{ $specific_product->p_color }}">
        </tr>
        <tr>
            <th>Size</th>
            <td>{{ $specific_product->p_size}}</td>
            <input type="hidden" name="product_size" value="{{ $specific_product->p_size }}">
        </tr>
        <tr>
            <th>Discount</th>
            <td>{{ $specific_product->p_discount}}</td>
            <input type="hidden" name="product_discount" value="{{ $specific_product->p_discount }}">
        </tr>
        <tr>
            <th>Product Rating</th>
            <td><span class="material-symbols-outlined">star</span><span class="material-symbols-outlined">star</span><span class="material-symbols-outlined">star</span><span class="material-symbols-outlined">star</span><span class="material-symbols-outlined">star</span>
           
           
        </tr>
    </tbody>
</table>

<div class="col-lg-4">
    <div class="row">
    <!-- <div class="d-flex justify-content-between"> -->
<button type="submit"  class="w-100"><span class="material-symbols-outlined">
add_shopping_cart
</span></button>
</form>


<form action="{{route ('addToWish')}}" method="post">
            @csrf
    
      <input type="hidden" name="product_image" value="{{ asset('storage/' . $specific_product->p_image1) }}">
   
   

      
       
       
        
       
           
            <input type="hidden" name="product_name" value="{{ $specific_product->p_name }}">
       
            <input type="hidden" name="product_price" value="{{ $specific_product->p_price }}">
       
            <input type="hidden" name="product_color" value="{{ $specific_product->p_color }}">
      
            <input type="hidden" name="product_size" value="{{ $specific_product->p_size }}">
       
            <input type="hidden" name="product_discount" value="{{ $specific_product->p_discount }}">

          
           
        </tr>
    </tbody>
</table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button  class="w-100"><span class="material-symbols-outlined">
 favorite
</span></button>
</div>
</form>
   
</div>

        </div>
    </div>
</div>

@include('common_include.footer')