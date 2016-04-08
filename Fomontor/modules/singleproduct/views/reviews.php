 <div class="details-container">
    <div class="detail-content">
        <div class="review-block">
            <div class="content-head">
                <h2>reviews</h2>
                <div class="content-action-bar">
                    <button class="btn btn-danger btn-embosshed review-write"><i class="fa fa-pencil-square-o"></i> Write Review</button>
                    <button class="btn btn-danger btn-embosshed edit-review" style="display: none"><i class="mdi-image-edit"></i> Edit Review</button>
                </div>
            </div>
            <!-- Rating box -->
            <div class="rating-box">
                <div class="score-container">
                    <div class="score">
                        4.2
                    </div>
                    <div class="score-container-star-rating">
                        <div class="small-star rating-star">
                            <div class="current-rating" style="width:89%"></div>
                        </div>
                    </div>
                    <div class="rating-info">
                        <span><i class="mdi-social-person"></i>&nbsp; 2010212 total</span>
                    </div>
                </div>
                <div class="rating-histogram">
                    <div class="rating-bar-container five"> 
                        <span class="bar-label"> <span class="star-tiny star-full"></span>5 </span> 
                        <span class="bar" style="width: 100%;"></span> 
                        <span class="bar-number" aria-label=" 3,990,124 ratings ">3,990,124</span> 
                    </div>
                    <div class="rating-bar-container four"> 
                        <span class="bar-label"> <span class="star-tiny star-full"></span>4 </span> 
                        <span class="bar" style="width: 30%;"></span> 
                        <span class="bar-number" aria-label=" 3,990,124 ratings ">3,990,124</span> 
                    </div>
                    <div class="rating-bar-container three"> 
                        <span class="bar-label"> <span class="star-tiny star-full"></span>3 </span> 
                        <span class="bar" style="width: 50%;"></span> 
                        <span class="bar-number" aria-label=" 3,990,124 ratings ">3,990,124</span> 
                    </div>
                    <div class="rating-bar-container two"> 
                        <span class="bar-label"> <span class="star-tiny star-full"></span>2 </span> 
                        <span class="bar" style="width: 70%;"></span> 
                        <span class="bar-number" aria-label=" 3,990,124 ratings ">3,990,124</span> 
                    </div>
                    <div class="rating-bar-container one"> 
                        <span class="bar-label"> <span class="star-tiny star-full"></span>1</span> 
                        <span class="bar" style="width: 90%;"></span> 
                        <span class="bar-number" aria-label=" 3,990,124 ratings ">3,990,124</span> 
                    </div>
                </div>
            </div>
            <!-- Rating Slider -->
            
           <div class="all-reviews ">
                  <?php for ($j=0; $j <2 ; $j++) { ?>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 review-col">
                      <?php for ($i=0; $i <3 ; $i++) { ?>
                          <div class="single-review">
                          <a href="">
                              <span class="img-responsive author-img" 
                              style="background-image: url(assets/img/accessories/profileImg2.jpg)"></span>
                          </a>
                          <div class="review-head">
                              <div class="review-info">
                                  <span class="author-name" >
                                      <a href=""><?php echo $Name;?></a>
                                  </span>
                                  <span class="review-date">December 9, 2015</span>
                                  <a class="reviews-permalink" href="" title=" Link to this review "></a>
                                  <div class="review-info-star-rating">
                                      <span class="rating-stars tiny-star" href="javascript:void(0)">
                                          <div class="current-rating" style="width:75%"></div>
                                      </span>
                                  </div>  
                              </div>
                          </div>
                          <div class="rate-review-wrapper"></div>
                          <div class="review-body">
                              <span class="review-title">Aliquam eu nunc</span>
                              Nullam cursus lacinia erat. Pellentesque egestas, 
                              neque sit amet convallis pulvinar, justo nulla eleifend
                               augue, ac auctor orci leo non est. Duis arcu tortor, 
                               suscipit eget, imperdiet nec, imperdiet iaculis, 
                               ipsum.Phasellus dolor. In ac felis quis tortor malesuada
                                pretium. Sed a libero.Aenean viverra rhoncus pede. 
                                Vestibulum eu odio. Quisque rutrum.Phasellus nec sem in 
                                justo pellentesque facilisis. Suspendisse pulvinar, 
                                augue ac venenatis condimentum, sem libero volutpat nibh,
                                 nec pellentesque velit pede quis nunc. Fusce vel dui.
                              <div class="review-link" style="display:none;">
                                   <a class="id-no-nav play-button tiny" href="#" target="_blank">
                                    Full Review </a> 
                              </div>
                          </div>
                      </div>
                     <?php }?>
                  </div>
                 <?php }?>
          </div> 
        </div>

    </div>
</div>




