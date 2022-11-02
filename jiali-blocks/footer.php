<?php 
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>

    
<footer class="jiali-footer">
    <div class="jiali-section-custom-width-transparent">
        
        <div class="jiali-title-wrapper">
            <h1 class="jiali-title">NINI HEART CLINIC</h1>
        </div>
        <div class="row jiali-footer-col-wrapper">
            <div class="col-md-6 jiali-footer-col">
                <h1><?php _e("Contact Us", "jiali") ?></h1>

                <div class="jiali-feature-items">
                    <div class="jiali-feature-item">
                        <div class="jiali-feature-item-desc">
                            <div class="jiali-square-icon-black">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <p class="jiali-feature-text">

                                سعادت آباد، میدان کاج، سرو غربی، ساختمان سینا، طبقه همکف    

                            </p>
                        </div>
                    </div>
                    <div class="jiali-feature-item">

                        <div class="jiali-feature-item-desc">
                            <div class="jiali-square-icon-black">
                                <i class="fa-solid fa-square-phone"></i>
                            </div>
                            <p class="jiali-feature-text">
                                از طریق شماره 
                                09375318813
                                میتونین از طریق تماس تلفنی و واتساپ با ما در تماس باشید
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 jiali-footer-col">
                <h1><?php _e("About Us", "jiali") ?></h1>
                <p>
                    کلینیک تخصصی NINI HEART زیر نظر دکتر محمد رادگودرزی، فوق تخصص قلب اطفال به ارایه خدماتی نظیر اکوکاردیوگرافی تخصصی قلب جنین و نوزاد
اطفال و نوجوانان می پردازد
                </p>
            </div>
        </div>
    </div>
    <div class="jiali-section-full-width-black">
        <div class="jiali-copyright">
            Copyright <?php echo get_bloginfo("name") ?> - <?php echo date("Y") ?>
        </div>
    </div>
</footer>


