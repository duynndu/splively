<x-layouts.master title="films">
    <!-- prs mc slider wrapper Start -->
	<div class="prs_mc_slider_main_wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="prs_heading_section_wrapper">
						<h2>Comming soon</h2>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="prs_mc_slider_wrapper">
						<div class="owl-carousel owl-theme">
							<div class="item">
								<img src="/assets/client/images/content/movie_category/slider_img1.jpg" alt="about_img">
							</div>
							<div class="item">
								<img src="/assets/client/images/content/movie_category/slider_img2.jpg" alt="about_img">
							</div>
							<div class="item">
								<img src="/assets/client/images/content/movie_category/slider_img3.jpg" alt="about_img">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- prs mc slider wrapper End -->
	<!-- prs mc category slidebar Start -->
	<div class="prs_mc_category_sidebar_main_wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hidden-sm hidden-xs">
					<div class="prs_mcc_left_side_wrapper">
						<div class="prs_mcc_left_searchbar_wrapper">
							<input type="text" placeholder="Search Movie">
							<button><i class="flaticon-tool"></i>
							</button>
						</div>
						<div class="prs_mcc_bro_title_wrapper">
							<h2>browse title</h2>
							<ul>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">All <span>23,124</span></a> 
								</li>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Action <span>512</span></a> 
								</li>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Romantic <span>548</span></a> 
								</li>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Love <span>557</span></a> 
								</li>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Musical <span>554</span></a> 
								</li>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Drama <span>567</span></a> 
								</li>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Thriller <span>689</span></a> 
								</li>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Horror <span>478</span></a> 
								</li>
							</ul>
						</div>
						<div class="prs_mcc_event_title_wrapper">
							<h2>Top Events</h2>
							<img src="/assets/client/images/content/movie_category/event_img.jpg" alt="event_img">
							<h3><a href="#">Music Event in india</a></h3>
							<p>Pune <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
							</p>
							<h4>June 07 <span>08:00-12:00 pm</span></h4>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
					<div class="prs_mcc_right_side_wrapper">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="prs_mcc_right_side_heading_wrapper">
									<h2>Our Top Movies</h2>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="tab-content">
									<div id="grid" class="tab-pane fade in active">
										<div class="row">
											@for ($i = 0; $i < 9; $i++)
												<x-clients.film class="col-lg-4 col-md-4 col-sm-6 col-xs-6 prs_upcom_slide_first"></x-clients.film>
											@endfor
											
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="pager_wrapper gc_blog_pagination">
													<ul class="pagination">
														<li><a href="#"><i class="flaticon-left-arrow"></i></a>
														</li>
														<li><a href="#">1</a>
														</li>
														<li><a href="#">2</a>
														</li>
														<li class="prs_third_page"><a href="#">3</a>
														</li>
														<li class="hidden-xs"><a href="#">4</a>
														</li>
														<li><a href="#"><i class="flaticon-right-arrow"></i></a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 visible-sm visible-xs">
					<div class="prs_mcc_left_side_wrapper">
						<div class="prs_mcc_left_searchbar_wrapper">
							<input type="text" placeholder="Search Movie">
							<button><i class="flaticon-tool"></i>
							</button>
						</div>
						<div class="prs_mcc_bro_title_wrapper">
							<h2>browse title</h2>
							<ul>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">All <span>23,124</span></a> 
								</li>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Action <span>512</span></a> 
								</li>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Romantic <span>548</span></a> 
								</li>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Love <span>557</span></a> 
								</li>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Musical <span>554</span></a> 
								</li>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Drama <span>567</span></a> 
								</li>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Thriller <span>689</span></a> 
								</li>
								<li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Horror <span>478</span></a> 
								</li>
							</ul>
						</div>
						<div class="prs_mcc_event_title_wrapper">
							<h2>Top Events</h2>
							<img src="/assets/client/images/content/movie_category/event_img.jpg" alt="event_img">
							<h3><a href="#">Music Event in india</a></h3>
							<p>Mumbai & Pune <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
							</p>
							<h4>June 07 <span>08:00-12:00 pm</span></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- prs mc category slidebar End -->
</x-layouts.master>
