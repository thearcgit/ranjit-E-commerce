@include('common_include.header')
    <title>Product Detail</title>
    
@include('common_include.navbar')
<div class="container">
        <h1>Payment Details</h1>
        <p>Order ID: {{ $order->id }}</p>
        <p>Amount: {{ $order->amount }}</p>
        <!-- Add Razorpay UPI payment details here -->
    </div>

    @include('common_include.footer')    