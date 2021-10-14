<form action="{{action('settings@login')}}" method="post">
    @csrf
    <input type="password" name="password" placeholder="password">
    <button type="submit">Login</button>
</form>
