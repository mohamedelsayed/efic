<?php
/**
 * @author Author "Mohamed Elsayed"
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2015 Programming by "http://www.mohamedelsayed.net"
 */
$social_image = '';
$GLOBALS['meta_description'] = '';
$GLOBALS['meta_keywords'] = '';
$sitelang = elsayed_get_language_from_url();
$base_url_with_lang = elsayed_get_base_url_with_lang();
global $base_url;
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <!-- Basic Page Needs ================================================== -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $head_title; ?></title>
        <meta property="og:image" content="<?php echo $social_image; ?>">
        <meta name="twitter:image" content="<?php echo $social_image; ?>">
        <meta name="description" content="<?php echo $GLOBALS['meta_description']; ?>">
        <meta name="keywords" content="<?php echo $GLOBALS['meta_keywords']; ?>">
        <meta name="author" content="">
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <?php print $styles; ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Favicon and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <link href="<?php echo $base_url . '/' . path_to_theme(); ?>/favicon.png" type="image/x-icon" rel="icon">
        <?php if ($sitelang == 'ar') { ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['base_url'] . '/' . path_to_theme() . '/css/ar.css'; ?>">
        <?php } ?>
        <?php if ($sitelang == 'en') { ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['base_url'] . '/' . path_to_theme() . '/css/en.css'; ?>">
        <?php } ?>
    </head>
    <body class="<?php print $classes; ?>" <?php print $attributes; ?>>
        <nav class="navbar" role="navigation">
            <div class="container">
                <?php include_once 'header.php'; ?>
            </div>
        </nav>
        <?php include_once 'news_bar.php'; ?>
        <?php print $page_top; ?>
        <?php print $page; ?>
        <?php print $page_bottom; ?>
        <?php include_once 'footer.php'; ?>
        <script type="text/javascript">
            var base_url_with_lang = '<?php echo $base_url_with_lang; ?>';
            var base_url = '<?php echo $GLOBALS['base_url']; ?>';
        </script>
        <?php print $scripts; ?>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="<?php echo $GLOBALS['base_url'] . '/' . path_to_theme(); ?>/sliderengine/amazingslider.js"></script>
        <script src="<?php echo $GLOBALS['base_url'] . '/' . path_to_theme(); ?>/sliderengine/initslider-1.js"></script>
        <?php if (isset($GLOBALS['lat']) && isset($GLOBALS['lon']) && isset($GLOBALS['zoom'])) { ?>
            <script type="text/javascript">
            jQuery(document).ready(function () {
                var position = new google.maps.LatLng(<?php echo $GLOBALS['lat']; ?>, <?php echo $GLOBALS['lon']; ?>);
                jQuery('.map').gmap({
                    'center': position, 'zoom': <?php echo $GLOBALS['zoom']; ?>, 'disableDefaultUI': true, 'callback': function () {
                        var self = this;
                        self.addMarker({'position': this.get('map').getCenter()});
                    }
                });
            });
            </script>
        <?php } ?>
        <?php /* $google_analytics_propertyid = get_domain_google_analytics_fields(); ?>
          <?php if ($google_analytics_propertyid != '') { ?>
          <script type = "text/javascript">
          (function(i, s, o, g, r, a, m) {
          i['GoogleAnalyticsObject'] = r;
          i[r] = i[r] || function() {
          (i[r].q = i[r].q || []).push(arguments)
          }, i[r].l = 1 * new Date();
          a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
          a.async = 1;
          a.src = g;
          m.parentNode.insertBefore(a, m)
          })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
          ga('create', '<?php echo $google_analytics_propertyid; ?>', 'auto');
          ga('send', 'pageview');
          </script>
          <?php } */ ?>
    </body>
</html>