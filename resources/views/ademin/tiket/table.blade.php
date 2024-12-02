<div class="tabele-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">no</th>
                <th scope="col">Image</th>
                <th scope="col">id_tiket</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($tiket as $t)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><img src="{{ asset('storage/image-tiket/' . $t->image) }}" style="height: 150px; width: 250px;">
                    </td>
                    <td>{{ $t->id_tiket }}</td>
                    <td>{{ $t->name }}</td>
                    <td>Rp{{ number_format($t->harga, 0, ',', '.') }}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <a href="{{ route('detail-tiket', ['id' => $t->id]) }}" class="btn btn-info"
                                type="button">Detail</a>
                            <a href="{{ route('tiket-edit', ['id' => $t->id]) }}" class="btn btn-danger"
                                type="button">Edit</a>
                            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal{{ $t->id }}"
                                type="button">Delete</a>
                        </div>
                    </td>
                </tr>
                {{-- modal delete --}}
                <div class="modal fade" id="modal{{ $t->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>apakah anda yakin ingin menghapus tiket <b>{{ $t->name }}</b> </p>
                            </div>
                            <div class="modal-footer">

                                <form action="{{ route('tiket-delete', ['id' => $t->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary">Ya, hapus data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>
