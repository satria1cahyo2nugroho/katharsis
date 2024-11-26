{{-- <div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">no</th>
                <th scope="col">Nama Klien</th>
                <th scope="col">Nama Tiket</th>
                <th scope="col">Id_Tiket</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody id="myTable">
            <tr>
                <th scope="row">1</th>
                <td>sumanto</td>
                <td>Siomay</td>
                <td>ASDG</td>
                <td>1234567</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>sumir</td>
                <td>Sarkas</td>
                <td>ASCF</td>
                <td>1234458</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>suma</td>
                <td>Simay</td>
                <td>AJKL</td>
                <td>1456567</td>
            </tr>
        </tbody>
    </table>
</div> --}}


<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">User Name</th>
                <th scope="col">Tiket ID</th>
                <th scope="col">Tiket Name</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($tiketDescs as $index => $tiketDesc)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $tiketDesc->user_name }}</td>
                    <td>{{ $tiketDesc->id_tiket }}</td>
                    <td>{{ $tiketDesc->name }}</td>
                    <td>{{ $tiketDesc->harga }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
