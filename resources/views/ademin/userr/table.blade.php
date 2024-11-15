<div class="tabele-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">no</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Created_At</th>
                <th scope="col">Updated_At</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->created_at }}</td>
                    <td>{{ $d->updated_at }}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <a href="{{ route('user-edit', ['id' => $d->id]) }}" class="btn btn-danger"
                                type="button">Edit</a>
                            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal{{ $d->id }}"
                                type="button">Delete</a>
                        </div>
                    </td>
                </tr>
                {{-- modal delete --}}
                <div class="modal fade" id="modal{{ $d->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>apakah anda yakin ingin menghapus User Bernama <b>{{ $d->name }}</b> </p>
                            </div>
                            <div class="modal-footer">

                                <form action="{{ route('user-delete', ['id' => $d->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary">Ya, hapus User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>
