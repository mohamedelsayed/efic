<?php /**
 * @author Author "Mohamed Elsayed"  
 * @author Author Email "me@mohamedelsayed.net"
 * @link http://www.mohamedelsayed.net
 * @copyright Copyright (c) 2015 Programming by "http://www.mohamedelsayed.net"
 */?>
<?php $base_url_with_lang = elsayed_get_base_url_with_lang();?>
<div class="work-container">
    <div class="container about-us-container page_container">
        <?php $all_financial_statements_years = elsayed_get_financial_statements_years();
        $financial_statement_data = node_load(arg(1));         
        $current_year = date('Y', strtotime($financial_statement_data->field_year[LANGUAGE_NONE][0]['value']));
        if(!empty($all_financial_statements_years)){?>
            <?php include_once 'side_years.php';?>            
            <section class="right_financial_statements_years">
                <h3><?php echo $financial_statement_data->title;?></h3>
                <h4>
                    <?php $field_quarter = elsayed_get_financial_statement_field_quarter($financial_statement_data);
                    echo $field_quarter;?>
                </h4>
                <?php foreach ($financial_statement_data->field_pdf[LANGUAGE_NONE] as $key => $value) {                    
                    $file = '';
                    if (isset($value['uri'])) {
                        $file = file_create_url( $value['uri']);
                    }?>
                    <h4><a target="_blank" href="<?php echo $file;?>"><?php echo t('Download PDF');?></a></h4>
                    <div>
                        <iframe src="<?php echo $file;?>" style="width:100%; height:700px;" frameborder="0"></iframe>
                        <?php /*<object data="<?php echo $file;?>" type="application/pdf" width="100%" height="500px;">
                            <p><a href="<?php echo $file;?>">can't view the PDF!</a></p>
                        </object>*/?>                    
                    </div>   
                <?php }?>            
            </section>         
        <?php }?>        
    </div>
</div>  