<aside class="profile-sidebar text-center">
    <div class="profile-content profile-content-scroll">
        <div class="usr-profile">
            <img src="{{ asset('Equation3/ltr/assets/img/90x90.jpg') }}" alt="admin-profile" class="img-fluid">
        </div>
        <p class="user-name mt-4 mb-4">{{ auth()->user()->name }}</p>
        <div class="user-links text-left">
            <ul class="list-unstyled">                
                <li><a href="user_profile.html"><i class="flaticon-user-11"></i> My Profile</a></li>
                <li><a href="#" onclick="document.querySelector('#form-logout').submit()">
                    <i class="flaticon-power-off"></i> Logout </a>
                </li>

                <form action="{{ route('logout') }}" method="POST" id="form-logout">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</aside>