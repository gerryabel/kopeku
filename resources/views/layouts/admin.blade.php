<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - KOPEKU Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
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

    <nav class="bg-[#578E7E] text-white p-4 flex justify-between items-center">
        <div class="flex items-center gap-6">
            <div class="font-bold text-xl">KOPEKU Admin</div>

            <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
            <a href="{{ route('admin.users.index') }}" class="hover:underline">Kelola User</a>
            <a href="{{ route('admin.photos.index') }}" class="hover:underline">Kelola Galeri</a>
            <a href="{{ route('admin.forum.index') }}" class="hover:underline">Kelola Forum</a>

            {{-- Dropdown Kelola Artikel --}}
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="hover:underline focus:outline-none">
                    Kelola Artikel ▼
                </button>
                <div x-show="open" @click.away="open = false" class="absolute left-0 mt-2 w-48 bg-white text-[#3D3D3D] rounded shadow z-10">
                    <a href="{{ route('admin.articles.index') }}" class="block px-4 py-2 hover:bg-[#F5ECD5]">Kelola Artikel</a>
                    <a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 hover:bg-[#F5ECD5]">Kategori Artikel</a>
                </div>
            </div>

            {{-- Dropdown Kelola Kucing --}}
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="hover:underline focus:outline-none">
                    Kelola Kucing ▼
                </button>
                <div x-show="open" @click.away="open = false" class="absolute left-0 mt-2 w-48 bg-white text-[#3D3D3D] rounded shadow z-10">
                    <a href="{{ route('admin.adoptions.index') }}" class="block px-4 py-2 hover:bg-[#F5ECD5]">Daftar Kucing</a>
                    <a href="{{ route('admin.addresses.index') }}" class="block px-4 py-2 hover:bg-[#F5ECD5]">Kota Kucing</a>
                    <a href="{{ route('admin.breeds.index') }}" class="block px-4 py-2 hover:bg-[#F5ECD5]">Jenis Kucing</a>
                </div>
            </div>
            <a href="{{ url('/') }}" class="hover:underline">Home KOPEKU</a>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-200 px-3 py-1 text-red-600 rounded hover:bg-red-500 hover:text-red-200 transition">
                Logout
            </button>
        </form>
    </nav>

    <main class="flex-grow container mx-auto px-4 md:px-8 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brown text-cream text-center py-4 mt-10">
        <p>&copy; {{ date('Y') }} KOPEKU - Komunitas Pecinta Kucing</p>
    </footer>

</body>

<script src="https://unpkg.com/alpinejs" defer></script>

</html>