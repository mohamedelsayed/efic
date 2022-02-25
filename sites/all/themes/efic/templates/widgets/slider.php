<?php $arg1 = arg(1);
$slider_widget = elsayed_get_slider_widget($arg1);
if(!empty($slider_widget)){?>
    <div class="slider-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 slider">
                    <div class="flexslider">
                        <ul class="slides">
                            <?php foreach ($slider_widget as $key => $slider) {
                                $slider_image = $slider->field_image[LANGUAGE_NONE][0]['uri'];
                                $image = image_style_url('slider', $slider_image);?>
                                <li data-thumb="<?php echo $image;?>">
                                    <img src="<?php echo $image;?>">
                                    <div class="flex-caption">
                                        <?php echo $slider->title;?>
                                    </div>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>
<?php /*$sitelang = elsayed_get_language_from_url();
$mubasher_url = $GLOBALS['base_url'].'/mubasher/index.php?lang='.$sitelang;?>
<div class="work-container">
	<div class="container">
        <div class="row">
            <div class="col-sm-12 work-title wow">
				<iframe style="border: 1px #7AAA19 solid;" id="frameid" width="100%" height="400" src="<?php echo $mubasher_url;?>"></iframe>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" language="javascript">
jQuery(document).ready(function($){
	iframeTimer();
});
function iframeTimer(){
	setTimeout(function(){
		$('#frameid').attr('src','<?php echo $mubasher_url;?>');
		iframeTimer();
	}, 30000);
}
</script>*/?>