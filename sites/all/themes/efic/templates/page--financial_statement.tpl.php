<?php /**
 * @author Author "Mohamed Elsayed"
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2017 Programming by "http://www.mohamedelsayed.net"
 */ ?>
<?php
$base_url_with_lang = elsayed_get_base_url_with_lang();
$factory_url_addition = elsayed_get_factory_url_addition();
?>
<div class="work-container">
    <div class="container about-us-container page_container">
        <?php
        $current_year = arg(1);
        if ($current_year == '') {
            $current_year = date("Y");
        }
        $all_financial_statements_years = elsayed_get_financial_statements_years();
        if (!empty($all_financial_statements_years)) {
            ?>
            <?php include_once 'side_years.php'; ?>
            <section class="right_financial_statements_years">
                <?php
                $financial_statements = elsayed_get_financial_statements($current_year);
                if (!empty($financial_statements)) {
                    ?>
                    <div class="services-container">
                        <div class="row">
                            <?php
                            foreach ($financial_statements as $key => $financial_statement) {
                                $url = elsayed_get_node_url_by_id($financial_statement->nid) . $factory_url_addition;
                                ?>
                                <div class="col-sm-3" >
                                    <div class="service wow fadeInUp" style="margin-top: 0px;">
                                        <div class="service-icon">
                                            <img style="width: 50%;" src="<?php echo $GLOBALS['base_url'] . '/' . path_to_theme() . '/img/pdf.png'; ?>" />
                                        </div>
                                        <h3><?php echo $financial_statement->title; ?></h3>
                                        <h4>
                                            <?php
                                            $field_quarter = elsayed_get_financial_statement_field_quarter($financial_statement);
                                            echo $field_quarter;
                                            ?>
                                        </h4>
                                        <a class="big-link-1" href="<?php echo $url; ?>"><?php echo t('المزيد'); ?></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <?php
                $financial_types = elsayed_get_financial_types();
                if (!empty($financial_types)) {
                    ?>
                    <div class="services-container">
                        <?php
                        foreach ($financial_types as $key => $financial_type) {
                            $data = elsayed_get_financial_additions($current_year, $key);
                            if (!empty($data)) {
                                ?>
                                <div class="row">
                                    <h3><?php echo $financial_type; ?></h3>
                                    <?php
                                    $i = 1;
                                    foreach ($data as $key => $record) {
                                        foreach ($record->field_pdf[LANGUAGE_NONE] as $key => $value) {
                                            $file = '';
                                            if (isset($value['uri'])) {
                                                $file = file_create_url($value['uri']);
                                            }
                                            $pdf_title = $record->title;
                                            if ($value['filename']) {
                                                $filename_exploded = explode('.', $value['filename']);
                                                if (isset($filename_exploded[0])) {
                                                    $pdf_title = $filename_exploded[0];
                                                }
                                            }
                                            if ($value['description']) {
                                                $pdf_title = $value['description'];
                                            }
                                            $separator_div = '';
                                            if ($i++ % 4 == 0) {
                                                $separator_div = '<div class="col-md-12 "></div>';
                                            }
                                            ?>
                                            <div class="col-sm-3" >
                                                <div class="service wow fadeInUp" style="margin-top: 0px;">
                                                    <div class="service-icon">
                                                        <a target="_blank" href="<?php echo $file; ?>">
                                                            <img style="width: 50%;" src="<?php echo $GLOBALS['base_url'] . '/' . path_to_theme() . '/img/pdf.png'; ?>" />
                                                        </a>
                                                    </div>
                                                    <h3>
                                                        <a target="_blank" href="<?php echo $file; ?>"><?php echo $pdf_title; ?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <?php echo $separator_div; ?>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </section>
        <?php } else { ?>
            <div class="no_data_found">No data found.</div>
        <?php } ?>
    </div>
</div>