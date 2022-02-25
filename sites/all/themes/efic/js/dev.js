jQuery(function(){
    jQuery("ul.ti_content").liScroll();
});
jQuery(window).load(function(){
    hideamazingsliderdiv();
});
jQuery(document).ready(function() {
	jQuery("form#contact-form").submit(function(event){
		//disable the default form submission
		event.preventDefault();
	});
	jQuery("#language_select").change(function(){
		var lang = jQuery(this).val();
		var redirect = base_url+'/'+lang;
		window.location.href = redirect;
 	}); 	
 });
function hideamazingsliderdiv () {
    jQuery('a').each(function(){ 
        var hrefcode = 'http://amazingslider.com';
        var hrefdata = this.href;
        if(this.href.indexOf(hrefcode) !== -1){
            jQuery(this).parent('div').hide();            
        }
    });
}
function isValidEmailAddress(emailAddress) {
	var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};
function validate_contact_us_form(){
	var error = ''; 
	if(jQuery("#contact-name").val().length === 0){
		error = error + 'You must enter your Name.<br />';
		jQuery("#contact-name").addClass("required");
    }else{
    	jQuery("#contact-name").removeClass("required");
	}
	if(!isValidEmailAddress(jQuery("#contact-email").val())) {
		error = error + 'You must enter valid Email.<br />';
		jQuery("#contact-email").addClass("required");
	}else{
		jQuery("#contact-email").removeClass("required");
	}
	if(jQuery("#contact-subject").val().length === 0){
		error = error + 'You must enter your Subject.<br />';
		jQuery("#contact-subject").addClass("required");
	}else{
		jQuery("#contact-subject").removeClass("required");
	}
	if(jQuery("#contact-message").val().length === 0){
		error = error + 'You must enter your Message.<br />';
		jQuery("#contact-message").addClass("required");
	}else{
		jQuery("#contact-message").removeClass("required");
	}
	if(error.length !== 0){                         
	}else{  
		jQuery.ajax({
			url: base_url_with_lang+'/contact-us-form',
            type: 'POST',
            data: jQuery('form#contact-form').serialize(),
            async: false,
            beforeSend: function(){
            	jQuery('#sendmail_result').hide();
                jQuery('#sendmail_ajaxLoading').show(); 
            },
            success:function(result){
            	jQuery('#sendmail_ajaxLoading').hide();
                jQuery('#sendmail_result').html(result).show();
                jQuery("form#contact-form")[0].reset();
            }
		});             
	}   
}