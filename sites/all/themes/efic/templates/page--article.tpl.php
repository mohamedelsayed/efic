<?php
/**
 * @author Author "Mohamed Elsayed"
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2017 Programming by "http://www.mohamedelsayed.net"
 */
$arg1 = arg(1);
?>
<div class="work-container">
    <div class="container about-us-container page_container">
        <?php $nodedata = node_load($arg1); ?>
        <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
            <?php //print $user_picture; ?>
            <?php //print render($title_prefix); ?>
            <?php //if (!$page):  ?>
            <h2<?php print $title_attributes; ?>>
                <?php /* <a href="<?php print $node_url; ?>" title="<?php print $title; ?>"> */ ?>
                <?php print $title; ?>
                <!--</a>-->
            </h2>
            <?php //endif; ?>
            <?php //print render($title_suffix); ?>
            <?php /* if ($display_submitted): ?>
              <div class="submitted">
              <?php print $submitted; ?>
              </div>
              <?php endif; */ ?>
            <div class="content"<?php print $content_attributes; ?>>
                <?php
                hide($content['comments']);
                hide($content['links']);
                print render($content);
                ?>
            </div>
            <div class="content">
                <?php
                foreach ($nodedata->field_pdf[LANGUAGE_NONE] as $key => $value) {
                    $file = '';
                    if (isset($value['uri'])) {
                        $file = file_create_url($value['uri']);
                    }
                    ?>
                    <h4><a target="_blank" href="<?php echo $file; ?>"><?php echo t('Download PDF'); ?></a></h4>
                    <div>
                        <iframe src="<?php echo $file; ?>" style="width:100%; height:700px;" frameborder="0"></iframe>
                            <?php /* <object data="<?php echo $file;?>" type="application/pdf" width="100%" height="500px;">
                              <p><a href="<?php echo $file;?>">can't view the PDF!</a></p>
                              </object> */ ?>
                    </div>
                <?php } ?>
            </div>
            <?php //print render($content['links']);   ?>
            <?php //print render($content['comments']);   ?>
        </div>
    </div>
</div>