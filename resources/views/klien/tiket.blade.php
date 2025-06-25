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
                        {{-- <p class="card-text mb-1">{{ $item->deskripsi }}</p> --}}
                        <a href="#" class="btn btn-primary">DETAIL TIKET
                            <span><i class="bi bi-bag"></span></i></a>
                        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#Modal"
                            class="btn btn-primary">Deskripsi <span><i class="bi bi-receipt-cutoff"></i></a>
                    </div>
                </div>

            </div>

            <!-- Modal -->
            {{-- <div class="modal fade" id="Modal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Deskripsi Tiket</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><b>{{ $item->deskripsi }}</b></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div> --}}
        @endforeach
    </div>
</div>
