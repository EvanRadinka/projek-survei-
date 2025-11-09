<!-- Sidebar -->
<aside class="w-64 bg-amber-300 text-black flex flex-col">
    <div class="p-4 text-2xl font-bold border-gray-700 flex items-center">
        <img src="/image/image.png" alt="Logo" class="h-9 w-auto mr-4">
        <h2>Kelurahan Pekauman</h2>
    </div>

    <nav class="flex-1 p-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="block p-2 rounded hover:bg-white hover:text-black">Beranda</a>
        <a href="{{ route('survei') }}" class="block p-2 rounded hover:bg-white hover:text-black">Survei Kepuasan</a>
        <a href="{{ route('data-pelayanan') }}" class="block p-2 rounded hover:bg-white hover:text-black">Data Pelayanan</a>
        <a href="{{ route('data-bansos') }}" class="block p-2 rounded hover:bg-white hover:text-black">Data Bansos</a>
    </nav>

    <div class="p-4 border-t border-gray-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left p-2 rounded hover:bg-white hover:text-black">Logout</button>
        </form>
    </div>
</aside>
