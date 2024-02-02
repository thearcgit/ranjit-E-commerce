@include('common_include.header')
    <title>user-profile</title>
    
@include('common_include.navbar')

<!-- <img src="{{ asset('storage/profile_pictures/' . session('p_pic')) }}" alt="Profile Picture"> -->

          

<div class="container-fluid">
<form action="{{ route('edit_userprofile') }}" method="post">
    <div class="row">
    @php 
    $count = 0;
@endphp

<div class="col-lg-4">
    @if (Auth::user()->p_pic)
        @php $count++; @endphp
        <img src="{{ asset('storage/' . Auth::user()->p_pic) }}" alt="Profile Picture" height="320px" width="100%">
    @else
        @if ($count != 1)
            @php $count++; @endphp
            <img src="profile_image/glowing-bulb.jpg" alt="Default Image" height="320px" width="100%">
        @endif
    @endif
</div>







           
      
        <div class="col-lg-8">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td>@if(Auth::check())<p> {{ Auth::user()->name }}</p>@endif
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>@if(Auth::check())<p> {{ Auth::user()->email }}</p>@endif
                    </td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>@if(Auth::check())<p> {{ Auth::user()->phone  }}</p>@endif
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>@if(Auth::check())<p> {{ Auth::user()->address }}</p>@endif
                    </td>
                </tr>

            </table>
            <button type="submit" class="text-center w-100 bg-info"><a href="/edit_userprofile" class="text-decoration-none">Edit Your Profile</a></button>
        </div>
       </form>
    </div>
</div>
@include('common_include.footer')