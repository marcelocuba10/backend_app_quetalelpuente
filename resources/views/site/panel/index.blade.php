<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Carousel Example</title>
    <!-- Agrega los estilos de Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</head>
<body>

{{-- three sections --}}
@if ($panel->id_viewer == 1)
    <!-- Sección 1: Widget del clima -->
    <div class="section-1" style="width: 100%; height: 180px; background-color: #3498db; color: #fff; text-align: center;margin-top: -20px;">
        <h2>Condiciones Climáticas</h2>
        <p>Ciudad del Este, Paraguay</p>
        <div id="weather-widget">
            <p>Temperatura: {{ $weatherData['main']['temp'] }}°C</p>
            <p>Condiciones: {{ $weatherData['weather'][0]['description'] }}</p>
            <p>Humedad: {{ $weatherData['main']['humidity'] }}%</p>
        </div>
    </div>

    <!-- Sección 2: Carrusel -->
    <div class="section-2" style="margin-left: 300px; width: calc(100% - 300px); float: left;">
        <div class="owl-carousel">
            @foreach ($ads as $ad)
                <div class="item" style="height: 80vh;">
                    <img src="{{ asset('/public/images/multimedia/' . $ad->multimedia) }}" alt="Image">
                </div>
            @endforeach
        </div>
    </div>

    <!-- Sección 3: Widget de cotización de monedas -->
    <div class="section-3" style="width: 300px; height: 100vh; float: left; background-color: #f1c40f; color: #000; text-align: center;position: absolute;">
        <h2>Cotización de Monedas</h2>
        <div id="currency-widget">
            <!-- Asegúrate de tener una fuente confiable para obtener datos de cotización de monedas -->
            <!-- Puedes utilizar servicios de terceros o APIs para obtener datos reales -->
            <p>USD/PYG: 6,000</p>
            <p>EUR/PYG: 7,000</p>
            <p>GBP/PYG: 8,000</p>
        </div>
    </div>
@endif    

{{-- one section --}}
@if ($panel->id_viewer == 2)    
    <div class="owl-carousel">
        @foreach ($ads as $ad)
            <div class="item">
                <img src="{{ asset('/public/images/multimedia/' . $ad->multimedia) }}" alt="Image">
            </div>
        @endforeach
    </div>
@endif

{{-- two sections --}}
@if ($panel->id_viewer == 3)    
    <!-- Dos secciones apiladas verticalmente -->
    <div class="owl-carousel">
        <!-- Sección 1: Carrusel -->
        @foreach ($ads as $ad)
            <div class="item">
                <img src="{{ asset('/public/images/multimedia/' . $ad->multimedia) }}" alt="Image">
            </div>
        @endforeach
    </div>

    <div class="section-2" style="background-color: #f1c40f; color: #000; text-align: center;">
        <h2>Cotización de Monedas</h2>
        <div id="currency-widget">
            <!-- Contenido del widget de cotización de monedas -->
            <p>USD/PYG: 6,000</p>
            <p>EUR/PYG: 7,000</p>
            <p>GBP/PYG: 8,000</p>
        </div>
    </div>
@endif

<!-- Agrega el script de Owl Carousel y jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            items: 1, // Cantidad de elementos visibles en el carrusel
            loop: true, // Repetir el carrusel
            nav: true, // Muestra botones de navegación
            dots: false, // Oculta los puntos de navegación
            autoplay: true, // Activa la reproducción automática
            autoplayTimeout: 3000, // Intervalo de tiempo en milisegundos (3 segundos)
            autoplayHoverPause: true, // Pausa la reproducción en el hover
            responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
        });
    });
</script>
<style>
    /* Estilos para hacer que las imágenes del carrusel sean responsive */
    .owl-carousel .item img {
        max-width: 100%;
        height: -webkit-fill-available;
        display: block;
    }

    /* Estilos para hacer que el carrusel ocupe el 100% del ancho de la ventana */
    .owl-carousel {
        width: 100%;
    }
</style>

</body>
</html>
