<?php $languages = elsayed_get_languages();
if(!empty($languages)){?>
    <select id="language_select">
        <?php foreach ($languages as $key => $language) {
            $selected = '';
            if($key == $sitelang){
                $selected = 'selected="selected"';                                                        
            }?>
            <option <?php echo $selected;?> value="<?php echo $key;?>"><?php echo $language;?></option>
        <?php }?>
    </select> 
<?php }?>