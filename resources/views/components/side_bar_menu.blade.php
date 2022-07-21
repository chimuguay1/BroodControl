<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid w-50">
        <button class="navbar-toggler" role="button" href= "#navbarSupportedContent" data-bs-toggle="navbar-collapse " data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navmenuvisible" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/dashboard')}}">@lang('Dashboard')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/providers')}}">@lang('Providers')</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProducts" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('Baby Animals')
                    </a>
                        <ul class="dropdown-menu dropprod" aria-labelledby="navbarDropdownProducts">
                            <li><a class="dropdown-item drop_multiple" href="{{url('babyAnimals')}}">@lang('List of baby animals')</a></li>
                            <li><a class="dropdown-item drop_multiple" href="{{url('sensors')}}">@lang('Sensors')</a></li>
                            <li><a class="dropdown-item drop_multiple" href="{{url('clasificationHealthy')}}">@lang('Classification of baby animals')</a></li>
                        </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('user')}}">@lang('Users')</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCars" role="button" data-bs-toggle="dropdown" aria-expanded="false">@lang('Profile')</a>
                    <ul class="dropdown-menu dropsession" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id)  }}">@lang('Configure profile')</a></li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" class="dropdown-item" value="@lang('Sign off')">
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>