<?php
session_start();
include_once('includes/header.php');
?>
<style>
    div#myDiv {
    width: 50px;
    position: absolute;
    top: 0;
    right: 50px;
    z-index: 9;
}
div#myDiv .loading-image {
    display: block !important;
}
.request_proposal_form .col-xs-12.text-right {
    position: relative;
}

#g-recaptcha-response {
    display: block !important;
    position: absolute;
    margin: -78px 0 0 0 !important;
    width: 302px !important;
    height: 76px !important;
    z-index: -999999;
    opacity: 0;
}

body .rc-anchor-aria-status {
    display: block !important;
    color: red !important;
}
body .rc-anchor-aria-status {
    display: block !important;
}
</style>
<div class="main-site-wapper fw">
      <section class="contect-banner fw">
        <div class="container extraContainer_pad">
          <div class="contect-heding fw" >
            <h3 >Your idea is Too <br /> Important to be Lost in<br /> the Post Mail.</h3>
            <p>Fill the form below or email us at <a href="mailto:sales@arknewtech.com" >sales@arknewtech.com</a><br /> or give us a call at <a href="tel:+91-965-093-6880">+91-965-093-6880</a></p>
          </div>
        </div>
      </section>
      <section class="contectform-sec fw">
        <div class="container extraContainer_pad">
            <div class="request_proposal_form fw">
              <form class="request_proposal_cont" id="demo" method="post" action="<?php echo BASE_URL; ?>enquirymail.php" onsubmit="check_if_capcha_is_filled" enctype="multipart/form-data">
                <h4>Request a proposal</h4>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                     <label>Full Name*</label>
                     <input type="text" name="full_name" class="from-control" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                     <label>Email*</label>
                     <input type="email" name="email" class="from-control"  required>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input 
                      type="number" 
                      id="phone" 
                      name="phone_number" 
                      class="from-control" 
                      value=""
                      maxlength = "10"
                      >
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label>Skype ID</label>
                      <input type="text" name="skype_id" class="from-control">
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label>Select Your Budget Range</label>
                      <select class="from-control" name="budget">
                        <option value="Less than $10k">Less than $10k</option>
                        <option value="Between $10k to $ 25k">Between $10k to $ 25k</option>
                        <option value="Between $25k to $ 50k">Between $25k to $ 50k</option>
                        <option value="More than $ 50k">More than $ 50k</option>
                      </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label>Attach File</label>
                      <div class="custom-file-upload">
                        <!--<label for="file">File: </label>--> 
                        <input class="from-control " placeholder="Upload"  type="file" id="file" name="fileToUpload"/>
                      </div>
                      </div>
                  </div>
                  
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label>Project Description</label>
                      <div id="remainingC"></div>
                      <textarea id="project_description" class="from-control textarea-fild" name="project_description" placeholder="Project Description max 2000 characters"></textarea>
                      
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <P class="smalltext"><i><img src="<?php echo BASE_URL; ?>/assets/images/service/lock_green.png" alt="lock" /></i>Your valuable idea is 100% safe with us.</P>
                    <div class="checkbox-fild fw">
                      <div class="inputcheck-grid">
                        <input type="checkbox" name="request_agreement" class="inputcheck">
                        <span></span>
                      </div>
                      <label for="">Request your copy of non disclosure agreement.</label>
                    </div>
                  </div>
                  
                   <!-- captcha start-->
                  <div class="col-md-6 col-sm-6 col-xs-12 g-recaptcha <?php echo $_SESSION['error'];?>"  data-sitekey="6LcdkWEdAAAAAG1RIIrOwMbiXmxgLfyVpch7otr-">
                   
                </div>
                  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <button type="submit" name="inquiry" class="btn btn-submit btn-contact">Submit 
                    <i>
                        <img src="<?php echo BASE_URL; ?>/assets/images/service/button_arrow.png" alt="arrow_btn" />
                        </i>
                    </button>
                    <div id="myDiv">
                        <img id="loading-image" src="<?php echo BASE_URL; ?>images/loader.gif" style="display:none;"/>
                    </div>
                  </div>
                  
                </div>
              </form>
            </div>
        </div>
      </section>
      <section class="director_info_sec fw">
        <div class="container extraContainer_pad">
          <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 text-left">
              <figure class="dots_pattern_img aos-init aos-animate"  data-aos="fade-left">
                <img src="<?php echo BASE_URL; ?>/assets/images/service/dots_pattern.png" alt="icon" />
              </figure>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="director_infotext fw aos-init aos-animate"  data-aos="fade-up">
                <h3 class="font36text">Quality is something<br /> we cannot compromise.</h3>
                <p><b>Kashish Gupta</b> <span>Director</span></p>
                <ul>
                  <li>
                    <a href="https://www.skype.com/">
                      <i><img src="<?php echo BASE_URL; ?>/assets/images/service/skype_logo.png" alt="icon"></i>
                      kashish@arknewtech.com
                    </a>
                  </li>
                  <li>
                    <a href="tel:+91-965-093-6880">
                      <i><img src="<?php echo BASE_URL; ?>/assets/images/service/phone_number_1.png" alt="icon"></i>
                      +91-965-093-6880
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 text-right">
              <figure class="dots_pattern_img aos-init aos-animate"  data-aos="fade-right" >
                <img src="<?php echo BASE_URL; ?>/assets/images/service/dots_pattern.png" alt="icon" />
              </figure>
            </div>
          </div>
        </div>
      </section>
      <section class="our_office_sec fw"> 
        <div class="container extraContainer_pad">
          <div class="our_office_cont">
            <!--<h3  class="font36text aos-init aos-animate"  data-aos="fade-down" >Our Office</h3>-->
            <figure class="offce-img aos-init aos-animate"  data-aos="fade-up">
              <img src="<?php echo BASE_URL; ?>/assets/images/service/office_img.png" alt="img">
            </figure>
            <div class="office_address aos-init aos-animate"  data-aos="fade-up" >
              <h4>India - Headquarter</h4>
              <p>D-9, Hosiery Complex, Block D, Phase-2,<br /> Noida, U.P. - 201305, India</p>
            </div>
          </div>
        </div>
      </section>
    
      
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
   <script>
   function check_if_capcha_is_filled (e) {
    if(allowSubmit) return false;
    e.preventDefault();
    alert('Fill in the capcha!');
}
   
       window.onload = function() {
    var $recaptcha = document.querySelector('.g-recaptcha');

    if($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
};
   </script>
   <script>
       $(document).ready(function(){
           $(".btn-contact").click(function(){
               $("#myDiv img").addClass("loading-image");
           });
           
       });
    </script>
    
      <script src="<?php echo BASE_URL; ?>/assets/js/intlTelInput.js"></script>
      <script>
	      var input = document.querySelector("#phone");
	      window.intlTelInput(input, {
	       //utilsScript: "../assets/js/utils.js",
    	    utilsScript:"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
	        separateDialCode: true,
    		hiddenInput: "full",
    		//nationalMode: true,
	      });
	      
	      
	    </script>
	    <script>
		function isNumberKey(evt){
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		}    
		
	</script>
	<script>
                            window.onload=function(){
                                var current = window.location.href;
                                $('.menu-item-home-menu').addClass('activemenu');
                                    $('#primary-menu li a').each(function(){
                                        var $this = $(this);
                                        // if the current path is like this link, make it active
                                        /*if($this.attr('href').indexOf(current) !== -1){
                                            $this.addClass('activemenu');
                                        }*/
                                    })
                            };
                            $(function() {
                                  $('#WAButton').floatingWhatsApp({
                                    phone: '919650936880', //WhatsApp Business phone number International format-
                                    //Get it with Toky at https://toky.co/en/features/whatsapp.
                                    //headerTitle: 'Chat with us on WhatsApp!', //Popup Title
                                    //popupMessage: 'Hello, how can we help you?', //Popup Message
                                    //showPopup: true, //Enables popup display
                                    buttonImage: '<img src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/whatsapp.svg" />', //Button Image
                                    //headerColor: 'crimson', //Custom header color
                                    //backgroundColor: 'crimson', //Custom background button color
                                    position: "right"    
                                  });
                                });
                            </script>
      <section class="map_sec fw aos-init aos-animate"  data-aos="fade-up">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.2148268097435!2d77.41175161543198!3d28.533261895317164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce9772074757d%3A0x6372df84e1d1247c!2sARK%20NEWTECH!5e0!3m2!1sen!2sin!4v1634988876362!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </section>
    </div>
    <script>
        $(document).ready(function() {
            var len = 0;
            var maxchar = 2000;
            $( '#project_description' ).keyup(function(){
                len = this.value.length
                if(len > maxchar){
                    return false;
                }else if (len > 0) {
                    $( "#remainingC" ).html( "Remaining characters: " +( maxchar - len ) );
                }else {
                    $( "#remainingC" ).html( "Remaining characters: " +( maxchar ) );
                }
            })
            
        });
    </script>
    <script>
    //Reference: 
//https://www.onextrapixel.com/2012/12/10/how-to-create-a-custom-file-input-with-jquery-css3-and-php/
;(function($) {

		  // Browser supports HTML5 multiple file?
		  var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
		      isIE = /msie/i.test( navigator.userAgent );

		  $.fn.customFile = function() {

		    return this.each(function() {

		      var $file = $(this).addClass('custom-file-upload-hidden'), // the original file input
		          $wrap = $('<div class="file-upload-wrapper">'),
		          $input = $('<input class="from-control" type="text" class="file-upload-input" placeholder="Upload" />'),
		          // Button that will be used in non-IE browsers
		          $button = $('<button type="button" class="file-upload-button">&#43;</button>'),
		          // Hack for IE
		          $label = $('<label class="file-upload-button" for="'+ $file[0].id +'">Select a File</label>');

		      // Hide by shifting to the left so we
		      // can still trigger events
		      $file.css({
		        position: 'absolute',
		        left: '-9999px'
		      });

		      $wrap.insertAfter( $file )
		        .append( $file, $input, ( isIE ? $label : $button ) );

		      // Prevent focus
		      $file.attr('tabIndex', -1);
		      $button.attr('tabIndex', -1);

		      $button.click(function () {
		        $file.focus().click(); // Open dialog
		      });

		      $file.change(function() {

		        var files = [], fileArr, filename;

		        // If multiple is supported then extract
		        // all filenames from the file array
		        if ( multipleSupport ) {
		          fileArr = $file[0].files;
		          for ( var i = 0, len = fileArr.length; i < len; i++ ) {
		            files.push( fileArr[i].name );
		          }
		          filename = files.join(', ');

		        // If not supported then just take the value
		        // and remove the path to just show the filename
		        } else {
		          filename = $file.val().split('\\').pop();
		        }

		        $input.val( filename ) // Set the value
		          .attr('title', filename) // Show filename in title tootlip
		          .focus(); // Regain focus

		      });

		      $input.on({
		        blur: function() { $file.trigger('blur'); },
		        keydown: function( e ) {
		          if ( e.which === 13 ) { // Enter
		            if ( !isIE ) { $file.trigger('click'); }
		          } else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del
		            // On some browsers the value is read-only
		            // with this trick we remove the old input and add
		            // a clean clone with all the original events attached
		            $file.replaceWith( $file = $file.clone( true ) );
		            $file.trigger('change');
		            $input.val('');
		          } else if ( e.which === 9 ){ // TAB
		            return;
		          } else { // All other keys
		            return false;
		          }
		        }
		      });

		    });

		  };

		  // Old browser fallback
		  if ( !multipleSupport ) {
		    $( document ).on('change', 'input.customfile', function() {

		      var $this = $(this),
		          // Create a unique ID so we
		          // can attach the label to the input
		          uniqId = 'customfile_'+ (new Date()).getTime(),
		          $wrap = $this.parent(),

		          // Filter empty input
		          $inputs = $wrap.siblings().find('.file-upload-input')
		            .filter(function(){ return !this.value }),

		          $file = $('<input class="from-control " placeholder="Upload"  type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');

		      // 1ms timeout so it runs after all other events
		      // that modify the value have triggered
		      setTimeout(function() {
		        // Add a new input
		        if ( $this.val() ) {
		          // Check for empty fields to prevent
		          // creating new inputs when changing files
		          if ( !$inputs.length ) {
		            $wrap.after( $file );
		            $file.customFile();
		          }
		        // Remove and reorganize inputs
		        } else {
		          $inputs.parent().remove();
		          // Move the input so it's always last on the list
		          $wrap.appendTo( $wrap.parent() );
		          $wrap.find('input').focus();
		        }
		      }, 1);

		    });
		  }

}(jQuery));

$('input[type=file]').customFile();
</script>
 
    <?php 
        include_once('includes/footer.php');
        sleep(10);
        unset($_SESSION['error']);
    ?>
    