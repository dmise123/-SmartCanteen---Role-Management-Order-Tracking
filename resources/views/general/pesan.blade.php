@extends('base.base')

@section('content')
<div class="max-w-7xl mx-auto p-4">
  <div class="flex flex-wrap gap-4">
    @if(auth()->user()->status_user_id_status == 1)
    <!-- MHS -->
    <div class="w-full flex justify-end mt-5 mb-3">

      <div class="items-end justify-end flex">
        <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
          Cek Keranjang
        </button>
      </div>
    </div>
    @endif


    @if(auth()->user()->status_user_id_status == 2)
    <!-- TOKO -->
    <div class="w-full justify-end flex">
      <div class="xl:w-1/3 md:w-1/2 w-full me-4">
        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-6 justify-items-end items-center py-4">

          @if($toko->is_open)
          <div class="col-span-1 flex flex-col justify-center w-full">
            <span class="text-center text-red-500 font-bold">Tutup Toko Untuk Tambah Menu</span>
            <button disabled class="px-6  md:w-auto md:h-12 h-20 w-full bg-gray-500 text-white font-semibold rounded-md shadow-md hover:bg-gray-600 transition duration-300">
              Tambah Menu
            </button>
          </div>
          <div class="col-span-1 justify-center items-center flex">
            <span class="text-green-500 font-semibold text-2xl me-5">Buka</span>
            <button class="close w-12 h-12 border-gray-300 rounded-full  bg-green-500 text-white"><i class="fa fa-check" aria-hidden="true"></i>
            </button>
          </div>
          @else
          <div class="col-span-1 justify-center w-full">
            <button data-modal-target="modal-tambah-menu" data-modal-toggle="modal-tambah-menu" class="px-6 md:w-auto md:h-12 h-20 w-full bg-indigo-500 text-white font-semibold rounded-md shadow-md hover:bg-indigo-600 transition duration-300">
              Tambah Menu
            </button>
          </div>
          <div class="col-span-1 justify-center items-center flex">
            <span class="text-red-500 font-semibold text-2xl me-5">Tutup</span>
            <button class="open w-12 h-12 border-black border-2 rounded-full bg-gray-400"></button>
          </div>
          @endif


        </div>
      </div>
    </div>
    @endif

  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

    @foreach($menus as $menu)

    <div class="w-full p-4">

      <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-transform duration-300">
        <div class="p-4 flex gap-4">
          <img

            id="image-menu-{{$menu->id_menu}}"
            @if($menu->status_tersedia)
          class="w-24 h-24 object-cover rounded"
          @else
          class="w-24 h-24 object-cover rounded grayscale"
          @endif

          src="{{ asset($menu->path_foto) }}" alt="{{ $menu->nama_menu }}">
          <div class="flex flex-col">
            <h5 class="font-bold text-gray-800">{{ $menu->nama_menu }}</h5>
            <p class="text-sm text-gray-600 mt-1">{{ $menu->deskripsi }}</p>
            <p class="text-lg font-semibold text-gray-800 mt-2">Rp {{ $menu->harga }}</p>
          </div>
        </div>

        @if(auth()->user()->status_user_id_status == 1 )

        <div class="p-4 flex justify-end items-center gap-2">
          <div id="counterGroup-{{ $menu->id_menu }}" class="hidden flex items-center gap-2">
            <button onclick="decrement({{ $menu->id_menu }})"
              class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 hover:shadow-md transition-all duration-200">
              <i class="fas fa-minus"></i>
            </button>
            <span id="counter-{{ $menu->id_menu }}" class="text-lg font-bold text-gray-800">1</span>
            <button onclick="increment({{ $menu->id_menu }})"
              class="bg-green-600 text-white px-3 py-1 rounded-lg hover:bg-green-700 hover:shadow-md transition-all duration-200">
              <i class="fas fa-plus"></i>
            </button>
          </div>
          <button id="addButton-{{ $menu->id_menu }}"
            class="bg-blue-700 text-white font-medium px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-800 hover:shadow-lg transform hover:scale-105 transition-transform duration-200"
            onclick="showCounter({{ $menu->id_menu }})">
            Tambah
          </button>
        </div>
        @endif
        @if(auth()->user()->status_user_id_status == 2)
        <div class="p-4 flex justify-end items-center gap-2">
          @if($toko->is_open)
          <div id="status-tersedia-{{ $menu->id_menu }}" class="items-center tersedia flex">

            @if($menu->status_tersedia)
            <span class="text-lime-500 font-semibold text-md me-2">Tersedia</span>
            <button data-value="{{ $menu->id_menu }}" class=" w-8 h-8 bg-lime-500 text-white border-gray-300 rounded-full  "><i class="fa fa-check" aria-hidden="true"></i></button>
            @else
            <span class="text-red-500 font-semibold text-md me-2">Habis</span>
            <button data-value="{{ $menu->id_menu }}" class=" w-8 h-8 border-gray-300 rounded-full bg-gray-200 ">
            </button>
            @endif
          </div>
          @else
          <button id="editButton"
            data-value="{{ $menu->id_menu }}"
            data-modal-target="modal-ubah-menu" data-modal-toggle="modal-ubah-menu"
            class="bg-blue-700 text-white font-medium px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-800 hover:shadow-lg transform hover:scale-105 transition-transform duration-200">
            Ubah
          </button>
          @endif
        </div>
        @endif
      </div>
    </div>
    @endforeach
  </div>


  @if(auth()->user()->status_user_id_status == 1 )
  <!-- Main modal -->
  <div id="default-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Nota Pembayaran
          </h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5 space-y-4">
          <div id="nota" class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
          </div>
          <div class="text-lg font-semibold text-right">
            Total: <span id="total-harga">Rp 0</span>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
          <button data-modal-hide="default-modal" type="button" onclick="submitOrder()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pesan!</button>
          <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
        </div>
      </div>
    </div>
  </div>
  @endif

  @if(auth()->user()->status_user_id_status == 2 )

  <!-- Main modal -->
  <div id="modal-tambah-menu" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Tambah Menu
          </h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-tambah-menu">
            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <form id="formTambahMenu" method="POST" action="{{ route('createMenu') }}" enctype="multipart/form-data">

          <div class="p-6 space-y-6">
            @csrf
            <div class="space-y-2">
              <label for="name" class=" text-gray-700 dark:text-gray-300 font-medium">Nama Menu <span class="text-red-500">*</span></label>
              <input required id="name" type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:focus:ring-blue-700">
            </div>
            <div class="space-y-2">
              <label for="price" class=" text-gray-700 dark:text-gray-300 font-medium">Harga <span class="text-red-500">*</span></label>
              <input required id="price" type="number" min=1 name="price" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:focus:ring-blue-700">
            </div>
            <div class="space-y-2">
              <label for="photo" class=" text-gray-700 dark:text-gray-300 font-medium">Foto <span class="text-red-500">*</span></label>
              <input required id="photo" type="file" accept="image/*"
                name="photo" class="w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 ">
            </div>
          </div>
          <!-- Modal footer -->
          <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button data-modal-hide="modal-tambah-menu" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
            <button type="submit" class="ms-3 py-2.5 px-5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg">Tambah Menu</button>
          </div>
        </form>

      </div>
    </div>
  </div>


  <div id="modal-ubah-menu" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="relative p-4 w-full max-w-lg max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow-lg dark:bg-gray-700">

        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 id="editHeader" class="text-xl font-semibold text-gray-900 dark:text-white">
            Ubah Menu
          </h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-ubah-menu">
            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <form id="formHapusMenu" method="POST" class="hidden">
          @csrf
          @method('DELETE')
        </form>
        <!-- Modal body -->
        <form id="formUbahMenu" method="POST" enctype="multipart/form-data">
          @method('PUT')
          <div class="p-6 space-y-6">
            @csrf
            <div class="space-y-2">
              <label for="name" class=" text-gray-700 dark:text-gray-300 font-medium">Nama Menu <span class="text-red-500">*</span></label>
              <input required id="name" type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:focus:ring-blue-700">
            </div>
            <div class="space-y-2">
              <label for="price" class=" text-gray-700 dark:text-gray-300 font-medium">Harga <span class="text-red-500">*</span></label>
              <input required id="price" type="number" min=1 name="price" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:focus:ring-blue-700">
            </div>
            <div class="space-y-2">
              <label for="photo" class=" text-gray-700 dark:text-gray-300 font-medium">Foto <span class="text-red-500">*</span></label>
              <input required id="photo" type="file" name="photo" class="w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 ">
            </div>

          </div>

          <!-- Modal footer -->
          <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button data-modal-hide="modal-ubah-menu" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
            <button id="hapusMenu" data-value="" type="button" class="ms-3 py-2.5 px-5 text-sm font-medium text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg">Hapus Menu</button>
            <button type="submit" class="ms-3 py-2.5 px-5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg">Ubah Menu</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  @endif

  <!-- END NOTA -->
  @if(auth()->user()->status_user_id_status == 1)
  <script>
    const orders = {};
    const totalHarga = {};

    function showCounter(index) {
      document.getElementById(`addButton-${index}`).classList.add('hidden');
      document.getElementById(`counterGroup-${index}`).classList.remove('hidden');

      orders[index] = 1;

      updateNota();
    }

    function increment(index) {
      const counter = document.getElementById(`counter-${index}`);
      let currentValue = parseInt(counter.textContent, 10);
      counter.textContent = currentValue + 1;
      orders[index] = currentValue + 1;

      updateNota();
    }

    function decrement(index) {
      const counter = document.getElementById(`counter-${index}`);
      let currentValue = parseInt(counter.textContent, 10);

      if (currentValue > 1) {
        counter.textContent = currentValue - 1;
        orders[index] = currentValue - 1;
      } else {
        document.getElementById(`addButton-${index}`).classList.remove('hidden');
        document.getElementById(`counterGroup-${index}`).classList.add('hidden');

        delete orders[index];
      }

      updateNota();
    }

    function updateNota() {
      const nota = document.getElementById('nota');
      const totalHargaElement = document.getElementById('total-harga');
      nota.innerHTML = '';

      let totalHarga = 0;

      for (const [menuId, quantity] of Object.entries(orders)) {
        const menuItem = document.querySelector(`#addButton-${menuId}`).parentNode.parentNode;
        const menuName = menuItem.querySelector('h5').textContent;
        const menuPrice = menuItem.querySelector('p.text-lg').textContent.replace('Rp ', '').replace(',', '');
        const menuTotal = quantity * parseInt(menuPrice, 10);

        totalHarga += menuTotal;

        const notaItem = document.createElement('div');
        notaItem.className = 'nota-item flex justify-between p-2 border-b';
        notaItem.innerHTML = `
      <span>${menuName} x${quantity}</span>
      <span>Rp ${menuTotal.toLocaleString('id-ID')}</span>
    `;
        nota.appendChild(notaItem);
      }

      totalHargaElement.textContent = `Rp ${totalHarga.toLocaleString('id-ID')}`;

      if (Object.keys(orders).length === 0) {
        nota.innerHTML = '<p class="text-center text-gray-500">No items ordered.</p>';
        totalHargaElement.textContent = 'Rp 0';
      }
    }

    function submitOrder() {
      const url = "{{ route('pay') }}";
      if (Object.keys(orders).length === 0) {
        alert('Your cart is empty!');
        return;
      }
      const data = {
        orders,
        totalHarga: Object.entries(orders).reduce((total, [menuId, quantity]) => {
          const menuItem = document.querySelector(`#addButton-${menuId}`).parentNode.parentNode;
          const menuPrice = parseInt(menuItem.querySelector('p.text-lg').textContent.replace('Rp ', '').replace(',', ''), 10);
          return total + menuPrice * quantity;
        }, 0),
      };
      $.ajax({
        url: url,
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        contentType: 'application/json',
        data: JSON.stringify(data),
        success: (result) => {
          console.log(result)
          if (result.message = "success") {
            window.location.href = "{{ route('nota') }}";
          }

        },
        error: (xhr, status, error) => {
          console.error('Error submitting order:', error);
          alert('Failed to submit the order. Please try again.');
        },
      });
    }
  </script>
  @endif
  @if(auth()->user()->status_user_id_status == 2)

  <script>
    $(document).ready(function() {
      $('.open').on('click', function() {
        const postUrl = "{{ route('openClose') }}"
        Swal.fire({
          title: `Apakah anda yakin ingin membuka toko?`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal',
          confirmButtonText: 'Ya'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: postUrl,
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              success: function(response) {
                if (response.success) {
                  Swal.fire({
                    title: 'Toko Berhasil Dibuka!',
                    icon: 'success',
                    confirmButtonColor: '#6988DC'
                  }).then(() => {
                    socket.emit("status_toko", {
                      status: "buka"
                    });
                    window.location.reload();
                  });
                } else {
                  Swal.fire({
                    title: 'Toko Gagal Dibuka!',
                    icon: 'error',
                    confirmButtonColor: '#6988DC'
                  }).then(() => {
                    window.location.reload();
                  });
                }
              },
              error: function(xhr, status, error) {

              }
            });
          }
        });

      })

      $('.close').on('click', function() {
        const postUrl = "{{ route('openClose') }}"
        Swal.fire({
          title: `Apakah anda yakin ingin menutup toko?`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal',
          confirmButtonText: 'Ya'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: postUrl,
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              success: function(response) {
                if (response.success) {
                  Swal.fire({
                    title: 'Toko Berhasil Ditutup!',
                    icon: 'success',
                    confirmButtonColor: '#6988DC'
                  }).then(() => {
                    socket.emit("status_toko", {
                      status: "tutup"
                    });
                    window.location.reload();

                  });
                } else {
                  Swal.fire({
                    title: 'Toko Gagal Ditutup!',
                    text: 'Pastikan tidak ada pesanan aktif!',
                    icon: 'error',
                    confirmButtonColor: '#6988DC'
                  }).then(() => {

                    window.location.reload();

                  });
                }
              },
              error: function(xhr, status, error) {

              }
            });
          }
        });

      })

      $('.tersedia').on('click', function() {
        var id_menu = $(this).find('button').data('value');
        var normUrl = "{{ route('menuAvailable', ['menu_id' => ':id_menu']) }}";
        const postUrl = normUrl.replace(':id_menu', id_menu);
        console.log(postUrl)
        Swal.fire({
          title: 'Loading...',
          text: 'Mohon tunggu sedang memproses data.',
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          }
        });
        $.ajax({
          url: postUrl,
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          success: function(response) {
            Swal.close()
            if (response.success) {
              if (response.isAvailable) {
                // Socket

                $('#image-menu-' + id_menu).removeClass('grayscale')
                $('#status-tersedia-' + id_menu).html(`
                  <span class=" tersedia text-lime-500 font-semibold text-md me-2">Tersedia</span>
                  <button data-value=${id_menu} class=" w-8 h-8 bg-lime-500 text-white border-gray-300 rounded-full  "><i class="fa fa-check" aria-hidden="true"></i></button>
`

                )
              } else {
                // Socket
                $('#image-menu-' + id_menu).addClass('grayscale')
                $('#status-tersedia-' + id_menu).html(`
                  <span class="text-red-500 font-semibold text-md me-2">Habis</span>
                  <button data-value=${id_menu} class=" w-8 h-8 border-gray-300 rounded-full bg-gray-200 ">
            </button>
            `)
              }
            } else {
              alert('Failed to update status.');

            }
          },
          error: function(xhr, status, error) {

          }
        });
      });


      $(document).on('click', '#editButton', function() {
        const menu_id = $(this).data("value");
        $("#editHeader").text(`Ubah Menu ${menu_id}`);
        $("#hapusMenu").data('value', menu_id);

        const url = `{{ route('editMenu', ':menu_id') }}`.replace(':menu_id', menu_id);
        $("#formUbahMenu").attr('action', url);
      });

      $('#hapusMenu').on('click', function() {
        const menu_id = $(this).data("value");
        const postUrl = `{{ route('deleteMenu', ':menu_id') }}`.replace(':menu_id', menu_id);
        $("#formHapusMenu").attr('action', postUrl);
        $("#formHapusMenu").submit();
      });


    })
  </script>

  @endif

  @endsection