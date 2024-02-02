@include('common_include.header')
    <title>Contact Us</title>
    
@include('common_include.navbar')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <h4 class="w-100 bg-secondary text-center p-2 mt-5 text-light">Contact Us Section</h4>
            <form  action="" method="post">
               <div class="div">
                <label for="" class="mt-3">Name</label>
                <input class="form-control" name="name" type="text" placeholder="Please Enter your Name">
               </div>
               <div class="div">
                <label for="" class="mt-3">Phone</label>
                <input class="form-control" name="phone" type="text" placeholder="Please Enter your Phone">
               </div>
               <div class="div">
                <label for="" class="mt-3">Email</label>
                <input class="form-control" name="email" type="text" placeholder="Please Enter your Email">
               </div>
               <div class="div">
                <label for="" class="mt-3">Message</label>
                <input class="form-control" name="message" type="message" placeholder="Please Enter your message">
               </div>
               
               <button type="submit" class="w-100 bg-secondary text-light mt-3 p-1">Submit</button>
            </form>
            <a href="/signup">Not Registered?</a>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

@include('common_include.footer')