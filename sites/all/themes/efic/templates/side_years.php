<?php $base_url_with_lang = elsayed_get_base_url_with_lang();
$factory_url_addition = elsayed_get_factory_url_addition();?>
<aside class="left_years">
    <ul>
        <?php foreach ($all_financial_statements_years as $key => $year) {
            $class = '';
            if($year == $current_year){
                $class = 'active_year';
            }?>
            <li>
                <a class="<?php echo $class;?>" href="<?php echo $base_url_with_lang.'/financial_statement/'.$year.$factory_url_addition;?>">
                    <?php echo $year;?>
                </a>
            </li>                    
        <?php }?>
    </ul>
</aside>