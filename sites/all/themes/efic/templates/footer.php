<?php $sitelang = elsayed_get_language_from_url();
$base_url_with_lang = elsayed_get_base_url_with_lang();?>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-7 footer-copyright wow fadeIn" style="float: left;">
                <p>Copyright <?php echo date('Y');?>. Developed by <a target="_blank" href="http://itworldeg.com">ITWorldeg.com</a></p>
            </div>
            <div id="Developer">
                Developed by <a href="http://www.mohamedelsayed.net" target="_blank">Mohamed Elsayed</a>
            </div>
            <?php /*<div class="col-sm-5 footer-social wow fadeIn">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>*/?>
            <?php include 'languages.php';?>
        </div>
    </div>
</footer> 