{{-- <div class="container mx-auto px-4">
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
</div> --}}



<div class="container py-5">
    <div class="text-center">
        <img src="{{ asset('landpage/assets/logo2.png') }}" alt="Logo" class="mx-auto rounded mb-4"
            style="max-height: 120px;">
        <h1 class="fw-bold text-primary mb-3">Apa itu <span class="text-uppercase">Khatarsis</span>?</h1>
        <p class="lead text-muted mx-auto" style="max-width: 700px;">
            Khatarsis adalah platform untuk menjual tiket event skala kecil seperti <code>Jalan Santai</code>,
            <code>Jejepangan</code>, <code>Korea</code>, dan lainnya. Lebih mudah, lebih praktis, lebih terpercaya!
        </p>
    </div>
</div>

<div class="container pb-5">
    <div class="row text-center g-4">
        <!-- Tiket Card -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition: all 0.3s ease;">
                <div class="card-body">
                    <div class="text-primary mb-3">
                        <i class="bi bi-ticket-perforated" style="font-size: 3.5rem;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Menu Tiket</h5>
                    <p class="text-muted">Kelola tiket yang tersedia—tambahkan, edit, atau hapus tiket dengan mudah.</p>
                </div>
            </div>
        </div>

        <!-- User Card -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition: all 0.3s ease;">
                <div class="card-body">
                    <div class="text-success mb-3">
                        <i class="bi bi-person-badge" style="font-size: 3.5rem;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Menu User</h5>
                    <p class="text-muted">Tampilkan dan atur data user yang terdaftar—satu tempat untuk semua
                        pengelolaan.</p>
                </div>
            </div>
        </div>

        <!-- Client Card -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 hover-shadow" style="transition: all 0.3s ease;">
                <div class="card-body">
                    <div class="text-purple mb-3" style="color: #6f42c1;">
                        <i class="bi bi-person-circle" style="font-size: 3.5rem;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Menu Client</h5>
                    <p class="text-muted">Lihat dan kelola data klien yang bergabung dengan sistem secara efisien.</p>
                </div>
            </div>
        </div>
    </div>
</div>
