  <!-- Nav Bar Start -->
  <div class="nav-bar">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="/" class="nav-item nav-link active">Bosh Sahifa</a>
                    <a href="{{route('about')}}" class="nav-item nav-link">Biz haqimizda</a>
                    <a href="{{route('service')}}" class="nav-item nav-link">Service</a>
                    <a href="{{route('price')}}" class="nav-item nav-link">Price</a>
                    <a href="{{route('project')}}" class="nav-item nav-link">Project</a>
                    <a href="{{route('posts.index')}}" class="nav-item nav-link">Blog</a>



                    
                    <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
                </div>
                @auth
                <div>
                    <a href="{{route('notifications.index')}}" class="btn btn-custom m-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="6" stroke="currentColor" class="w-3 h-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                          </svg>
                          <span class="badge badge-light m-2">{{auth()->user()->unreadNotifications()->count()}}</span>
                          <span class="sr-only"></span>
                    </a>
                </div>
                <div class="ml-auto">
                    <a  class="btn btn-custom" >{{auth()->user()->name }}</a>

                    </div>
                <div class="ml-auto">
                    <a href="{{route('posts.create')}}" class="btn btn-custom m-2" href="#">Post Yaratish</a>

                    </div>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="btn btn-custom" >Logout</button>
                    </form>
                    @else
                
                        <a href="{{route('login')}}" class="btn btn-custom" href="#">Royhatdan Otish</a>
                        
                @endauth
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->