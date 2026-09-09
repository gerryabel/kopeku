<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <title>@yield('title') - KOPEKU</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: true,
      theme: {
        extend: {
          colors: {
            cream: '#FFF9F0',
            blush: '#F7DAD9',
            sage: '#A8C3A5',
            brown: '#6B4C3B',
            softgray: '#4F4F4F',
          }
        }
      }
    }
  </script>
</head>

<body class="bg-cream text-softgray font-sans min-h-screen flex flex-col">

  <!-- Header -->
  <header class="bg-sage text-brown px-6 py-4 flex justify-between items-center shadow-md">
    <h1 class="text-2xl font-bold">🐾 KOPEKU</h1>
    <nav class="space-x-4">
      <a href="{{ url('/') }}" class="hover:underline">Home</a>
      <a href="{{ route('photos.index') }}" class="hover:underline">Galeri</a>
      <a href="{{ route('forum.index') }}" class="hover:underline">Forum</a>
      <a href="{{ route('articles.index') }}" class="hover:underline">Artikel</a>
      <a href="{{ route('adoptions.index') }}" class="hover:underline" class="hover:underline">Adopsi</a>
    </nav>
  </header>

  <!-- Main Content -->
  <main class="flex-grow container mx-auto px-4 md:px-8 py-8">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-brown text-cream text-center py-4 mt-10">
    <p>&copy; {{ date('Y') }} KOPEKU - Komunitas Pecinta Kucing</p>
  </footer>

</body>

</html>