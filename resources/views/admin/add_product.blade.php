@include('common_include.header')
    <title>Add Product Section</title>
    
@include('common_include.navbar')

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-1"></div>
       
        <div class="col-lg-5">
        <form action="{{ route('product_add') }}" method="post" enctype="multipart/form-data">
                @csrf
            <label>Product name</label>
            <input type="text" class="form-control" placeholder="please enter" name="p_name">

            <label>Product Category</label>
            <input type="text" class="form-control" placeholder="please enter" name="p_category">

            <label>Product Brand</label>
            <input type="text" class="form-control" placeholder="please enter" name="p_brand">

            <label>Product color</label>
            <select name="p_color" class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
            </select>


            <label>Product Image1</label>
            <input type="file" accept="image/*" class="form-control" placeholder="please enter" name="p_image1">

            <label>Product Image2</label>
            <input type="file" accept="image/*" class="form-control" placeholder="please enter" name="p_image2">
        </div>
        <div class="col-lg-5">
            <label>Product size</label>
            <select name="p_size" class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
            </select>

            <label>Product quantity</label>
            <input type="number" class="form-control" placeholder="please enter" name="p_quantity">

            <label>Product Price</label>
            <input type="number" class="form-control" placeholder="please enter" name="p_price">

            <label>Product Discount</label>
            <input type="number" class="form-control" placeholder="please enter" name="p_discount">

           

            <label>Product Image3</label>
            <input type="file" accept="image/*" class="form-control" placeholder="please enter" name="p_image3">

            <label>Product Image4</label>
            <input type="file" accept="image/*" class="form-control" placeholder="please enter" name="p_image4">

            <label>Product Id</label>
            <input type="number" class="form-control" placeholder="please enter" name="product_id">
        </div>
        <button type="submit">Submit</button>
        </form>

        <div class="col-lg-1"></div>
    </div>
</div>

@include('common_include.footer')