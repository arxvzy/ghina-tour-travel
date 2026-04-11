<!doctype html>
<html lang="id" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Admin - Ghina Tour Travel')</title>
  <meta name="description" content="@yield('description', 'PT Ghina Tour Travel Admin Panel')" />
  
  @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js'])
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  
  @yield('extra_styles')
</head>
<body>
<div class="flex">
  <aside class="sidebar p-4">
    <div class="mb-8 px-4 pt-2">
      <div class="font-bold text-lg">Ghina Tour</div>
      <div class="text-xs" style="color:var(--gold);">Admin Panel</div>
    </div>
    <nav>
      <a href="{{ route('admin.paket.index') }}" class="nav-link {{ request()->routeIs('admin.paket.*') ? 'active' : '' }}">Paket Management</a>
      <a href="#" class="nav-link">Galeri</a>
      <a href="#" class="nav-link">Settings</a>
    </nav>
  </aside>
  <main class="main-content p-8">
    @yield('content')
  </main>
</div>
</body>
</html>