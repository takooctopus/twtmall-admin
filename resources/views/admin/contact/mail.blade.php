<p>
    This email is from TWTMALL managers! 
</p>
<ul>
    <li>Name: <strong>{{ $name }}</strong></li>
    <li>Email: <strong>{{ $email }}</strong></li>
    <li>Phone: <strong>{{ $phone }}</strong></li>
</ul>
<hr>
<p>
    @foreach ($messageLines as $messageLine)
        {{ $messageLine }}<br>
    @endforeach
</p>
<hr>