<aside class="profile-sidebar text-center">
    <div class="profile-content profile-content-scroll">
        <div class="usr-profile">
            <img src="{{ asset('Equation3/ltr/assets/img/90x90.jpg') }}" alt="admin-profile" class="img-fluid">
        </div>
        <p class="user-name mt-4 mb-4">{{ auth()->user()->name }}</p>
        <div class="">
            <div class="accordion" id="user-stats">
                <div class="card">
                    <div class="card-header pb-4 mb-4" id="status">
                        <h6 class="mb-0" data-toggle="collapse" data-target="#user-status" aria-expanded="true" aria-controls="user-status"><i class="flaticon-view-3 mr-2"></i> Status <i class="flaticon-down-arrow ml-2"></i> </h6>
                    </div>
                    <div id="user-status" class="collapse show" aria-labelledby="status" data-parent="#user-stats">
                        <div class="card-body text-left">
                            <ul class="list-unstyled pb-4">
                                <li class="status-online"><a href="javascript:void(0);">Online</a></li>
                                <li class="status-away"><a href="javascript:void(0);">Away</a></li>
                                <li class="status-no-disturb"><a href="javascript:void(0);">Not Disturb</a></li>
                                <li class="status-invisible"><a href="javascript:void(0);">Invisible</a></li>
                                <li class="status-offline"><a href="javascript:void(0);">Offline</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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