<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>  Sport Store  </title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<style>
		.bg-black-alt  {
			background:#82aa0a;
		}
		.text-black-alt  {
			color:#5cab17;
		}
		.border-black-alt {
			border-color: #78991b;
		}
	</style>

  <style>
    #editModal {
        transition: opacity 0.3s ease-in-out;
    }
    #editModal.hidden {
        opacity: 0;
        pointer-events: none;
    }
   </style>

</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<nav id="header" class="bg-blue-900 fixed w-full z-10 top-0 shadow">


		<div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">

			<div class="w-1/2 pl-2 md:pl-0">
				<a class="text-gray-100 text-base xl:text-xl no-underline hover:no-underline font-bold"  href="#">
					<i class="fa-solid fa-hippo pr-2"></i>Sport Store
				</a>
            </div>
			<div class="w-1/2 pr-0">
				<div class="flex relative inline-block float-right">

				  <div class="relative text-sm text-gray-600">
					  <button id="userButton" class="flex items-center focus:outline-none mr-3">
						<img class="w-8 h-8 rounded-full mr-4" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4g_2Qj3LsNR-iqUAFm6ut2EQVcaou4u2YXw&s" alt="Avatar of User"> <span class="hidden md:inline-block text-gray-100">{{ Auth::user()->name }}</span>
						<svg class="pl-2 h-2 fill-current text-gray-100" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"><g><path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/></g></svg>
					  </button>
					  <div id="userMenu" class="bg-gray-50 rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
						  <ul class="list-reset">
                <h1 class="text-center py-2 font-bold">Profile</h1>
                <h2 class="text-center px-2">Email :</h2>
                <h3 class="px-2 py-1">{{ Auth::user()->email }}</h3>
                <h2 class="px-2 py-2">Role : {{ Auth::user()->role }}</h2>
							<li><hr class="border-t mx-2 border-gray-400"></li>
							<li><a href="{{ route('actionlogout') }}" class="px-4 py-2 block text-gray-600 hover:bg-gray-200 no-underline hover:no-underline"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
						  </ul>
					  </div>
				  </div>


					<div class="block lg:hidden pr-4">
					<button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-100 hover:border-teal-500 appearance-none focus:outline-none">
						<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
					</button>
				</div>
				</div>

			</div>


			<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-blue-900 z-20" id="nav-content">
				<ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
          <!-- All Role -->
					<li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('dashboard.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-green-700 no-underline hover:text-gray-100 border-b-2 border-gray-900 hover:border-blue-400">
                            <i class="fas fa-home fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Dashboard</span>
                        </a>
                    </li>
          <!-- Admin, Kasir -->
					<li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('kasir.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-green-700 no-underline hover:text-gray-100 border-b-2 border-gray-900  hover:border-pink-400">
                            <i class="fas fa-cash-register fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Kasir</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('kasir.penjualan') }}" class="block py-1 md:py-3 pl-1 align-middle text-green-700 no-underline hover:text-gray-100 border-b-2 border-gray-900  hover:border-purple-400">
                            <i class="fa fa-money-bill-transfer fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Transaksi</span>
                        </a>
                    </li>
          <!-- Admin -->
          @auth
          @if(Auth::user()->role === 'Admin')
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('admin.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-green-700 no-underline hover:text-gray-100 border-b-2 border-gray-900  hover:border-green-400">
                            <i class="fas fa-box fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Stok Barang</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('admin.create') }}" class="block py-1 md:py-3 pl-1 align-middle text-green-700 no-underline hover:text-gray-100 border-b-2 border-gray-900  hover:border-red-400">
                            <i class="fa fa-plus fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Tambah Barang</span>
                        </a>
                    </li>
                    @endif
                 @endauth
				</ul>
			</div>

		</div>
	</nav>

  @yield('content')

<script>
/*Toggle dropdown list*/
/*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

var userMenuDiv = document.getElementById("userMenu");
var userMenu = document.getElementById("userButton");

var navMenuDiv = document.getElementById("nav-content");
var navMenu = document.getElementById("nav-toggle");

document.onclick = check;

function check(e) {
    var target = (e && e.target) || (event && event.srcElement);

    //User Menu
    if (!checkParent(target, userMenuDiv)) {
        // click NOT on the menu
        if (checkParent(target, userMenu)) {
            // click on the link
            if (userMenuDiv.classList.contains("invisible")) {
                userMenuDiv.classList.remove("invisible");
            } else { userMenuDiv.classList.add("invisible"); }
        } else {
            // click both outside link and outside menu, hide menu
            userMenuDiv.classList.add("invisible");
        }
    }

    //Nav Menu
    if (!checkParent(target, navMenuDiv)) {
        // click NOT on the menu
        if (checkParent(target, navMenu)) {
            // click on the link
            if (navMenuDiv.classList.contains("hidden")) {
                navMenuDiv.classList.remove("hidden");
            } else { navMenuDiv.classList.add("hidden"); }
        } else {
            // click both outside link and outside menu, hide menu
            navMenuDiv.classList.add("hidden");
        }
    }

}

function checkParent(t, elm) {
    while (t.parentNode) {
        if (t == elm) { return true; }
        t = t.parentNode;
    }
    return false;
}
</script>
<script>
function confirmDelete(id, nama) {
Swal.fire({
    title: 'Apakah Anda yakin?',
    text: `Anda akan menghapus data ${nama}`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Ya, hapus!',
    cancelButtonText: 'Batal'
}).then((result) => {
    if (result.isConfirmed) {
        // Buat form untuk mengirim permintaan DELETE
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `{{ url('admin') }}/${id}`;
        form.style.display = 'none';

        // Tambahkan CSRF token
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        form.appendChild(csrfToken);

        // Tambahkan method spoofing untuk DELETE
        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';
        form.appendChild(methodInput);

        // Tambahkan form ke body dan submit
        document.body.appendChild(form);
        form.submit();

        // Tampilkan pesan sukses setelah penghapusan
        Swal.fire(
            'Dihapus!',
            `Data ${nama} telah dihapus.`,
            'success'
        ).then(() => {
            // Reload halaman setelah penghapusan
            window.location.reload();
        });
    }
});
}
</script>
<script>
// Fungsi untuk membuka modal edit
function openEditModal(id, nama, jenis, harga_jual, harga_beli, jumlah) {
    // Isi form dengan data yang akan diedit
    document.getElementById('nama').value = nama;
    document.getElementById('jenis').value = jenis;
    document.getElementById('harga_jual').value = harga_jual;
    document.getElementById('harga_beli').value = harga_beli;
    document.getElementById('jumlah').value = jumlah;

    // Set action form ke route edit
    document.getElementById('editForm').action = `/admin/${id}`;

    // Tampilkan modal
    document.getElementById('editModal').classList.remove('hidden');
}

// Fungsi untuk menutup modal edit
function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

// Fungsi untuk submit form edit
function submitEditForm() {
    document.getElementById('editForm').submit();
}
</script>

</body>
</html>
