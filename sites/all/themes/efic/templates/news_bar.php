<?php $articles = elsayed_get_news_bar($arg1);
$factory_url_addition = elsayed_get_factory_url_addition();
if(!empty($articles)){
    $i = 0;?> 
    <div class="TickerNews theme3" id="T3" style='height: 45px;overflow: hidden;'>
        <div class="ti_wrapper">
            <div class="ti_slide">
                <ul class="ti_content">
                    <?php foreach ($articles as $key => $article) {
                        $title = $article->title;
                        $url = elsayed_get_node_url_by_id($article->nid).$factory_url_addition;
                        $i++;?>
                        <li class="ti_news">
                            <a href="<?php echo $url;?>">
                                <?php echo $title;?>
                            </a>                            
                        </li>
                        <?php if($i < count($articles)){?>
                            <li class="yellow_star_img">
                                <img src="<?php echo $GLOBALS['base_url'].'/'.path_to_theme().'/img/yellow_star.png';?>" />
                                <img src="<?php echo $GLOBALS['base_url'].'/'.path_to_theme().'/img/yellow_star.png';?>" />
                                <img src="<?php echo $GLOBALS['base_url'].'/'.path_to_theme().'/img/yellow_star.png';?>" />
                            </li>
                        <?php }?>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
<?php }?>