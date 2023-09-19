<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/telegram-web-app.js'])
</head>
<body>

<div class="container my-3">
    <div class="row">
        <div class="col-12">

            <nav class="fixed-top bg-white">
                <div class="nav nav-tabs animate__animated animate__fadeInDown" id="nav-tab" role="tablist">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav-store" type="button"
                            role="tab">Store
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-cart" type="button" role="tab">
                        <livewire:mini-cart/>
                    </button>

                </div>
            </nav>

            <div class="tab-content mt-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-store" role="tabpanel">
                    <h2 class="animate__animated animate__fadeInDown text-center">Food Shop</h2>
                    <div class="row animate__animated animate__fadeIn" id="products-list">
                        @include('partials.products')
                    </div>

                    <div class="text-center animate__animated animate__fadeInUp" id="loader" x-data="loadMore"
                         x-show="show" x-init="nextPageUrl = '{{ $products->nextPageUrl() }}'">
                        <button class="btn btn-warning" id="loader-btn" @click="load">Load more</button>
                        <img src="{{ Vite::image('loader.svg') }}" alt="" id="loader-img"
                             :class="{'loader-img' : !loading}">
                    </div>

                </div>
                <div class="tab-pane fade show" id="nav-cart" role="tabpanel">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="animate__animated animate__fadeInDown text-center">Cart</h2>


                            <livewire:cart-table/>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
@livewireScriptConfig
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
