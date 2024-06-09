<nav>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('threads.index') }}">Threads</a>
    <a href="{{ route('profile.show', ['profile' => Auth::user()->id]) }}">Profile</a>
    @auth
        <form action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    <button type="submit" id="logout-button">Logout</button>
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('logout-button').click();">Logout</a>

    @endauth
    @guest
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endguest
</nav>
 