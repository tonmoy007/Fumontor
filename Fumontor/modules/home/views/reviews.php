 <div class="details-container" >
    <div class="detail-content">
        <div class="review-block">
            <div class="content-head" >
                <h2>Reviews</h2>
                <div class="content-action-bar">
                    <button class="btn btn-danger cool-shadow review-write" ng-click="writeModelShow=true" ng-show="loggedin&&!item.myreview[0].text"><i class="fa fa-pencil-square-o"></i> Write Review</button>
                    <button class="btn btn-danger cool-shadow  edit-review" ng-click="editModelShow=true" ng-show="loggedin&&item.myreview[0].text" ><i class="fa fa-edit"></i> Edit Review</button>
                </div>
                <div class=" model-inner model-small" id="writeReview" ng-class="{'is-visible':writeModelShow}">
                <a href="" title="" ng-click="writeModelShow=false" class="fu-modal-close alter">Close</a>
                  <div class="modal-container">
                 
                    <div class="fu-modal-body">
                      <div class="write-review bg-white cool-shadow">
                        <div class="write-review-container">
                          <div class="">
                          
                            <form name="writeReviewForm" ng-submit="addReview(writeReviewForm,item.id)">
                              <div class="form-group">
                                <div class="col-xs-2 text-center small-pad">
                                  <img width="25px" ng-init="review.image=user.image" ng-if="user.image" class="img-responsive cool-shadow user-image review-image img-circle" ng-src="{{user.image}}" alt="{{user.first_name}} {{user.last_name}}">
                                   <img ng-if="!user.image" width="25px" class="img-responsive cool-shadow  user-image review-image img-circle" src="assets/img/avatar.png" alt="{{user.first_name}} {{user.last_name}}">
                                </div>
                                <div class="col-xs-10 small-pad">
                                  <div class="form-group">
                                  <textarea name="review" class="form-control" required="true" minlength="5" maxlength="1000" cols="2" placeholder="Write Your Review" ng-model="review.text"></textarea>
                                  <span class="form-group-info"><small>Write your review within 5 to 1000 letters and please try to avoid slang words</small></span>
                                  </div>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group">
                                <label>Give a rating to the item</label>
                                <div star-rating ng-init="review.mark=0" ng-model="review.mark" max="5" on-rating-select="review.marked=true"></div>
                              </div>
                              <div class="form-group text-center">
                                <input type="submit" name="" ng-disabled="writeReviewForm.$invalid" class="btn btn-danger cool-shadow" value="Submit" >
                              </div>
                              <span class="refress mail-spinner text-theme" ng-if="addingReview"><i class="fa fa-refresh fa-spin fa-2x fa-fw"></i></span>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=" model-inner model-small" id="editReview" ng-class="{'is-visible':editModelShow}">
                <a href="" title="" ng-click="editModelShow=false" class="fu-modal-close alter">Close</a>
                  <div class="modal-container">
                 
                    <div class="fu-modal-body">
                      <div class="write-review bg-white cool-shadow">
                        <div class="write-review-container">
                          <div class="">
                          
                            <form name="editReviewForm" ng-submit="editReview(editReviewForm,item.id,item.myreview[0])">
                              <div class="form-group">
                                <div class="col-xs-2 text-center small-pad">
                                  <img width="25px" ng-init="item.myreview[0].image=user.image" ng-if="user.image" class="img-responsive cool-shadow user-image review-image img-circle" ng-src="{{user.image}}" alt="{{user.first_name}} {{user.last_name}}">
                                   <img ng-if="!user.image" width="25px" class="img-responsive cool-shadow  user-image review-image img-circle" src="assets/img/avatar.png" alt="{{user.first_name}} {{user.last_name}}">
                                </div>
                                <div class="col-xs-10 small-pad">
                                  <div class="form-group">
                                  <textarea name="review" class="form-control" required="true" minlength="5" maxlength="1000" cols="2" placeholder="Write Your Review" ng-model="item.myreview[0].text"></textarea>
                                  <span class="form-group-info"><small>Write your review within 5 to 1000 letters and please try to avoid slang words</small></span>
                                  </div>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group">
                                <label>Give a rating to the item</label>
                                <div star-rating ng-init="item.myreview[0].oldmark=item.myreview[0].mark" ng-model="item.myreview[0].mark" max="5" on-rating-select="item.myreview.marked=true"></div>
                              </div>
                              <div class="form-group text-center">
                              <a href="" ng-click="deleteReview(item.id)" class="btn bg-red cool-shadow"> delete</a>
                                <input type="submit" name="" ng-disabled="editReviewForm.$invalid" class="btn btn-danger cool-shadow" value="Submit" >
                              </div>
                              <span class="refress mail-spinner text-theme" ng-if="editingReview"><i class="fa fa-refresh fa-spin fa-2x fa-fw"></i></span>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            
            
            <div class="rating-box text-center" ng-if="item.reviews.length">
                <div class="score-container ">
                    <div class="score">
                        {{item.reviews[0].totalmark/item.reviews[0].total_review|number:1}}
                    </div>
                    <div class="score" ng-if="!item.reviews"></div>
                    <div class="score-container-star-rating">
                        <div class="small-star rating-star">
                            <div class="current-rating" style="width:{{item.reviews[0].totalmark/item.reviews[0].total_review*20}}%"></div>
                        </div>
                    </div>
                    <div class="rating-info">
                        <span><i class="mdi-social-person"></i>&nbsp; {{item.reviews[0].total_review}} total</span>
                    </div>
                </div>
                <!-- <div class="rating-histogram">
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
                </div> -->
            </div>
            <!-- Rating Slider -->
            
           <div class="all-reviews" ng-if="item.reviews">
                  
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 review-col" ng-repeat="review in item.reviews">
                      
                          <div class="single-review">
                          <a href="">
                              <span class="img-responsive author-img" 
                              style="background-image: url(assets/reviews/{{review.user_id}}.jpg)"></span>
                          </a>
                          <div class="review-head">
                              <div class="review-info">
                                  <span class="author-name" >
                                      <a href="">{{review.name}}</a>
                                  </span>
                                  <span class="review-date">{{review.time*1000|date}}</span>
                                  <a class="reviews-permalink" href="" title=" Link to this review "></a>
                                  <!-- Rating box -->
                                  <!-- <div class="review-info-star-rating">
                                      <star-rating ng-model="review.mark" readonly="true"></star-rating>
            
                                  </div>   -->
                                  <div class="review-info-star-rating">
                                      <span class="rating-stars tiny-star" href="javascript:void(0)">
                                          <div class="current-rating" style="width:{{review.mark*20}}%"></div>
                                      </span>
                                  </div>
                              </div>
                          </div>
                          <div class="rate-review-wrapper"></div>
                          <div class="review-body">
                              <!-- <span class="review-title">Aliquam eu nunc</span> -->
                              {{review.text}}
                              <div class="review-link" style="display:none;">
                                   <a class="id-no-nav play-button tiny" href="#" target="_blank">
                                    Full Review </a> 
                              </div>
                          </div>
                      </div>
                     
                  </div>
                 
          </div> 
        </div>

    </div>
</div>





