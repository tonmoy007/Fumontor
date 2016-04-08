<link rel="stylesheet" type="text/css" href="assets/css/singleproduct.css">

<?php
$this->load->library('ion_auth');
$user = $this->ion_auth->user()->row();

if(!empty($product)){
    foreach ($product as $row) {
    $prod=$row;
    }
    $folder=$user->id.'/'.$prod['id'];
    $folderf=$user->id.'/'.$prod['id'];
    if(empty($prod['feature_img'])){
        $folderf='default';
        $prod['feature_img']='thumb.jpg';
    }
}else{
    $prod=array(
        'id'=>'default',
        'feature_img'=>'thumb.jpg',
        'title'=>'<i>not found</i>',
        'description'=>'not found',
        'price'=>'not found',
        'cooksID'=>''
        );
    $folder='default';
    $folderf='default';
}
?>

<link href="assets/css/profile.css" rel="stylesheet">

    <div class="content-wrapper">
        <div class="content__header cool-border text-theme">
            <h2 class="content__header__text"><strong>Fumontor</strong></h2>
            <h4 class="content__header__text__sub text-muted">Your food bussiness manager</h4>
        </div>
        <div class="content__body">
            <div class="view__container text-theme cool-border">
                <h3 class="view__header"></h3>
                
                <div class="row view__body">
        <div id="productDetailContainer" class="component-container col-sm-12">
            <div class="single-product cool-border ">

            <?php 
                
                if($this->ion_auth->logged_in()){?>

            <!-- Product Head Info -->
                <div class="product-head">
                    <div class="product-img">
                    <?php if(strcmp($prod['feature_img'],'thumb.jpg')!=0){?>
                        <img src="assets/uploads/<?php echo $folder; ?>/<?php echo $prod['feature_img'] ?>" alt="Feature Image" area-label="">
                        
                        
                    <?php }else{?>
                        <img src="assets/uploads/<?php echo $folderf; ?>/<?php echo $prod['feature_img'] ?>" alt="Feature Image" area-label="">
                        
                    <?php }
                    if(strcmp($user->id, $prod['cooksID'])==0){
                        echo '<a class="upload-feature-img" href="index.php/cooks/imgUploader?productId='.  $prod['id'].' "><i class="fa fa-upload"></i> change feature Image</a> ';
                    }
                    ?>
                    </div>
                    <div class="product-info ">
                        <div class="badges">
                            <i class="badges-icon"></i>
                            
                        </div>
                        <h2 class="product-title"><?php echo $prod['title'];?></h2>
                        <div class="hidden cID"><?php echo $prod['cooksID'];?></div>

                        <div class="clearfix"></div>
                        <div class="product-subtitle infirm">
                            <div class="right-info">
                                <a class="rating-stars tiny-star" href="javascript:void(0)">
                                    <div class="current-rating" style="width:75%"></div>
                                </a>
                                <div class="product-subtitle rating-info">
                                    <span>12,121,131 
                                    <i class="fa fa-user"></i> </span>
                                </div>
                            </div>
                            <div class="left-info">
                                <div class="product-subtitle cookName"><a class="product-subtitle" href="javascript:void(0)">Cook Name</a></div>
                                <a href="javascript:void(0)" class="product-subtitle catagory">Catagory</a>
                                <a href="" class="product-subtitle catagory">Catagory</a>
                            </div>
                        </div>

                        <div style="clear:both"></div>
                         <div class="product-info-foot">
                            <span class="rate">Price <em>: ৳ <label class="price"><?php echo $prod['price']?></label></em></span>
                            <div class="cd-customization">
                                        <div class="quantity">
                                            <button href="#0" class="btn-minus btn btn-danger btn-embossed"><i class="fa fa-minus"></i></button>
                                            <span class="quantity-amount">1</span>
                                            <button href="#0" class="btn-plus btn btn-danger btn-embossed"><i class="fa fa-plus"></i></button>
                                            
                                        </div>
                         
                                        <button  class="add-to-cart single  btn-danger  btn-embossed">
                                            <em><i class="fa fa-shopping-cart"></i></em>
                                            <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
                                            </svg>
                                        </button>
                            </div>    
                         </div>
                         <div   class="pIDin hidden"><?php echo $prod['id'];?></div>
                         <div style="clear:both"></div>
                    </div>

                </div>
                            <!-- Product image Slider -->

                <div class="slider-container">
                <?php if(!empty($sliderImg)){?>
                    <div class="product-img-slider">
                    
                        <ul class="slider">
                        <?php

                            foreach ($sliderImg as $key => $value) {?>
                                    
                                
                            <?php if(strcmp('thumb', $key)==0){
                               
                            }
                            
                            else{?>
                            <li class="sl-image"><img src="assets/uploads/<?php echo $folder; ?>/<?php echo $value?>"></li>
                            <?php } 
                             }?>

                            
                        </ul>
                        <div class="slider-nav">
                            <span id="prodla" class="left-arrow"></span>
                            <span id="prodra" class="right-arrow"></span>
                        </div>
                    </div>
                    <?php }else{
                         
                        if(strcmp($user->id, $prod['cooksID'])==0){
                            echo '<a href="index.php/upload/sliderImg?productId='.$prod['id'].'" class="btn btn-danger btn-embossed">Add Images to the slider</a>'; 
                             }
                             }?>
                       
                </div>

                <!-- Description Block -->

                <div class="description-container">
                    <div class="description">
                        <div class="description-block">
                            <div class="product-description" >

                            <div class="plain">
                                <?php echo $prod['description']?> 
                            </div>
                              
                            </div>
                            <span class="description-end"></span>
                        </div>
                        <div class="see-more-description"><a id="seeMore" class="btn btn-info">See more</a></div>
                    </div>
                </div>
                

                <!-- Review Block -->

                            <?php
                              $data['Name']='Bhajiraw Mastani';
                              $this->view('reviews',$data);
                            ?>
                <!-- Whats New -->

                <div class="details-container">
                    <div class="whats-new-block">
                        <h2 class="heading">Whats new</h2>
                        <div class="recent-change">
                            Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. 
                            In hac habitasse platea dictumst. Pellentesque libero tortor, tincidunt
                             et, tincidunt eget, semper nec, quam.Nunc nec neque.
                              Nullam cursus lacinia erat. Vestibulum volutpat pretium libero.Fusce
                               fermentum odio nec arcu. Etiam imperdiet imperdiet orci.
                                Morbi mollis tellus ac sapien.
                        </div>
                    </div>
                </div>
                <div class="details-container ">
                    <div class="product-meta-data">
                        <h2 class="heading">Additional Data</h2>
                        <div class="meta-info"> 
                            <div class="title">Updated</div> 
                            <div class="content" itemprop="datePublished">November 30, 2015</div> 
                        </div>
                        <div class="meta-info meta-info-wide"> 
                            <div class="title"> Developer </div> 
                            <div class="content contains-text-link"> 
                                <a class="dev-link" href="£" rel="nofollow" target="_blank"> Visit website </a> 
                                <a class="dev-link" href="mailto:lite-android-support@fb.com" rel="nofollow" target="_blank"> Email lite-android-support@fb.com </a> 
                                <a class="dev-link" href="" rel="nofollow" target="_blank"> Privacy Policy </a>  
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="share-buttons-block">
                    <a href="" class="share-button" title="event"><i class="fa fa-vine"></i></a>
                    <a href="" class="share-button" title="print"><i class="fa fa-print"></i></a>
                    <a href="" class="share-button" title="language"><i class="fa fa-language"></i></a>
                    <a href="" class="share-button" title="polymer"><i class="fa fa-tags"></i></a>
                    <a href="" class="share-button" title="places"><i class="fa fa-search-plus"></i></a>
                    <a href="" class="share-button" title="search"><i class="fa fa-facebook"></i></a>
                    <a href="" class="share-button" title="lock"><i class="fa fa-twitter"></i></a>

                </div>

            <?php }else{?>
            <div class="text-center alert alert-info">
                <strong > You must login to see this element !!</strong>
            </div>
            <?php }?>
            </div>
        </div>

        <!-- <?php $this->view('temp/sidebar');?> -->

     </div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->

<script type="text/javascript">
    $(document).ready(function(){

        var slider=document.getElementsByClassName('slider');
        if(slider.length>0){
            var swidth=$(slider[0]).innerWidth();
        var marginInitial=parseInt($(slider[0]).css('margin-left').replace("px", ""));
        var totalImage=$(slider[0]).children().length;
        var initial=0;
        
       
        tmargin=0;
        
        if (marginInitial==0) {
            $('#prodla').hide();
        };
        var slImage=document.getElementsByClassName('sl-image');
        $('#prodra').on('click',function(){
            
            if(initial>totalImage-2){
                initial=0;
                tmargin=0;
                $('#prodla').hide();
                $(slider[0]).css('margin-left','0px');
            }
            else{
                var marginForward=$(slImage[initial]).width();
                tmargin=tmargin-marginForward-10;
                $(slider[0]).css('margin-left',tmargin+'px');
                initial++; 
                $('#prodla').show();
            }
            
        });
        $('#prodla').on('click',function(){
            if(initial==0){
                initial=0;
                tmargin=0;

                $(slider[0]).css('margin-left','0px');
            }else{
                var marginBackward=$(slImage[initial-1]).width();
                tmargin=tmargin+marginBackward+10;
                $(slider[0]).css('margin-left',tmargin+'px');
                initial--;
            }
            if (initial==0) {
                $('#prodla').hide();
            };

        });

        }
    });
</script>
<script type="text/javascript">

    $('#seeMore').on('click',function(){
        $('.description-block').css('max-height','none');
        $(this).hide();
    });
    var descriptionHeight=$('.product-description').height();
    if(descriptionHeight<=110){
            $('.see-more-description').hide();
        }
</script>
<script type="text/javascript" src="assets/js/addtoCart.js"></script>