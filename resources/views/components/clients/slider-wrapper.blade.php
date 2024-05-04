
<div class="prs_theater_main_slider_wrapper">
    <div class="prs_theater_img_overlay"></div>
    <div class="prs_theater_sec_heading_wrapper">
        <h2>TOP MOVIES IN THEATRES</h2>
    </div>
    <div class="wrap-album-slider">
        <ul class="album-slider">
            @for ($i = 0; $i < 8; $i++)
                <x-clients.album-slider></x-clients.album-slider>                    
            @endfor
        </ul>
        <!-- End slider -->
    </div>
</div>