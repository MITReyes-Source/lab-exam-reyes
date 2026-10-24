<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Manager')</title>
    <style>
        body{font-family:Arial,sans-serif;max-width:1000px;margin:30px auto;padding:0 16px;color:#222}
        nav{display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid #ddd;padding-bottom:14px}
        a,button{cursor:pointer} .btn,button{padding:8px 12px;border:1px solid #555;border-radius:4px;background:#f5f5f5;color:#111;text-decoration:none}
        table{border-collapse:collapse;width:100%;margin-top:16px}th,td{border:1px solid #ccc;padding:10px;text-align:left}
        label{display:block;margin-top:12px}input,select{padding:8px;width:100%;max-width:460px;box-sizing:border-box}
        .error{color:#a00}.success{padding:10px;background:#e8f7e8;margin:12px 0}.actions{display:flex;gap:8px;align-items:center}
        form.inline{display:inline} .muted{color:#666}
    </style>
</head>
<body>
<nav>
    <strong>School of Information Technology Education — Student Manager</strong>
    @auth
        <span>{{ auth()->user()->name }}
            <form class="inline" method="POST" action="{{ route('logout') }}">@csrf <button type="submit">Logout</button></form>
        </span>
    @endauth
</nav>
@if(session('success'))<div class="success">{{ session('success') }}</div>@endif
@if($errors->any())
    <div class="error"><strong>Please correct the following:</strong><ul>
    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
    </ul></div>
@endif
<main>@yield('content')</main>
</body>
</html>
