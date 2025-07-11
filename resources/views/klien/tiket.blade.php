<div class="container p-2 mb-3">
    <div class="row row-cols-4">
        @foreach ($tiketSa as $tiket)
            <div class="col mb-2">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/image-tiket/' . $tiket->image) }}" class="card-img-top mx-auto"
                        style="height: 200px; width: 200px;">
                    <div class="card-body">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                            {{ $tiket->name }}
                        </h2>
                        <h5 class="font-semibold text-lg text-gray-800 leading-tight mb-1 ">
                            Harga: Rp{{ number_format($tiket->harga, 0, ',', '.') }}
                        </h5>
                        <p class="card-text mb-1">{{ $tiket->deskripsi }}</p>
                        <a href="#" type="button" data-bs-toggle="modal"
                            data-bs-target="#Modal{{ $tiket->id }}" class="btn btn-primary">Total Pembeli <span><i
                                    class="bi bi-receipt-cutoff"></i></a>
                    </div>
                </div>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="Modal{{ $tiket->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">lihat total pembeli</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- <p><b>
                                    <h5>Riwayat Pembeli:</h5>
                                    @forelse ($tiket->transaksis as $trx)
                                        <p>- {{ $trx->user->name ?? 'User tidak ditemukan' }} |
                                            Rp{{ number_format($trx->harga, 0, ',', '.') }} |
                                            {{ $trx->created_at->format('Y-m-d') }}</p>
                                    @empty
                                        <p><em>Belum ada pembelian</em></p>
                                    @endforelse
                                </b></p> --}}
                            <p><b>
                                    <h5>Total Pembeli: {{ $tiket->transaksis->count() }}</h5>
                                </b></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
