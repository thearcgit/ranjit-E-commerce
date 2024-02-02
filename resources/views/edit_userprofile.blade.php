@include('common_include.header')
    <title>Edit-user-Profile</title>
@include('common_include.navbar')
<!-- Your Blade file content -->
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<h1 class="w-100 text-center text-light mt-1 mb-2 p-2 bg-info"><b>Update Profile Section</b></h1>
<form action="{{ route('update_userprofile') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
    <label for="name">Name</label>
    <input name="name" type="text" class="form-control" placeholder="">
    </div>
    <div class="mb-3">
    <label for="email">Email</label>
    <input name="email" type="email" class="form-control" placeholder="">
    </div>
    <div class="mb-3">
    <label for="phone">Phone</label>
    <input name="phone" type="number" class="form-control" placeholder="">
    </div>
    <div class="mb-3">
    <label for="address">Address</label>
    <input name="address" type="text" class="form-control" placeholder="">
    </div>
    <div class="mb-3">
    <label for="name">Profile Pic</label>
    <input name="file" type="file" class="form-control" placeholder="">
    </div>
    <button type="submit" class="w-100 bg-info text-light">Update</button>
   
</form>
@include('common_include.footer')