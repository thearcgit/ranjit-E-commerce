@include('common_include.header')
    <title>User Login</title>
    
@include('common_include.navbar')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('signout'))
    <div class="alert alert-success text-center">
        {{ session('signout') }}
    </div>
@endif
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <h4 class="w-100 bg-secondary text-center p-2 mt-5 text-light">Users Login Section</h4>
            <form  action="{{route('login_attempt')}}" method="post">
                @csrf
               <div class="div">
                <label for="" class="mt-3">Email</label>
                <input class="form-control" type="email"  name="email" placeholder="Please Enter your emil">
               </div>
               <div class="div">
                <label for="" class="mt-3">Password</label>
                <input class="form-control" name="password" type="password" placeholder="Please Enter your password">
               </div>
               <button type="submit" class="w-100 bg-secondary text-light mt-3 p-1">Submit</button>
            </form>
            <a href="/signup">Not Registered?</a>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

@include('common_include.footer')