<?php /**
 * @author Author "Mohamed Elsayed"
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2015 Programming by "http://www.mohamedelsayed.net"
 */ ?>
<?php $base_url_with_lang = elsayed_get_base_url_with_lang(); ?>
<?php
$arg1 = arg(1);
$item_data = node_load(arg(1));
$factory_url_addition = elsayed_get_factory_url_addition();
?>
<div class="page-title-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow fadeIn page-title">
                <i class=""></i>
                <h1><?php echo elsayed_get_item_title($item_data); ?></h1>
            </div>
        </div>
    </div>
</div>
<?php
$products = elsayed_get_products($arg1, 0);
if (!empty($products)) {
    ?>
    <div class="portfolio-container">
        <div class="container">
            <div class="row">
                <?php
                $i = 1;
                foreach ($products as $key => $product) {
                    $url = elsayed_get_node_url_by_id($product->nid) . $factory_url_addition;
                    if (isset($product->field_images[LANGUAGE_NONE][0]['uri'])) {
                        $image = image_style_url('medium', $product->field_images[LANGUAGE_NONE][0]['uri']);
                    }
                    $separator_div = '';
                    if ($i++ % 4 == 0) {
                        $separator_div = '<div class="col-md-12 "></div>';
                    }
                    ?>
                    <div class="col-sm-12 col-md-3 marginbtm">
                        <div class="web-design">
                            <div class="portfolio-box-container">
                                <img src="<?php echo $image; ?>" alt="">
                                <div class="portfolio-box-text">
                                    <a href="<?php echo $url; ?>">
                                        <h3>
                                            <?php echo $product->title; ?>
                                        </h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $separator_div; ?>

                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>