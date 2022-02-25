<?php
$sitelang = elsayed_get_language_from_url();
$GLOBALS['base_url'] = elsayed_get_site_base_url();
$base_url_with_lang = elsayed_get_base_url_with_lang();
$actual_link = elsayed_get_actual_link();
$active_class = 'active';
$home_class = '';
$is_front_page = drupal_is_front_page();
if ($is_front_page) {
    $home_class = $active_class;
}
$who_us = elsayed_get_who_us();
$arg1 = arg(1);
$factory_url_addition = elsayed_get_factory_url_addition();
$current_factory_id = elsayed_get_current_factory();
$contact_us = elsayed_get_contact_us($arg1);
?>
<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo $base_url_with_lang; ?>"></a>
</div>
<div class="collapse navbar-collapse header_menu" id="top-navbar-1">
    <ul class="nav navbar-nav navbar-right">
        <?php if (!empty($contact_us)) { ?>
            <li>
                <a href="<?php echo elsayed_get_node_url_by_id($contact_us->nid); ?>">
                    <br><?php echo $contact_us->title; ?>
                </a>
            </li>
        <?php } ?>
        <li>
            <a href="<?php echo $base_url_with_lang . '/albums' . $factory_url_addition; ?>"><br><?php echo t('أرشيف الصور'); ?></a>
        </li>
        <li class="dropdown">
            <a href="<?php echo $base_url_with_lang; ?>" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
                <br><?php echo t('مشاريع الشركة'); ?><span class="caret"></span>
            </a>
            <?php
            $factories = elsayed_get_factories();
            if (!empty($factories)) {
                reset($factories);
                $first_key = key($factories);
                ?>
                <ul class="dropdown-menu dropdown-menu-left" role="menu">
                    <?php
                    foreach ($factories as $key => $factory) {
                        if ($first_key == $key) {
                            continue;
                        }
                        $title = elsayed_get_item_title($factory);
                        $url = elsayed_get_node_url_by_id($factory->nid);
                        ?>
                        <li>
                            <a href="<?php echo $url; ?>"><?php echo $title; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </li>
        <?php /* if($current_factory_id == 0){?>
          <li>
          <a href="#"></i><br><?php echo t('العملية الإنتاجية');?></a>
          </li>
          <?php } */ ?>
        <li class="dropdown">
            <a href="<?php echo $base_url_with_lang . '/financial_statement'; ?>" >
                <br><?php echo t('علاقات المستثمرين'); ?>
                <!--<span class="caret"></span>-->
            </a>
            <?php
            $financial_statements_years = elsayed_get_financial_statements_years(3);
            $i = 0;
            ?>
            <?php /* <ul class="dropdown-menu dropdown-menu-left" role="menu">
              <?php if (!empty($financial_statements_years)) { ?>
              <?php
              foreach ($financial_statements_years as $key => $financial_statements_year) {
              $i++;
              ?>
              <li>
              <a href="<?php echo $base_url_with_lang . '/financial_statement/' . $financial_statements_year . $factory_url_addition; ?>"><?php echo $financial_statements_year; ?></a>
              </li>
              <?php } ?>
              <?php } ?>
              <?php
              if ($i < 3) {
              if (isset($financial_statements_year)) {
              $x = $financial_statements_year;
              } else {
              $current_year = date('Y');
              $x = $current_year - 1;
              }
              $end = $x - 3;
              for ($j = $x; $j > $end; $j--) {
              ?>
              <li>
              <a href="<?php echo $base_url_with_lang . '/financial_statement/' . $j . $factory_url_addition; ?>"><?php echo $j; ?></a>
              </li>
              <?php } ?>
              <?php } ?>
              </ul> */ ?>
        </li>
        <li class="dropdown">
            <a href="<?php echo $base_url_with_lang . '/products' . $factory_url_addition; ?>" >
                <br><?php echo t('منتجات الشركة'); ?>
<!--                <span class="caret"></span>-->
            </a>
            <?php /* $product_types = elsayed_get_product_types();
              if(!empty($product_types)){?>
              <ul class="dropdown-menu dropdown-menu-left" role="menu">
              <?php foreach ($product_types as $key => $product_type){
              $title = elsayed_get_item_title($product_type);?>
              <li>
              <a href="<?php echo elsayed_get_node_url_by_id($product_type->nid).$factory_url_addition;?>">
              <?php echo $title;?>
              </a>
              </li>
              <?php }?>
              </ul>
              <?php } */ ?>
        </li>
        <?php if ($current_factory_id == 0) { ?>
            <?php if (!empty($who_us)) { ?>
                <li>
                    <a href="<?php echo elsayed_get_node_url_by_id($who_us->nid); ?>">
                        <br><?php echo $who_us->title; ?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
        <li class="<?php echo $home_class; ?>">
            <a href="<?php echo $base_url_with_lang; ?>"><br><?php echo t('الرئيسية'); ?></a>
        </li>
    </ul>
</div>
<?php
$arg0 = arg(0);
if ($arg0 != 'admin') {
    ?>
    <style type="text/css">
        #block-user-login{
            display: none;
        }
    </style>
    <?php
}?>