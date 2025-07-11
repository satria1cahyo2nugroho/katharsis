<div class="container my-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach ($tiket as $item)
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('storage/image-tiket/' . $item->image) }}" alt="{{ $item->name }}"
                        class="card-img-top img-fluid" style="object-fit: cover; height: 220px;">

                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ $item->name }}</h5>
                        <p class="text-muted mb-2">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>

                        <div class="d-grid gap-2">
                            <a href="{{ route('tiket-beli', ['id' => $item->id]) }}" class="btn btn-primary">
                                <i class="bi bi-bag me-1"></i> Detail Tiket
                            </a>
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#Modal{{ $item->id }}">
                                <i class="bi bi-receipt-cutoff me-1"></i> Deskripsi
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Deskripsi Tiket -->
            <div class="modal fade" id="Modal{{ $item->id }}" tabindex="-1"
                aria-labelledby="ModalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel{{ $item->id }}">Deskripsi Tiket</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>{{ $item->deskripsi }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
