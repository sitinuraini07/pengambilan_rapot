<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>E-Rapot Dashboard</title>

<script src="https://cdn.tailwindcss.com"></script>

<!-- BOOTSTRAP CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- BOOTSTRAP ICON -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>

/* STATS */
.stats-grid{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;
margin-bottom:25px;
}

.stat-card{
background:white;
padding:20px;
border-radius:10px;
display:flex;
align-items:center;
gap:15px;
box-shadow:0 2px 8px rgba(0,0,0,0.08);
}

.stat-icon{
font-size:28px;
color:#2563eb;
}

.stat-content h3{
font-size:22px;
font-weight:700;
}

.stat-content p{
font-size:14px;
color:#6b7280;
}

/* BUTTON */
.btn-primary-custom{
background:#2563eb;
color:white;
padding:8px 14px;
border-radius:6px;
font-weight:600;
display:inline-flex;
gap:6px;
align-items:center;
text-decoration:none;
}

.btn-primary-custom:hover{
background:#1d4ed8;
}

.btn-outline-custom{
border:1px solid #2563eb;
padding:8px 14px;
border-radius:6px;
font-weight:600;
display:inline-flex;
gap:6px;
align-items:center;
}

/* CARD */
.card-premium{
background:white;
border-radius:10px;
box-shadow:0 2px 8px rgba(0,0,0,0.08);
}

/* TABLE */
.table-premium{
width:100%;
border-collapse:collapse;
}

.table-premium th{
background:#f1f5f9;
text-align:left;
padding:12px;
font-weight:700;
}

.table-premium td{
padding:12px;
border-bottom:1px solid #eee;
}

/* BADGE */
.badge-premium{
padding:4px 8px;
border-radius:6px;
font-size:12px;
font-weight:600;
display:inline-flex;
align-items:center;
gap:4px;
}

.badge-blue{
background:#dbeafe;
color:#1e40af;
}

.badge-green{
background:#dcfce7;
color:#166534;
}

/* ACTION BUTTON */
.action-buttons{
display:flex;
gap:6px;
}

.btn-action{
background:#e5e7eb;
padding:6px;
border-radius:6px;
}

.btn-action-edit{
background:#fde68a;
}

.btn-action-delete{
background:#fecaca;
}

</style>

</head>

<body class="bg-blue-50">

<div class="flex h-screen">

<!-- SIDEBAR -->
<aside class="w-64 bg-blue-600 text-white flex flex-col">

<div class="p-6 text-2xl font-bold border-b border-blue-500">
E-Rapot
</div>

<nav class="flex-1 p-4 space-y-2">

<a href="/dashboard" class="block px-4 py-2 rounded hover:bg-blue-500">
Dashboard
</a>

@if(Auth::user()->role == 'admin')

<a href="/rapot" class="block px-4 py-2 rounded hover:bg-blue-500">
Data Rapot
</a>

@endif


@if(Auth::user()->role == 'user')

<a href="/siswa" class="block px-4 py-2 rounded hover:bg-blue-500">
Data Siswa
</a>

<a href="/guru" class="block px-4 py-2 rounded hover:bg-blue-500">
Data Guru
</a>

<a href="/kelas" class="block px-4 py-2 rounded hover:bg-blue-500">
Data Kelas
</a>

<a href="/nilai" class="block px-4 py-2 rounded hover:bg-blue-500">
Data Nilai
</a>

@endif

</nav>

<div class="p-4 border-t border-blue-500">

<form method="POST" action="{{ route('logout') }}">
@csrf
<button class="w-full bg-blue-500 hover:bg-blue-400 p-2 rounded">
Logout
</button>
</form>

</div>

</aside>


<!-- MAIN -->
<div class="flex-1 flex flex-col">

<header class="bg-white shadow p-4 flex justify-between">

<h1 class="text-xl font-semibold text-blue-700">
Dashboard
</h1>

<div class="text-gray-600">
{{ Auth::user()->name }}
</div>

</header>


<main class="p-6 overflow-y-auto">

@yield('content')

</main>

</div>

</div>

<!-- BOOTSTRAP JS (UNTUK MODAL FILTER) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>