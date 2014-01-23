<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo $this->template_dir; ?>css/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $this->template_dir ;?>jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo $this->template_dir ;?>jquery/validate/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo $this->template_dir ;?>jquery/watermark/jquery.updnWatermark.js" type="text/javascript"></script>
<style>
.updnWatermark {
	padding-top:5px;
}
</style>
<title>Jydsk lasercenter - Medarbejdere</title>
</head>
<body style="background:none;">
<!-- begin: #Page -->
<div class="p30l p20t w290">
  <div class="float_left w290">
    <div class="p10b bol_bottom">
      <div class=" w100 float_left box_pic"><img width="86" height="114" src="<?php echo $this->row->image; ?>" /></div>
      <div class=" w180 float_left">
        <div class="tt_name"><?php echo $this->row->name; ?></div>
        <span class="red_color">Hvis du er eller tidligere har været patient, skal du oplyse dit cpr. nummer i besked feltet. </span></div>
      <div class="clear_left"></div>
    </div>
    <div class="p10t">
<form action="<?php echo $this->action; ?>" method="post" name="emailForm" id="emailForm">	
      <div class="input_1">
        <input type="text" name="name" id="name" title="Navn:  " class="form2" />
      </div>
      <div class="input_1">
        <input type="text" name="by" id="by" title="By:" class="form2" />
      </div>
      <div class="input_1">
        <input type="text" name="email" id="email" title="E-mail" class="form2" />
      </div>
      <div class="input_1">
        <input type="text" name="telefon" id="telefon" title="Telefon:" class="form2" />
      </div>
      <div class="texterea">
        <textarea name="text" id="text" cols="" rows="" class="form2" title="Besked:"></textarea>
      </div>
	  
	  <input type="submit" style="background:url(<?php echo $this->template_dir; ?>img/bt_send.jpg) no-repeat -2px 0px;width:81px;height:30px;border:0px red solid;cursor:pointer" value="" />
  	  <input type="reset" style="background:url(<?php echo $this->template_dir; ?>img/bt_nulstil.jpg) no-repeat -2px 0px;width:81px;height:30px;border:0px red solid;cursor:pointer" value="" />

	<input type="hidden" name="task" value="submit" />
	<?php echo JHTML::_( 'form.token' ); ?>
	</form>	 	  
    </div>
  </div>
</div>  
<div class="clear"></div>
<script language="javascript">
	$(document).ready(function($) {	
		$.updnWatermark.attachAll();
		
		$("#emailForm").validate({
			errorPlacement: function(error, element) {			
			},
			invalidHandler: function(form, validator) {
			  var errors = validator.numberOfInvalids();
			  if (errors) {
				alert(validator['errorList'][0]['message']);
				validator['errorList'][0]['element'].focus();
			  } else {
			  }
			},

			rules: {
				//company: "required",
				name: "required",
				/*street: "required",
				zipcode: "required",
				city: "required",
				telefon: "required",
				fax: "required",*/
				email: {
					required: true,
					email: true
				}/*,
				text: "required"*/
			},
			messages: {
				//company: "<?php echo JText::_( 'Please enter your company' ); ?>",
				name: "<?php echo JText::_( 'Venligst indtast dit navn' ); ?>",
				/*street: "<?php echo JText::_( 'Please enter address' ); ?>",
				zipcode: "<?php echo JText::_( 'Please enter postal code' ); ?>",
				city: "<?php echo JText::_( 'Please enter city' ); ?>",
				telefon: "<?php echo JText::_( 'Please enter telefon' ); ?>",
				fax: "<?php echo JText::_( 'Please enter fax' ); ?>",*/
				email: "<?php echo JText::_( 'Venligst indtast din email' ); ?>"/*,
				text: "<?php echo JText::_( 'Please enter comment' ); ?>"*/
			}
		});
	});
</script>
</body>
</html>
<?php exit; ?>