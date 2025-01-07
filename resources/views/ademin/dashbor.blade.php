<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-blue-500 text-white rounded-lg shadow-lg p-4">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-2xl font-bold">0</h3>
                    <p class="text-sm">Transaksi Berhasil</p>
                </div>
            </div>
        </div>
        <div class="bg-green-600 text-white rounded-lg shadow-lg p-4">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-2xl font-bold">0</sup></h3>
                    <p class="text-sm">Transaksi Gagal</p>
                </div>
            </div>
        </div>
        <div class="bg-yellow-600 text-white rounded-lg shadow-lg p-4">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-2xl font-bold">0</h3>
                    <p class="text-sm">Transaksi Pending</p>
                </div>

            </div>
        </div>
        <div class="bg-red-500 text-white rounded-lg shadow-lg p-4">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-2xl font-bold">0</h3>
                    <p class="text-sm">Total User</p>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="container p-4">
    <div class="card">
        {{-- <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('landpage/assets/image/q.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('landpage/assets/image/w.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('landpage/assets/image/e.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> --}}
    </div>
    <br>
    <div class="container my-5">
        <div class="p-5 text-center bg-body-tertiary rounded-3">
            <img src="{{ asset('landpage/assets/logo2.png') }}" class="rounded img-fluid d-block mx-auto"
                alt="..." />
            <h1 class="text-body-emphasis">APA ITU KHATARSIS ??</h1>
            <p class="col-lg-8 mx-auto fs-5 text-muted">
                Khatarsis adalah sebuah sarana untuk anda menjual tiket sebuah event dengan sekala kecil
                seperti acara <code>Jalan Santai,jejepangan,Korea,</code> dsb. dengan adanya khatarsis semuanya bisa
                lebih mudah.
            </p>
        </div>
    </div>
</div>
<div class="container text-center pb-5">
    <div class="row">
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <i class="bi bi-ticket-perforated" style="font-size: 4rem;"></i>
                    <h5 class="font-semibold text-xl text-gray-800 leading-tight">Tiket</h5>
                    <p class="card-text">Menu ini akan menampilkan rentetan User
                        yang telah terdaftar atau bergabung,
                        berfungsi juga untuk menambahkan, menghapus, dan mengedit</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <i class="bi bi-person-badge" style="font-size: 4rem;"></i>
                    <h5 class="font-semibold text-xl text-gray-800 leading-tight">USER</h5>
                    <p class="card-text">Menu ini akan menampilkan rentetan User
                        yang telah terdaftar atau bergabung,
                        berfungsi juga untuk menambahkan, menghapus, dan mengedit</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <i class="bi bi-person-circle" style="font-size: 4rem;"></i>
                    <h5 class="font-semibold text-xl text-gray-800 leading-tight">Client</h5>
                    <p class="card-text">Menu ini akan menampilkan rentetan Client
                        yang telah terdaftar atau bergabung,
                        berfungsi juga untuk menambahkan, menghapus, dan mengedi</p>
                </div>
            </div>
        </div>
    </div>
</div>
