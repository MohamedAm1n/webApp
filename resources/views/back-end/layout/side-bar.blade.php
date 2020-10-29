<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item {{is_active('home')}}">
            <a class="nav-link" href="{{route('admin.home')}}">
                <i class="material-icons"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item {{is_active('users')}}">
            <a class="nav-link" href="{{route('users.index')}}">
                <i class="material-icons"></i>
                <p>Users</p>
            </a>
        </li>
        <li class="nav-item {{is_active('categories')}}">
            <a class="nav-link" href="{{route('categories.index')}}">
                <i class="material-icons"></i>
                <p>categories</p>
            </a>
        </li>
        <li class="nav-item {{is_active('tags')}}">
            <a class="nav-link" href="{{route('tags.index')}}">
                <i class="material-icons"></i>
                <p>tags</p>
            </a>
        </li>
        <li class="nav-item {{is_active('skills')}}">
            <a class="nav-link" href="{{route('skills.index')}}">
                <i class="material-icons"></i>
                <p>skills</p>
            </a>
        </li>
        <li class="nav-item {{is_active('pages')}}">
            <a class="nav-link" href="{{route('pages.index')}}">
                <i class="material-icons"></i>
                <p>pages</p>
            </a>
        </li>
        <li class="nav-item {{is_active('videos')}}">
            <a class="nav-link" href="{{route('videos.index')}}">
                <i class="material-icons"></i>
                <p>Videos</p>
            </a>
        </li>
    </ul>
  </div>
