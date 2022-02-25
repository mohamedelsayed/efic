<?php /**
 * @author Author "Mohamed Elsayed"  
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2015 Programming by "http://www.mohamedelsayed.net"
 */?>
<?php $base_url_with_lang = elsayed_get_base_url_with_lang();?>
<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['base_url'].'/'.path_to_theme();?>/sliderengine/amazingslider-1.css">
<div class="work-container" style="margin-bottom: 20px;">
    <div class="container about-us-container page_container">
        <?php $node_data = node_load(arg(1));?>
        <section class="">
            <h3><?php echo $node_data->title;?></h3>
            <?php if(!empty($node_data->field_images[LANGUAGE_NONE])){?>
                <div class="slide_galary" style="margin-bottom: 160px;">
                    <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:960px;margin:0px auto 88px;">
                        <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                            <ul class="amazingslider-slides" style="display:none;">
                                <?php foreach ($node_data->field_images[LANGUAGE_NONE] as $key => $value) {
                                    $slider_image = $value['uri'];
                                    $alt = $value['alt'];
                                    $title = $value['title'];
                                    $image = image_style_url('default_size', $slider_image);?>
                                    <li>
                                        <img src="<?php echo $image;?>" alt="<?php echo $alt;?>"  title="<?php echo $title;?>" />
                                    </li>
                                <?php }?>
                            </ul>
                            <ul class="amazingslider-thumbnails" style="display:none;">
                                <?php foreach ($node_data->field_images[LANGUAGE_NONE] as $key => $value) {
                                    $slider_image = $value['uri'];
                                    $image = image_style_url('default_size', $slider_image);
                                    $alt = $value['alt'];
                                    $title = $value['title'];?>
                                    <li>
                                        <img src="<?php echo $image;?>" alt="<?php echo $alt;?>" title="<?php echo $title;?>" />
                                    </li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </div>      
            <?php }?>
        </section>                 
    </div>
</div>        