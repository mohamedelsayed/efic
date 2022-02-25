<?php
$current_year = date('Y');
$arg1 = arg(1);
$factory_url_addition = elsayed_get_factory_url_addition();
$financial_statements = elsayed_get_financial_statements($current_year - 1, $arg1, 1);
if (!empty($financial_statements)) {
    ?>
    <div class="services-container">
        <div class="container">
            <div class="row">
                <h1><?php echo t('علاقات المستثمرين'); ?></h1>
                <?php
                $i = 0;
                foreach ($financial_statements as $key => $financial_statement) {
                    if ($i++ < 4) {
                        $url = elsayed_get_node_url_by_id($financial_statement->nid) . $factory_url_addition;
                        ?>
                        <div class="col-sm-3">
                            <div class="service wow fadeInUp" style="min-height: 250px;">
                                <div class="service-icon">
                                    <img style="width: 50%;" src="<?php echo $GLOBALS['base_url'] . '/' . path_to_theme() . '/img/pdf.png'; ?>" />
                                </div>
                                <h3><?php echo $financial_statement->title; ?></h3>
                                <a class="big-link-1" href="<?php echo $url; ?>">المزيد</a>
                            </div>
                        </div> 
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
}?>