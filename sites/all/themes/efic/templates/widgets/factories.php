<?php  $factories = elsayed_get_factories();
if(!empty($factories)){?>
    <div class="work-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 work-title wow fadeIn">
                    <h2><?php echo t('المصانع');?></h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($factories as $key => $factory) {
                    $url = elsayed_get_node_url_by_id($factory->nid);
					$image = $GLOBALS['base_url'].'/'.path_to_theme().'/img/blank.png';
                    if(isset($factory->field_image[LANGUAGE_NONE][0]['uri'])){
                        $image = image_style_url('medium', $factory->field_image[LANGUAGE_NONE][0]['uri']);
                    }
                    $title = elsayed_get_item_title($factory);
                    $body = elsayed_get_factory_body($factory);?>
                    <div class="col-sm-4">
                        <div class="work wow fadeInUp" style="min-height: 315px;">
                            <img style="max-height:185px; min-width:100%;" src="<?php echo $image;?>" alt="<?php echo $title;?>" data-at2x="<?php echo $image;?>">
                            <h3><?php echo $title;?></h3>
                            <?php /*<p>
                                <?php echo elsayed_string_format_view($body, 10);?>
                            </p>*/?>
                            <div class="work-bottom">
                                <?php /*<a class="big-link-2 view-work" href="<?php echo $image;?>"><i class="fa fa-search"></i></a>*/?>
                                <a class="big-link-2" href="<?php echo $url;?>"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                <?php }?>                
            </div>
        </div>
    </div>
<?php }?>