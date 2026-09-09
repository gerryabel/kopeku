@extends('layouts.gallery')

@section('title', 'Galeri KOPEKU')

@section('gallery-content')
<div class="max-w-7xl mx-auto px-6 py-10">

  <div class="flex justify-between items-center mb-8">
    <h1 class="text-4xl font-semibold text-[#578E7E]">Galeri KOPEKU</h1>
    @auth
    <button id="btnUpload" class="bg-[#A8C3A5] text-[#6B4C3B] px-4 py-2 rounded hover:bg-[#6B4C3B] hover:text-[#FFF9F0] transition font-semibold">Upload Foto</button>
    @endauth
  </div>

  @if(session('success'))
  <div class="mb-4 bg-green-100 text-green-800 px-4 py-3 rounded">{{ session('success') }}</div>
  @endif

  @if ($errors->any())
  <div class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded">
    <ul class="list-disc list-inside">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  @if($photos->count())
  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
    @foreach($photos as $photo)
    <div
      class="overflow-hidden rounded-lg shadow-md hover:shadow-lg transition cursor-pointer"
      data-full="{{ asset('storage/' . $photo->filename) }}"
      data-title="{{ $photo->title ?? '' }}"
      data-desc="{{ $photo->description ?? '' }}">

      <img src="{{ asset('storage/' . $photo->filename) }}" alt="{{ $photo->title ?? 'Foto Kucing' }}" class="w-full h-48 object-cover rounded-t-lg" />

      <div class="bg-[#FFF9F0] px-3 py-2 rounded-b-lg">
        <h4 class="text-[#6B4C3B] font-semibold text-s truncate" title="{{ $photo->title ?? '' }}">
          {{ $photo->title ?? '-' }}
        </h4>

        <div class="flex items-center space-x-3 mt-1">
          <!-- Avatar -->
          @if($photo->user->avatar)
          <img
            src="{{ asset('storage/' . $photo->user->avatar) }}"
            alt="{{ $photo->user->name }}"
            class="w-6 h-6 rounded-full object-cover" />
          @else
          <div class="w-6 h-6 rounded-full bg-gray-300 flex items-center justify-center text-[10px] font-bold text-[#6B4C3B] uppercase shadow-sm">
            {{ strtoupper(substr($photo->user->name, 0, 1)) }}
          </div>
          @endif

          <div class="text-[#6B4C3B]/90 text-xs leading-tight">
            <div class="font-semibold truncate max-w-[120px]" title="{{ $photo->user->name ?? '-' }}">
              {{ $photo->user->name ?? '-' }}
              @if($photo->user->banned)
              <span class="text-red-500 text-[10px]">(banned)</span>
              @endif
            </div>
            <div class="text-[#6B4C3B]/60">
              {{ $photo->created_at->diffForHumans() }}
            </div>
          </div>
        </div>

        <p class="text-[#6B4C3B]/80 text-sm mt-4 line-clamp-2" title="{{ $photo->description ?? '' }}">
          {{ $photo->description ?? '-' }}
        </p>

        @auth
        @if(auth()->user()->id === $photo->user_id || auth()->user()->role === 'admin')
        <div class="bg-[#FFF9F0] py-2 rounded-b-lg relative flex items-center space-x-2">
          <button
            class="btnEdit text-xs bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500"
            data-id="{{ $photo->id }}"
            data-title="{{ addslashes($photo->title) }}"
            data-description="{{ addslashes($photo->description) }}">
            Edit
          </button>

          <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?')" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-xs bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
              Hapus
            </button>
          </form>

          @if(auth()->user()->role === 'admin' && $photo->user->role !== 'admin')
          @if(!$photo->user->banned)
          <form action="{{ route('admin.users.ban', $photo->user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin membanned user ini?')" class="inline">
            @csrf
            @method('PATCH')
            <button type="submit" class="text-xs bg-gray-800 text-white px-2 py-1 rounded hover:bg-gray-900">
              Ban
            </button>
          </form>
          @else
          <form action="{{ route('admin.users.unban', $photo->user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin membuka ban user ini?')" class="inline">
            @csrf
            @method('PATCH')
            <button type="submit" class="text-xs bg-green-700 text-white px-2 py-1 rounded hover:bg-green-800">
              Unban
            </button>
          </form>
          @endif
          @endif
        </div>
        @endif
        @endauth
      </div>
    </div>
    @endforeach
  </div>

  <div class="mt-8">
    {{ $photos->links() }}
  </div>
  @else
  <p class="text-center text-gray-500 mt-10 text-lg">Belum ada foto di galeri.</p>
  @endif

  <!-- CTA Upload Section -->
  <section class="bg-[#F7DAD9] py-12 px-6 text-center rounded-t-lg mt-12">
    <h3 class="text-2xl font-bold text-[#6B4C3B] mb-3">Ingin Bagikan Foto Kucingmu?</h3>
    <p class="mb-6 max-w-xl mx-auto text-[#6B4C3B]">Upload foto kucing kesayanganmu dan bagikan ke komunitas KOPEKU.</p>

    @auth
    <button id="btnUploadBottom" class="bg-[#A8C3A5] text-[#6B4C3B] px-6 py-3 rounded hover:bg-[#6B4C3B] hover:text-[#FFF9F0] transition font-semibold">Upload Foto</button>
    @else
    <a href="{{ route('login') }}" class="bg-[#6B4C3B] text-white px-6 py-3 rounded hover:bg-[#3D3D3D] transition font-semibold">Login untuk Upload</a>
    @endauth
  </section>

</div>

@auth
<!-- Modal Upload -->
<div id="modalUpload" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center hidden z-50">
  <div class="bg-[#FFF9F0] rounded-lg w-full max-w-md p-6 relative shadow-lg">
    <button id="closeUpload" class="absolute top-3 right-3 text-[#6B4C3B] hover:text-[#6B4C3B]/70 text-2xl font-bold">&times;</button>
    <h2 class="text-xl font-semibold mb-4 text-[#6B4C3B]">Upload Foto Kucing</h2>
    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <div>
        <label for="title" class="block mb-1 font-medium text-gray-700">Judul (opsional)</label>
        <input type="text" name="title" id="title" placeholder="Judul (opsional)" class="w-full border px-3 py-2 rounded" value="{{ old('title') }}" />
      </div>

      <div>
        <label for="photo" class="block mb-1 font-medium text-gray-700">Foto Kucing <span class="text-red-600 font-bold">*</span></label>
        <input type="file" name="photo" id="photo" required class="w-full" />
      </div>

      <div>
        <label for="description" class="block mb-1 font-medium text-gray-700">Deskripsi (opsional)</label>
        <textarea name="description" id="description" rows="3" placeholder="Deskripsi (opsional)" class="w-full border px-3 py-2 rounded">{{ old('description') }}</textarea>
      </div>

      <div class="flex justify-end space-x-3">
        <button type="button" id="cancelUpload" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Batal</button>
        <button type="submit" class="bg-[#578E7E] text-white px-5 py-2 rounded hover:bg-[#3D3D3D] transition">Upload</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Edit -->
<div id="modalEdit" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center hidden z-50">
  <div class="bg-[#FFF9F0] rounded-lg w-full max-w-md p-6 relative shadow-lg">
    <button id="closeEdit" class="absolute top-3 right-3 text-[#6B4C3B] hover:text-[#6B4C3B]/70 text-2xl font-bold">&times;</button>
    <h2 class="text-xl font-semibold mb-4 text-[#6B4C3B]">Edit Foto</h2>

    <form id="formEdit" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      @method('PUT')

      <!-- Preview foto lama -->
      <div class="text-center">
        <img id="editPreviewImage" src="" alt="Foto saat ini" class="mx-auto h-40 w-auto rounded object-cover border border-gray-300 mb-2">
        <input type="file" name="photo" id="editPhotoInput" accept="image/*" class="block w-full text-sm text-gray-700 border border-gray-300 rounded px-3 py-2" />
      </div>

      <!-- Judul -->
      <div>
        <label for="editTitle" class="block mb-1 font-medium text-gray-700">Judul</label>
        <input type="text" name="title" id="editTitle" class="w-full border px-3 py-2 rounded" />
      </div>

      <!-- Deskripsi -->
      <div>
        <label for="editDescription" class="block mb-1 font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" id="editDescription" rows="3" class="w-full border px-3 py-2 rounded"></textarea>
      </div>

      <div class="flex justify-end space-x-3">
        <button type="button" id="cancelEdit" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Batal</button>
        <button type="submit" class="bg-[#578E7E] text-white px-5 py-2 rounded hover:bg-[#3D3D3D] transition">Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>
@endauth

<!-- Modal Zoom -->
<div id="modalZoom" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden z-60 p-4">
  <div class="bg-[#FFF9F0] rounded-lg shadow-lg max-w-3xl w-full max-h-[90vh] overflow-auto relative">
    <button id="closeZoom" class="absolute top-3 right-3 text-[#6B4C3B] hover:text-[#6B4C3B]/70 text-3xl font-bold">&times;</button>
    <img id="zoomImg" src="" alt="Zoom Foto" class="w-full max-h-[80vh] object-contain rounded-t-lg" />
  </div>
</div>

<script>
  const btnUpload = document.getElementById('btnUpload');
  const btnUploadBottom = document.getElementById('btnUploadBottom');
  const modalUpload = document.getElementById('modalUpload');
  const closeUpload = document.getElementById('closeUpload');
  const cancelUpload = document.getElementById('cancelUpload');

  if (btnUpload) {
    btnUpload.addEventListener('click', () => modalUpload.classList.remove('hidden'));
  }

  if (btnUploadBottom) {
    btnUploadBottom.addEventListener('click', () => modalUpload.classList.remove('hidden'));
  }

  if (closeUpload) {
    closeUpload.addEventListener('click', () => modalUpload.classList.add('hidden'));
  }

  if (cancelUpload) {
    cancelUpload.addEventListener('click', () => modalUpload.classList.add('hidden'));
  }

  function openEditModal(id, title, description) {
    const form = document.getElementById('formEdit');
    const editModal = document.getElementById('modalEdit');

    form.action = `/photos/${id}`; // Sesuai resource route
    document.getElementById('editTitle').value = title;
    document.getElementById('editDescription').value = description;

    editModal.classList.remove('hidden');
  }

  function closeEditModal() {
    document.getElementById('modalEdit').classList.add('hidden');
  }

  // Zoom modal
  const modalZoom = document.getElementById('modalZoom');
  const closeZoom = document.getElementById('closeZoom');
  const zoomImg = document.getElementById('zoomImg');

  document.querySelectorAll('[data-full]').forEach(el => {
    el.addEventListener('click', () => {
      zoomImg.src = el.getAttribute('data-full');
      modalZoom.classList.remove('hidden');
    });
  });

  closeZoom.addEventListener('click', () => {
    modalZoom.classList.add('hidden');
    zoomImg.src = '';
  });

  const modalEdit = document.getElementById('modalEdit');
  const closeEdit = document.getElementById('closeEdit');
  const cancelEdit = document.getElementById('cancelEdit');
  const formEdit = document.getElementById('formEdit');
  const editTitle = document.getElementById('editTitle');
  const editDescription = document.getElementById('editDescription');
  const editPhotoInput = document.getElementById('editPhotoInput');
  const previewImage = document.getElementById('editPreviewImage');

  // Buka modal edit
  document.querySelectorAll('.btnEdit').forEach(btn => {
    btn.addEventListener('click', (event) => {
      event.stopPropagation(); // Cegah event bubbling

      const id = btn.dataset.id;
      const title = btn.dataset.title;
      const desc = btn.dataset.description;
      const imageUrl = btn.closest('[data-full]').dataset.full;

      editTitle.value = title;
      editDescription.value = desc;
      previewImage.src = imageUrl;
      formEdit.action = `/photos/${id}`; // sesuaikan dengan route update

      modalEdit.classList.remove('hidden');
    });
  });

  // Preview gambar saat diganti
  editPhotoInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(event) {
        previewImage.src = event.target.result;
      };
      reader.readAsDataURL(file);
    }
  });

  // Tutup modal saat klik tombol close atau cancel
  [closeEdit, cancelEdit].forEach(el => {
    el.addEventListener('click', () => {
      modalEdit.classList.add('hidden');
    });
  });

  // Cegah klik tombol Edit/Hapus memicu event foto utama
  document.querySelectorAll('.btnEdit, form').forEach(el => {
    el.addEventListener('click', (event) => {
      event.stopPropagation();
    });
  });

  [closeEdit, cancelEdit].forEach(el => {
    el.addEventListener('click', () => {
      modalEdit.classList.add('hidden');
    });

    // Tangkap tombol edit dan hapus, dan stop propagation
    document.querySelectorAll('.btnEdit').forEach(btn => {
      btn.addEventListener('click', (event) => {
        event.stopPropagation();
        // logika edit modal di sini (kalau ada)
      });
    });

    document.querySelectorAll('form').forEach(form => {
      form.addEventListener('click', (event) => {
        // Untuk mencegah klik tombol hapus trigger zoom
        event.stopPropagation();
      });
    });
  });
</script>
@endsection