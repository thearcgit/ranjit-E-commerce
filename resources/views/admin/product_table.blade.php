@include('common_include.header')
    <title>Product Section</title>
@include('common_include.navbar')

<h3 class="text-center text-light bg-info">All Product Section</h3>
<div class="container-fluid mt-3 p-1">
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Product Color</th>
            <th>Product Size</th>
            <th>Product Category</th>
            <th>Product Brand</th>
            <th>Product Quantity</th>
            <th>Product Discount</th>
            <th>Product Id</th>
            <!-- <th>Product Name</th> -->
           
            <th>Image1</th>
            <th>Image2</th>
            <th>Image3</th>
            <th>Image4</th>
            <!-- Add more columns as needed -->
        </tr>
    </thead>
    <tbody>
        <!-- Data will be dynamically added here via AJAX -->
    </tbody>
</table>

<button id="addData">Add Data</button>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        var dataTable = $('#example').DataTable();

        // Function to fetch and append data
        function fetchData() {
            $.ajax({
                url: '{{ route("get.products") }}',
                type: 'GET',
                success: function(response) {
                    // alert("hello!");
                    dataTable.clear().draw(); // Clear existing data in the DataTable

                    // Append new data
                    $.each(response.data, function(index, product) {
                        dataTable.row.add([
                            product.p_name,
                            product.p_color,
                            product.p_size,
                            product.p_category,
                            product.p_brand,
                            product.p_quantity,
                            product.p_discount,
                            product.product_id,
                            '<img class="product-image" src="{{ asset('storage/') }}/' + product.p_image1 + '" alt="Image 1" >',
                            '<img class="product-image" src="{{ asset('storage/') }}/' + product.p_image2 + '" alt="Image 2" >',
                            '<img class="product-image" src="{{ asset('storage/') }}/' + product.p_image3 + '" alt="Image 3" >',
                            '<img class="product-image" src="{{ asset('storage/') }}/' + product.p_image4 + '" alt="Image 4" >'
                            // Add more columns as needed
                        ]).draw(false);
                    });
                },
                error: function(error) {
                    console.error('Error fetching data: ', error);
                }
            });
        }

        // Initial data load
        fetchData();

        // Example: Trigger data load on button click
        $('#addData').on('click', function() {
            fetchData();
        });
    });
</script>


@include('common_include.footer')
