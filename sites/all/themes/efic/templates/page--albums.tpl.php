<?php /**
 * @author Author "Mohamed Elsayed"  
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2015 Programming by "http://www.mohamedelsayed.net"
 */?>
<?php $base_url_with_lang = elsayed_get_base_url_with_lang();
$factory_url_addition = elsayed_get_factory_url_addition();?>
<div class="page-title-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow fadeIn page-title">
                <i class="fa fa-camera"></i>
                <h1><?php echo t('الصور');?></h1>
            </div>
        </div>
    </div>
</div>
<?php $all_albums = elsayed_get_all_albums();
if(!empty($all_albums)){?>
    <div class="portfolio-container">
        <div class="container">
            <div class="row">
                <?php foreach ($all_albums as $key => $album) {
                    $url = elsayed_get_node_url_by_id($album->nid).$factory_url_addition;
                    if(isset($album->field_images[LANGUAGE_NONE][0]['uri'])){
                        $image = image_style_url('medium', $album->field_images[LANGUAGE_NONE][0]['uri']);
                    }?>
                    <div class="col-sm-12 col-md-3 marginbtm">
                        <div class="web-design">
                            <div class="portfolio-box-container">
                                <img src="<?php echo $image;?>" alt="">
                                <div class="portfolio-box-text">
                                    <a href="<?php echo $url;?>">
                                        <h3>
                                            <?php echo $album->title;?>
                                        </h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
<?php }?>