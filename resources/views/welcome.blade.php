@include('common_include.header')
    <title>HomePage</title>
@include('common_include.navbar')







<img src="coverImageFolder\cover.jpg" alt="cover-image" height="620px" width="100%"> 

<h4 class="mt-2 w-100 p-1 text-center bg-danger">Products</h4>

<div class="container-fluid">
    <div class="row">

    @foreach($home_product as $product)
    <div class="col-lg-3">
        <div class="card" style="width: 16rem;">
            <img src="{{ asset('storage/' . $product->p_image1) }}" alt="Image 1" height="150px" width="100%">
            <div class="card-body">
                <h5 class="card-title">{{ $product->p_name }}</h5>
                <div class="d-flex justify-content-between">
                    <p class="card-text">&#8377; {{ $product->p_price }}/-</p>
                    <p class="card-text">{{ $product->p_discount }}%</p>
                </div>
                <a href="{{ route('product_detail', ['id' => $product->product_id]) }}" class="btn btn-primary">Go somewhere</a>

               

            </div>
        </div>
    </div>
@endforeach

    </div>
</div>

<!-- ----- -->
@include('common_include.footer')
