@props([
    'class'=>false,
])
<div class="{{$class ? $class : 'col-lg-3 col-md-3 col-sm-6 col-xs-12 hidden-sm hidden-xs'}}">
    <div class="prs_upcom_movie_box_wrapper">
        <div class="prs_upcom_movie_img_box">
            <img src="/assets/client/images/content/up4.jpg" alt="movie_img" />
            <div class="prs_upcom_movie_img_overlay"></div>
            <div class="prs_upcom_movie_img_btn_wrapper">
                <ul>
                    <li><a href="#">View Trailer</a>
                    </li>
                    <li><a href="#">View Details</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="prs_upcom_movie_content_box">
            <div class="prs_upcom_movie_content_box_inner">
                <h2>
                    <a href="/film/haha">Busting Car</a>
                </h2>
                <p>Drama , Acation</p>	
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <div class="prs_upcom_movie_content_box_inner_icon">
                <ul>
                    <li>
                        <a href="/film/haha/movie-booking">
                            <i class="flaticon-cart-of-ecommerce"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>