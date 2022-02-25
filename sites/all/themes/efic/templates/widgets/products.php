<?php
$arg1 = arg(1);
$products = elsayed_get_products(0, 0, '', 3, 1);
//$product_types = elsayed_get_product_types();
$factory_url_addition = elsayed_get_factory_url_addition();
if (!empty($products)) {
    ?>
    <div class="work-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 work-title wow fadeIn">
                    <h2><?php echo t('منتجات الشركة'); ?></h2>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($products as $key => $product) {
//                    $url = elsayed_get_node_url_by_id($product_type->nid) . $factory_url_addition;
//                    if (isset($product_type->field_image[LANGUAGE_NONE][0]['uri'])) {
//                        $image = image_style_url('medium', $product_type->field_image[LANGUAGE_NONE][0]['uri']);
//                    }
                    $url = elsayed_get_node_url_by_id($product->nid) . $factory_url_addition;
                    if (isset($product->field_images[LANGUAGE_NONE][0]['uri'])) {
                        $image = image_style_url('medium', $product->field_images[LANGUAGE_NONE][0]['uri']);
                    }
                    $title = elsayed_get_item_title($product);
                    ?>
                    <div class="col-sm-4">
                        <div class="work wow fadeInUp" style="min-height: 265px;">
                            <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" data-at2x="<?php echo $image; ?>">
                            <h3><?php echo $title; ?></h3>
                            <?php /* <p><?php echo elsayed_string_format_view($body, 10);?></p> */ ?>
                            <div class="work-bottom">
                                <?php /* <a class="big-link-2 view-work" href="<?php echo $image;?>"><i class="fa fa-search"></i></a> */ ?>
                                <a class="big-link-2" href="<?php echo $url; ?>"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
}?>