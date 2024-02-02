@include('common_include.header')
    <title>User Signup</title>
    
@include('common_include.navbar')
@if(session('errors'))
    <div class="alert alert-danger text-center">
        <ul>
            @foreach(['email', 'password'] as $field)
                @foreach(session('errors')->get($field) as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endforeach
        </ul>
    </div>
@endif





<!-- <pre>{{ var_dump(session()->all()) }}</pre> -->


<div class="container-fluid p-0">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <h4 class="w-100 bg-secondary text-center p-2 mt-5 text-light">Users Login Section</h4>
            <form action="{{route('signup')}}" method="post"  id="cnform" method="post" data-parsley-validate>
                @csrf
               <div class="div">
                <label for="" class="mt-1">Name</label>
                <input class="form-control" name="name" type="text" placeholder="Please Enter your Name" required data-parsley-required-message="Name is required">
               </div>
               <div class="div">
                <label for="" class="mt-1">Phone</label>
                <input class="form-control" name="phone" type="number" placeholder="Please Enter your Phone" required data-parsley-required-message="Phone is required"  pattern="[0-9]{10}">
               </div>
               <div class="div">
                <label for="" class="mt-1">Email</label>
                <input class="form-control" name="email" type="text" placeholder="Please Enter your Email" required data-parsley-required-message="Email is required">
               </div>
               <div class="div">
                <label for="" class="mt-1">Address</label>
                <input class="form-control" name="address" type="text" placeholder="Please Enter your Address" required data-parsley-required-message="Address is required">
               </div>

               <div class="div">
                <label for="" class="mt-1">Password</label>
                <input class="form-control" name="password" type="password" placeholder="Please Enter your password" required data-parsley-required-message="Password is required">
               </div>
               <div class="div">
                <label for="" class="mt-1">Confirm Password</label>
                 <input class="form-control" name="password_confirmation" type="password" placeholder="Please confirm your password" required  data-parsley-required-message="Password confirmation is required" data-parsley-equalto-message="Passwords must match">
               </div>
               <button type="submit" class="w-100 bg-secondary text-light mt-3 p-1">Submit</button>
            </form>
            <a href="/signup">Not Registered?</a>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

@include('common_include.footer')

<script>
      $(document).ready(function () {
        $("#cnform").parsley();
      });
</script>
