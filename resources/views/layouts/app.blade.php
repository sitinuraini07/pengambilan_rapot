<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Rapot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Aplikasi Rapot</a>
        <a href="{{ route('guru.index') }}" class="btn btn-light btn-sm">Data Guru</a>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>