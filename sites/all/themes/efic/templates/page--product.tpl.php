<?php /**
 * @author Author "Mohamed Elsayed"  
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2015 Programming by "http://www.mohamedelsayed.net"
 */?>
<?php $base_url_with_lang = elsayed_get_base_url_with_lang();?>
<?php $arg1 = arg(1);
$product = node_load(arg(1));?>
<div class="page-title-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow fadeIn page-title">
                <i class=""></i>
                <h1 style="width: 100%;"><?php echo $product->title;?></h1>
                <h4>
                    <?php $product_type_title = '';
                    if(isset($product->field_product_type[LANGUAGE_NONE][0]['target_id'])){
                        $product_type = node_load($product->field_product_type[LANGUAGE_NONE][0]['target_id']);
                        if(!empty($product_type)){
                            $product_type_title = elsayed_get_item_title($product_type);
                            //$product_type_title = $product_type ->title;
                        }
                    }
                    echo $product_type_title;?>
                </h4>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-container">
    <div class="container">
        <div class="row">
            <?php $body = elsayed_get_node_field_value('body', $product);?>
            <div class="content_body">
                <?php echo $body;?>
            </div>
            <?php $export = elsayed_get_node_field_value('field_export', $product);?>
            <div class="content_export">
                <?php echo $export;?>
            </div>           
            <div class="content_images">
                <?php if(!empty($product->field_images[LANGUAGE_NONE])){
                    foreach ($product->field_images[LANGUAGE_NONE] as $key => $value) {
                        $image = image_style_url('default_size', $value['uri']);?>                        
                        <img style="max-width: 100%;" src="<?php echo $image;?>" />
                    <?php }
                }?>
            </div>
        </div>
    </div>
</div>     