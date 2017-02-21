<!-- Static navbar -->
<nav id="main-navbar" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar background-color-white"></span>
                <span class="icon-bar background-color-white"></span>
                <span class="icon-bar background-color-white"></span>
            </button>
            <a id="sidebar-show" class="navbar-brand @if(Auth::check()) color-black @endif " @if(Auth::check()) href="/" @else href="#main" data-toggle="tab" @endif aria-expanded="true">BBC</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                @if(!Auth::check())
                    <li class="hidden"><a id="main-link" href="#main" data-toggle="tab"></a></li>
                    <li><a id="biography-link" href="#biography" data-toggle="tab">{{trans('index.biography')}}</a></li>
                    <li><a id="videos-link" href="#videos" data-toggle="tab">{{trans('index.videos')}}</a></li>
                    <li><a class="pointer" data-target="#contactModal" data-toggle="modal">{{trans('index.contact')}}</a></li>
                @else
                    <li><a href="auth/logout" style="color:#333">Salir</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>