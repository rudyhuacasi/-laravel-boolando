<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel template</title>
    @vite('resources/js/app.js')
</head>

<body>
    <!-- MENU  PRODUCTS -->
    @include('shared.header')

    <!-- PRODUCTS -->
    <main>
        <div class="container overflow-hidden text-center">
            <div class="row gy-3">
                @foreach($products as $product)
                <div class="content col-4">
                    <div class="p-3">
                        <div class="real">
                            <img class="prodotti w-100" src="{{ Vite::asset('resources/img/' . $product['frontImage']) }}" alt="paperella lavarel template">
                            <img class="hover-image" src="{{ Vite::asset('resources/img/' . $product['backImage']) }}" alt="paperella lavarel template">

                        </div>

                        

                        @php
                        $hasSostenibilita = false;
                        $hasDiscount = false;

                        foreach ($product['badges'] as $badge) {
                            if ($badge['type'] === 'tag' && $badge['value'] === 'Sostenibilità') {
                                $hasSostenibilita = true;
                            } elseif ($badge['type'] === 'discount' && $badge['value'] === '-50%') {
                                $hasDiscount = true;
                            }
                        }
                        @endphp

                        @if($hasSostenibilita && $hasDiscount)
                            <p class="col red verga">Sostenibilità</p>
                            <p class="col green right-1 verga">-50%</p>
                        @else
                            @foreach($product['badges'] as $badge)
                                @if($badge['type'] === 'tag' && $badge['value'] === 'Sostenibilità')
                                    <p class="col red">{{ $badge['value'] }}</p>
                                @elseif($badge['type'] === 'discount' && $badge['value'] === '-50%')
                                    <p class="col green right-1">{{ $badge['value'] }}</p>
                                @elseif($badge['type'] === 'discount')
                                    <p class="col green">{{ $badge['value'] }}</p>
                                @endif
                            @endforeach
                        @endif



                        <div class="cuore"> <i class="fa-solid fa-heart"></i></div>
                        <p class="piccolo">{{$product['brand']}}</p>
                        <strong class="testo">{{$product['name']}}</strong>
                        <p class="numeri">{{$product['price']}}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </main>

    <!-- FOOTER  PRODUCTS -->
    @include('shared.footer')

</body>

</html>