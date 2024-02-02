@include('common_include.header')
    <title>Admin Dashboard</title>
@include('common_include.navbar')

@if(session('product_status'))
    <div class="alert alert-success text-center">
        {{ session('product_status') }}
    </div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 ">
        <div class="adminDashSideDiv container mt-2">
        <center>
        <div class="circularDiv">
            <img src="profile\blank-profile-picture.webp" alt="blank-profile" />
        </div>
        <h6 class="mt-2"><b>Anish Kumar</b></h6>
        <h6>9024153227</h6>
    </center>

    <h1 class="text-center text-light p-2 mt-2 w-100 bg-info mb-4"><b>Menu</b></h1>
        <a class="sidebarText"  href="/product_table"><h6 class="text-center">Product</h6></a>
        <hr>
        <a class="sidebarText"  href="/add_product"><h6 class="text-center">Add Product</h6></a>
        <hr>
        <a class="sidebarText"  href=""><h6 class="text-center">Change Home Page Pics</h6></a>
        <hr>
        <a class="sidebarText"  href=""><h6 class="text-center">All Transaction History</h6></a>
        </div>
        </div>
        <div class="col-lg-10">
        <h2 class="w-100 text-center p-2 text-light mt-2 admin-heading"><b>Admin Dashboard</b></h2>
        <div class="mt-4 d-flex judtify-content-between">
        <div class="myDiv2">
            <h5 class="p-2"><a href="#" class="showDivLink text-decoration-none text-light">Total Ordes</a></h5>    
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        
        <div class="myDiv1">
            <h5 class="p-2"><a href="#" class="showDivLink text-decoration-none text-light">All Users</a></h5>    
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        
        <div class="myDiv3">
            <h5 class="p-2"><a href="#" class="showDivLink text-decoration-none text-light">Undeliverd Orders</a></h5>    
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <div class="myDiv4">
            <h5 class="p-2"><a href="#" class="showDivLink text-decoration-none text-light">Delivered Orders</a></h5>    
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <div class="myDiv5">
            <h5 class="p-2"><a href="#" class="showDivLink text-decoration-none text-light">Prepaid Orders</a></h5>    
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <div class="myDiv6">
            <h5 class="p-2"><a href="#" class="showDivLink text-decoration-none text-light">Postpaid Ordes</a></h5>
        </div>
        
        </div>
        <div class="myDiv7 mt-2" id="hiddenDiv">
            <h5 class="p-2">Select Div Showcase</h5>
        </div>
        </div>
    </div>
</div>
<!-- div2 -->

<!-- -div3 -->
<script>
    $(document).ready(function(){
        // Click event for the anchor tag
        $(".showDivLink").click(function(e){
            // Prevent the default behavior of the anchor tag
            e.preventDefault();

            // Toggle the visibility of the div
            $("#hiddenDiv").toggle();
        });
    });
</script>

<!-- <button class="button-37" role="button">Button 37</button> -->
@include('common_include.footer')
