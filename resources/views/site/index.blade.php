@extends('site.layouts.app')

@section('content')
    <!-- Texto a la izquierda -->
    <div class="text-container">
        <h2 class="title-p">¡Qué tal el puente de la amistad!</h2>
        <p class="text-p">Descarga esta Aplicación movil para ver las Cámaras en vivo del Puente de la Amistad desde tu celular.</p>
        <p class="text-p" style="margin-bottom: 50px;">Mira el tráfico en tiempo real, podrás ver el estado del tráfico en el Puente de la Amistad, ubicado en Ciudad del Este - Paraguay.</p>
        <a href="https://play.google.com/store/apps/details?id=app.quetalelpuente.ggcode" class="download-button">Descargar</a>
    </div>

    <div class="phone">
        <div class="speaker"></div>
        <div class="screen">
            <div class="screen-top-bar">
                <div class="signal">
                    <i class="fa fa-signal" aria-hidden="true"></i>
                </div>
                <div class="battery">
                    <i class="fa fa-battery-three-quarters" aria-hidden="true"></i>
                </div>        
            </div>
            <div class="screen-content">
                <!-- Primer video -->
                <video id="live-stream-video-1" controls autoplay width="375" height="210">
                    <source src="https://5b33b873179a2.streamlock.net:1443/camerapontefoz/camerapontefoz.stream/chunklist.m3u8" type="application/x-mpegURL">
                    Tu navegador no soporta la reproducción de videos HLS.
                </video>

                <!-- Segundo video -->
                <video id="live-stream-video-2" controls autoplay width="375" height="210">
                    <source src="https://video02.logicahost.com.br/portaldacidade/fozpontedaamizadesentidobrasil.stream/chunklist_w422405694.m3u8" type="application/x-mpegURL">
                    Tu navegador no soporta la reproducción de videos HLS.
                </video>

                <!-- Tercer video -->
                <video id="live-stream-video-3" controls autoplay width="375" height="210">
                    <source src="https://video02.logicahost.com.br/portaldacidade/fozaduanapontedaamizade.stream/chunklist_w444893351.m3u8" type="application/x-mpegURL">
                    Tu navegador no soporta la reproducción de videos HLS.
                </video>
            </div>
        </div>
        <div class="home"></div>
    </div>  
    
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9253092378386410"
    crossorigin="anonymous"></script>
<!-- Ad Unit horizontal -->
<ins class="adsbygoogle"
    style="display:block"
    data-ad-client="ca-pub-9253092378386410"
    data-ad-slot="4109860036"
    data-ad-format="auto"
    data-full-width-responsive="true"></ins>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>

    <!-- Script para cargar y reproducir las transmisiones en vivo -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Primer video
            var video1 = document.getElementById('live-stream-video-1');
            if (Hls.isSupported()) {
                var hls1 = new Hls();
                hls1.loadSource('https://5b33b873179a2.streamlock.net:1443/camerapontefoz/camerapontefoz.stream/chunklist.m3u8');
                hls1.attachMedia(video1);
                hls1.on(Hls.Events.MANIFEST_PARSED, function() {
                    video1.play();
                });
            } else if (video1.canPlayType('application/vnd.apple.mpegurl')) {
                video1.src = 'https://5b33b873179a2.streamlock.net:1443/camerapontefoz/camerapontefoz.stream/chunklist.m3u8';
                video1.addEventListener('loadedmetadata', function() {
                    video1.play();
                });
            }

            // Segundo video
            var video2 = document.getElementById('live-stream-video-2');
            if (Hls.isSupported()) {
                var hls2 = new Hls();
                hls2.loadSource('https://video02.logicahost.com.br/portaldacidade/fozpontedaamizadesentidobrasil.stream/chunklist_w422405694.m3u8');
                hls2.attachMedia(video2);
                hls2.on(Hls.Events.MANIFEST_PARSED, function() {
                    video2.play();
                });
            } else if (video2.canPlayType('application/vnd.apple.mpegurl')) {
                video2.src = 'https://video02.logicahost.com.br/portaldacidade/fozpontedaamizadesentidobrasil.stream/chunklist_w422405694.m3u8';
                video2.addEventListener('loadedmetadata', function() {
                    video2.play();
                });
            }

            // Tercer video
            var video3 = document.getElementById('live-stream-video-3');
            if (Hls.isSupported()) {
                var hls3 = new Hls();
                hls3.loadSource('https://video02.logicahost.com.br/portaldacidade/fozaduanapontedaamizade.stream/chunklist_w444893351.m3u8');
                hls3.attachMedia(video3);
                hls3.on(Hls.Events.MANIFEST_PARSED, function() {
                    video3.play();
                });
            } else if (video3.canPlayType('application/vnd.apple.mpegurl')) {
                video3.src = 'https://video02.logicahost.com.br/portaldacidade/fozaduanapontedaamizade.stream/chunklist_w444893351.m3u8';
                video3.addEventListener('loadedmetadata', function() {
                    video3.play();
                });
            }
        });
    </script>
@endsection
