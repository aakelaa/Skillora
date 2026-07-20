<nav>
    <a href="{{ route('home') }}">FreelanceHub</a>

    <a href="{{ route('jobs.index') }}">Browse Jobs</a>
    <a href="{{ route('categories.index') }}">Categories</a>

    @auth
        @if (auth()->user()->isClient())
            <a href="{{ route('client.jobs.index') }}">My Jobs</a>
        @endif

        @if (auth()->user()->isFreelancer())
            <a href="{{ route('freelancer-profile.edit') }}">My Freelancer Profile</a>
        @endif

        @if (auth()->user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.categories.index') }}">Categories</a>
        @endif

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endauth
</nav>
