<?php $lang = 'ar';
if(isset($_GET['lang'])){
	$lang = $_GET['lang'];
}
if($lang == 'ar'){
	$url = 'http://www.mubasher.info/markets/EGX/stocks/EFIC';
}else{
	$url = 'http://english.mubasher.info/markets/EGX/stocks/EFIC';
}?>
<?php if($lang == 'ar'){?>
	<link href="main-2b20575106.rtl.min.css" rel="stylesheet">
<?php }else{?>
	<link href="main-530d866cd5.ltr.min.css" rel="stylesheet">
<?php }?>
<link href="dev.css" rel="stylesheet">
<?php $content = file_get_contents($url);
echo "$content";?>
<link href="dev.css" rel="stylesheet">