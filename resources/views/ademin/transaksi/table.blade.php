<div class="tabele-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">no</th>
                <th scope="col">Nama</th>
                <th scope="col">Tiket</th>
                <th scope="col">status</th>
                <th scope="col">harga</th>
                <th scope="col">Updated_At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($transaksidecs as $d)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $d->user_name }}</td>
                    <td>{{ $d->tiket_name }}</td>
                    <td>
                        @if ($d->status == 'pending')
                            <span class="badge bg-warning text-dark">{{ $d->status }}</span>
                        @elseif ($d->status == 'success')
                            <span class="badge bg-success">{{ $d->status }}</span>
                        @else
                            <span class="badge bg-danger">{{ $d->status }}</span>
                        @endif
                    </td>
                    <td>Rp{{ number_format($d->harga, 0, ',', '.') }}</td>
                    <td>{{ $d->updated_at }}</td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal{{ $d->id }}">
                            Ubah status
                        </button></td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="modal{{ $d->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">UBAH STATUS</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('ganti-status', $d->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    <p>apakah anda yakin ingin mengubah
                                        status <b>
                                            @if ($d->status == 'pending')
                                                <span class="badge bg-warning text-dark">{{ $d->status }}</span>
                                            @elseif ($d->status == 'success')
                                                <span class="badge bg-success">{{ $d->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $d->status }}</span>
                                            @endif
                                        </b> pembayaran pada user ini </p>
                                    <select name="status" class="form-select">
                                        <option value="pending" {{ $d->status == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="success" {{ $d->status == 'success' ? 'selected' : '' }}>Success
                                        </option>
                                        <option value="failed" {{ $d->status == 'failed' ? 'selected' : '' }}>
                                            Failed</option>
                                    </select>
                                </div>
                                <div class="modal-footer"> <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button> <button type="submit"
                                        class="btn btn-primary">Simpan Perubahan</button> </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>
