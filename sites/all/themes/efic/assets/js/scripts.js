jQuery(document).ready(function() {	
	/*
	    Wow
	*/
	new WOW().init();	
	/*
	    Slider
	*/
	jQuery('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails",
        prevText: "",
        nextText: ""
    });	
	/*
	    Slider 2
	*/
	jQuery('.slider-2-container').backstretch([
	  "assets/img/slider/5.jpg"
	, "assets/img/slider/6.jpg"
	, "assets/img/slider/7.jpg"
	], {duration: 3000, fade: 750});	
	/*
	    Image popup (home latest work)
	*/
	jQuery('.view-work').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: 'The image could not be loaded.',
			titleSrc: function(item) {
				return item.el.parent('.work-bottom').siblings('img').attr('alt');
			}
		},
		callbacks: {
			elementParse: function(item) {
				item.src = item.el.attr('href');
			}
		}
	});	
	/*
	    Flickr feed
	*/
	jQuery('.flickr-feed').jflickrfeed({
        limit: 8,
        qstrings: {
            id: '52617155@N08'
        },
        itemTemplate: '<a href="{{link}}" target="_blank" rel="nofollow"><img src="{{image_s}}" alt="{{title}}" /></a>'
    });	
	/*
	    Google maps
	*/
	/*var position = new google.maps.LatLng(45.067883, 7.687231);
    jQuery('.map').gmap({'center': position,'zoom': 15, 'disableDefaultUI':true, 'callback': function() {
            var self = this;
            self.addMarker({'position': this.get('map').getCenter() });	
        }
    });*/    
    /*
	    Subscription form
	*/
	jQuery('.success-message').hide();
	jQuery('.error-message').hide();	
	jQuery('.footer-box-text-subscribe form').submit(function(e) {
		e.preventDefault();		
		var form = jQuery(this);
	    var postdata = form.serialize();	    
	    jQuery.ajax({
	        type: 'POST',
	        url: 'assets/subscribe.php',
	        data: postdata,
	        dataType: 'json',
	        success: function(json) {
	            if(json.valid == 0) {
	                jQuery('.success-message').hide();
	                jQuery('.error-message').hide();
	                jQuery('.error-message').html(json.message);
	                jQuery('.error-message').fadeIn();
	            }
	            else {
	                jQuery('.error-message').hide();
	                jQuery('.success-message').hide();
	                form.hide();
	                jQuery('.success-message').html(json.message);
	                jQuery('.success-message').fadeIn();
	            }
	        }
	    });
	});    
    /*
	    Contact form
	*/
    /*jQuery('.contact-form form').submit(function(e) {
    	e.preventDefault();
    	var form = jQuery(this);
    	var nameLabel = form.find('label[for="contact-name"]');
    	var emailLabel = form.find('label[for="contact-email"]');
    	var messageLabel = form.find('label[for="contact-message"]');    	
    	nameLabel.html('Name');
    	emailLabel.html('Email');
    	messageLabel.html('Message');        
        var postdata = form.serialize();        
        jQuery.ajax({
            type: 'POST',
            url: 'assets/sendmail.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                if(json.nameMessage != '') {
                	nameLabel.append(' - <span class="violet error-label"> ' + json.nameMessage + '</span>');
                }
                if(json.emailMessage != '') {
                	emailLabel.append(' - <span class="violet error-label"> ' + json.emailMessage + '</span>');
                }
                if(json.messageMessage != '') {
                	messageLabel.append(' - <span class="violet error-label"> ' + json.messageMessage + '</span>');
                }
                if(json.nameMessage == '' && json.emailMessage == '' && json.messageMessage == '') {
                	form.fadeOut('fast', function() {
                		form.parent('.contact-form').append('<p><span class="violet">Thanks for contacting us!</span> We will get back to you very soon.</p>');
                    });
                }
            }
        });
    });*/	
});
jQuery(window).load(function() {	
	/*
	    Portfolio
	*/
	jQuery('.portfolio-masonry').masonry({
		columnWidth: '.portfolio-box', 
		itemSelector: '.portfolio-box',
		transitionDuration: '0.5s'
	});	
	jQuery('.portfolio-filters a').on('click', function(e){
		e.preventDefault();
		if(!jQuery(this).hasClass('active')) {
	    	jQuery('.portfolio-filters a').removeClass('active');
	    	var clicked_filter = jQuery(this).attr('class').replace('filter-', '');
	    	jQuery(this).addClass('active');
	    	if(clicked_filter != 'all') {
	    		jQuery('.portfolio-box:not(.' + clicked_filter + ')').css('display', 'none');
	    		jQuery('.portfolio-box:not(.' + clicked_filter + ')').removeClass('portfolio-box');
	    		jQuery('.' + clicked_filter).addClass('portfolio-box');
	    		jQuery('.' + clicked_filter).css('display', 'block');
	    		jQuery('.portfolio-masonry').masonry();
	    	}
	    	else {
	    		jQuery('.portfolio-masonry > div').addClass('portfolio-box');
	    		jQuery('.portfolio-masonry > div').css('display', 'block');
	    		jQuery('.portfolio-masonry').masonry();
	    	}
		}
	});	
	jQuery(window).on('resize', function(){ jQuery('.portfolio-masonry').masonry(); });	
	// image popup	
	jQuery('.portfolio-box img').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: 'The image could not be loaded.',
			titleSrc: function(item) {
				return item.el.siblings('.portfolio-box-text').find('h3').text();
			}
		},
		callbacks: {
			elementParse: function(item) {				
				if(item.el.hasClass('portfolio-video')) {
					item.type = 'iframe';
					item.src = item.el.data('portfolio-video');
				}
				else {
					item.type = 'image';
					item.src = item.el.attr('src');
				}
			}
		}
	});	
});
