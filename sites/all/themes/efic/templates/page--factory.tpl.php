<?php /**
 * @author Author "Mohamed Elsayed"  
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2015 Programming by "http://www.mohamedelsayed.net"
 */?>
<?php $arg1 = arg(1);
$base_url_with_lang = elsayed_get_base_url_with_lang();
$main_factory = elsayed_get_main_factory();
$url = $base_url_with_lang.'/albums';
if($arg1 != $main_factory->nid){
    //$url .= elsayed_get_factory_url_addition($arg1);
}else{
    drupal_goto("$url");
}
if($arg1 != $main_factory->nid){?>
    <?php include_once 'widgets/slider.php';?>
    <?php include_once 'widgets/financial_statements.php';?>
    <?php include_once 'widgets/products.php';?>         
<?php }?>