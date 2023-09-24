<div class="side_nav">

    <a href="/admin"><li class="side_nav_item"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></li></a>

    <li class="side_nav_item"><i class="far fa-clipboard"></i><span>Articals</span>
        <div class="side_dropdown">
            <a href="{{ route('admin.articals.index') }}">View Articals</a>
            <a href="{{ route('admin.articals.create') }}">Create Artical</a>
        </div>
    </li>

    <a href="{{ route('admin.quotes.index') }}"><li class="side_nav_item"><i class="fas fa-quote-left"></i><span>Quote</span></li></a>

    <a href="{{ route('admin.services.index') }}"><li class="side_nav_item"><i class="fas fa-toolbox"></i><span>Service</span></li></a>

    <a href="{{ route('admin.galleries.index') }}"><li class="side_nav_item"><i class="fas fa-image"></i><span>Gallery</span></li></a>

    <a href="{{ route('admin.socials.index') }}"><li class="side_nav_item"><i class="fas fa-share-alt"></i><span>Social</span></li></a>

    <a href="{{ route('admin.categories.index') }}"><li class="side_nav_item"><i class="fas fa-shapes"></i><span>Category</span></li></a>

    <a href=""><li class="side_nav_item"><i class="far fa-comments"></i><span>Comments</span></li></a>

    <li class="side_nav_item"><i class="fas fa-users"></i><span>Users</span>
        <ul class="side_dropdown">
            <a href="">View All User</a>
            <a href="">Add User</a>
        </ul>
    </li>

    <a href=""><li class="side_nav_item"><i class="far fa-envelope"></i><span>Mailbox</span></li></a>
    <a href=""><li class="side_nav_item"><i class="far fa-bell"></i><span>Notification</span></li></a>
    <a href=""><li class="side_nav_item"><i class="fas fa-puzzle-piece"></i><span>Widget</span></li></a>
    <a href=""><li class="side_nav_item"><i class="fas fa-user"></i><span>Profile</span></li></a>

</div>
