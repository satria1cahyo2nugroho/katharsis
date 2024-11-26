<div class="container flex-auto p-4">
    {{-- carousel --}}
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner rounded-md">
            <div class="carousel-item active">
                <img src="{{ asset('landpage/assets/image/e.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('landpage/assets/image/q.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('landpage/assets/image/w.jpg') }}" class="d-block w-100" alt="...">
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
    </div>
</div>
{{-- card Qute --}}
<div class="container p-3">
    <div class="card">
        <div class="card-header">
            Khatarsis
        </div>
        <div class="card-body">
            <blockquote class="blockquote m-2">
                <p>Khatarsis DEVELOPMENT </p>
                <footer class="blockquote-footer mt-2">Range <cite title="Source Title">54Hz+</cite></footer>
            </blockquote>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="p-5 text-center bg-body-tertiary rounded-3">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('landpage/assets/logo2.png') }}" class="rounded img-fluid" alt="..." />
        </div>
        <h1 class="text-body-emphasis">APA ITU KHATARSIS ??</h1>
        <p class="col-lg-8 mx-auto fs-5 text-muted">
            Khatarsis adalah sebuah sarana untuk anda menjual tiket sebuah event dengan sekala kecil
            seperti acara
            <code>Jalan Santai, jejepangan, Korea,</code> dsb. dengan adanya khatarsis semuanya bisa lebih mudah.
        </p>
    </div>
</div>
