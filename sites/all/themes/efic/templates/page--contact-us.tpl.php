<?php /**
 * @author Author "Mohamed Elsayed"  
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2015 Programming by "http://www.mohamedelsayed.net"
 */?>
<?php $base_url_with_lang = elsayed_get_base_url_with_lang();
$factory_url_addition = elsayed_get_factory_url_addition();
$arg1 = arg(1);
$node = node_load($arg1);
$actual_link = elsayed_get_actual_link();?>
<div class="page-title-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow fadeIn">
                <i class="fa fa-envelope"></i>
                <h1><?php echo $node->title;?></h1>
            </div>
        </div>
    </div>
</div>
<div class="contact-us-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 contact-form wow fadeInLeft"> 
                <p>
                    <?php $body = elsayed_get_node_field_value('body', $node);
                    echo $body;?>
                </p>
                <form id="contact-form" onsubmit="return validate_contact_us_form();" role="form" action="<?php echo $base_url_with_lang.'/contact-us-form';?>" method="post">
                    <div class="form-group">
                        <label for="contact-name"><?php echo t('الاسم');?></label>
                        <input type="text" name="name" placeholder="<?php echo t('ادخل الاسم');?>..." class="contact-name" id="contact-name" >
                    </div>
                    <div class="form-group">
                        <label for="contact-email"><?php echo t('البريد الالكتروني');?></label>
                        <input type="text" name="email" placeholder="<?php echo t('ادخل البريد الالكتروني');?>..." class="contact-email" id="contact-email" >
                    </div>
                    <div class="form-group">
                        <label for="contact-subject"><?php echo t('الموضوع');?></label>
                        <input type="text" name="subject" placeholder="<?php echo t('ادخل الموضوع');?>..." class="contact-subject" id="contact-subject" >
                    </div>
                    <div class="form-group">
                        <label for="contact-message"><?php echo t('الرسالة');?></label>
                        <textarea name="message" placeholder="<?php echo t('ادخل الرسالة');?>..." class="contact-message" id="contact-message" ></textarea>
                    </div>
                    <input type="hidden" name="url" value="<?php echo $actual_link;?>" />
                    <input type="hidden" name="nid" value="<?php echo $arg1;?>" />
                    <button type="submit" class="btn"><?php echo t('ارسل');?></button>
                </form>
                <div class="ajax_result_sendmail">        
                    <div id="sendmail_ajaxLoading"></div>
                    <div id="sendmail_result"></div>
                </div>
            </div>
            <div class="col-sm-5 contact-address wow fadeInUp">
                <h3><?php echo t('نحن هنا');?></h3>
                <div class="map"></div>
                <h3><?php echo t('العنوان');?></h3>
                <p>
                    <?php $address = elsayed_get_node_field_value('field_address', $node);
                    echo $address;?>                
                </p>
            </div>
        </div>
    </div>
</div>
<?php $map_data = array();
if(isset($node->field_map[LANGUAGE_NONE][0])){
    $map_data = $node->field_map[LANGUAGE_NONE][0];
}
$lat = 0;
if(isset($map_data['lat'])){
    $GLOBALS['lat'] = $map_data['lat'];
}
$lon = 0;
if(isset($map_data['lon'])){
    $GLOBALS['lon'] = $map_data['lon'];
}
$zoom = 0;
if(isset($map_data['zoom'])){
    $GLOBALS['zoom'] = $map_data['zoom'];
}?>