
<div class="row" id="contact">
	<?php if(isset($hasError) || isset($captchaError) ) { ?>
        <p class="alert">Error submitting the form</p>
    <?php } ?>

	<form id="contact-us" action="contact-submit.php" method="post">
		<div class="formblock">
			<label class="screen-reader-text">Name</label>
			<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="txt requiredField" placeholder="Name:" />
			<?php if($nameError != '') { ?>
				<br /><span class="error"><?php echo $nameError;?></span> 
			<?php } ?>
		</div>
        
		<div class="formblock">
			<label class="screen-reader-text">Email</label>
			<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="txt requiredField email" placeholder="Email:" />
			<?php if($emailError != '') { ?>
				<br /><span class="error"><?php echo $emailError;?></span>
			<?php } ?>
		</div>
        
		<div class="formblock">
			<label class="screen-reader-text">Message</label>
			 <textarea name="comments" id="commentsText" class="txtarea requiredField" placeholder="Message:"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
			<?php if($commentError != '') { ?>
				<br /><span class="error"><?php echo $commentError;?></span> 
			<?php } ?>
		</div>
        
			<button name="submit" type="submit" class="subbutton">Send us Mail!</button>
			<input type="hidden" name="submitted" id="submitted" value="true" />
	</form>			
</div>
			



		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="_/js/responsive-nav.min.js"></script>
		<script src="_/js/responsive-accordion.min.js"></script>
		<script src="_/js/swipe.min.js"></script>
<script type="text/javascript">
			var navigation = responsiveNav(".nav-collapse", {
			customToggle: "#nav-toggle"
		});

		var elem = document.getElementById('slider');
		
		window.mySwipe = Swipe(elem, {
		  	auto: 6000,
		});
</script>
<script type="text/javascript">
		<!--//--><![CDATA[//><!--
		$(document).ready(function() {
		$('form#contact-us').submit(function() {
		  $('form#contact-us .error').remove();
		  var hasError = false;
		  $('.requiredField').each(function() {
		    if($.trim($(this).val()) == '') {
		      var labelText = $(this).prev('label').text();
		      $(this).parent().append('<span style="display: block;" class="error">You forgot to enter your '+labelText+'.</span>');
		      $(this).addClass('inputError');
		      hasError = true;
		    } else if($(this).hasClass('email')) {
		      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		      if(!emailReg.test($.trim($(this).val()))) {
		        var labelText = $(this).prev('label').text();
		        $(this).parent().append('<span class="error">Sorry! You\'ve entered an invalid '+labelText+'.</span>');
		        $(this).addClass('inputError');
		        hasError = true;
		      }
		    }
		  });
		  if(!hasError) {
		    var formInput = $(this).serialize();
		    $.post($(this).attr('action'),formInput, function(data){
		      $('form#contact-us').slideUp("fast", function() {          
		        $(this).before('<p>Thanks for the message! We\'ll get back to you as soon as we can.</p>');
		      });
		    });
		  }
		  
		  return false; 
		});
		});
		//-->!]]>
</script>

		<script src="_/js/script.min.js"></script>

	</body>

</html>