<?php // no direct access
defined('_JEXEC') or die('Restricted access');
?>
<script src="templates/jyd/jquery/jquery.js" type="text/javascript"></script>
<script src="templates/jyd/jquery/validate/jquery.validate.js" type="text/javascript"></script>
<div class="title_4">Kontakt</div>
<div class="m10l p10t">{article 26}{text}{/article}<br />
  <br />
  <br />
  <div class="w290 float_left bs1r"> <img  alt="Jydsk Lasercenter"  title="Jydsk Lasercenter"  src="templates/jyd/img/logo_min.png" alt="" width="272" height="79" /><br />
    {article 27}{text}{/article}
  </div>
  <div class="float_left p30l">
    <div class="input_form">
        <form action="<?php echo $this->action ?>" method="post" name="kontaktForm" id="kontaktForm">
        <label class="w100">Kontaktperson</label>
        <input name="name" id="name" type="text" value="" class="w280" />
        <br />
        <label class="w100">Email</label>
        <input name="email" id="email" type="text" value="" class="w280" />
        <br />
        <label class="w100">Cpr.nr. / Firma</label>
        <input name="company" id="company" type="text" value="" class="w280" />
        <br />
        <label class="w100">Emne</label>
        <input name="subject" id="subject" type="text" value="" class="w280" />
        <br />
        <label class="w100">Din besked</label>
        <textarea name="text" id="text" rows="5" class="w280"></textarea>
        <br />
        
        <label class="w100">&nbsp;</label>
        <?php $string = md5(microtime() * time());$text = substr($string, 0, 5);?>
        <input type="text" name="capcha1" id="capcha1" style="display:none;" value="<?php echo $text;?>"/>
        <input type="text" name="capcha2" id="capcha2" value="Venligst indtast koden" onclick="this.value=''"/>
        <img style="vertical-align: top;" width="55" height="23" src="index.php?option=com_captcha&text=<?php echo $text; ?>" alt="<?php echo $text; ?>" />
        <br />
        
        <label class="w100">&nbsp;</label>
        <input type="submit" style="background:url(templates/jyd/img/bt_send.jpg) no-repeat -2px 0px;width:81px;height:30px;border:0px red solid;cursor:pointer" value="" />
        <input type="reset" style="background:url(templates/jyd/img/bt_nulstil.jpg) no-repeat -2px 0px;width:81px;height:30px;border:0px red solid;cursor:pointer" value="" />
        <input type="hidden" name="option" value="com_kontakt" />
        <input type="hidden" name="controller" value="" />
        <input type="hidden" name="task" id="task" value="submit" />
        <?php echo JHTML::_( 'form.token' ); ?>
        </form>	  
        <br />
    </div>
  </div>
  <div class="clear_left"></div>
</div>

<script language="javascript">
<?php if($this->error) : ?>
<?php echo 'alert("'.$this->error.'");'; ?>
<?php endif; ?>

	$(document).ready(function($) {	
		$("#kontaktForm").validate({
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
				},
                capcha2: {
					required: true,
					equalTo: "#capcha1"
				}
                /*,text: "required"*/
			},
			messages: {
				//company: "<?php echo JText::_( 'Please enter your company' ); ?>",
				name: "<?php echo JText::_( 'Venligst indtast dit navn' ); ?>",
				/*street: "<?php echo JText::_( 'Please enter address' ); ?>",
				zipcode: "<?php echo JText::_( 'Please enter postal code' ); ?>",
				city: "<?php echo JText::_( 'Please enter city' ); ?>",
				telefon: "<?php echo JText::_( 'Please enter telefon' ); ?>",
				fax: "<?php echo JText::_( 'Please enter fax' ); ?>",*/
				email: "<?php echo JText::_( 'Venligst indtast din email' ); ?>",
                capcha2: "<?php echo JText::_( 'Venligst indtast koden i højre boks' ); ?>"
                /*,text: "<?php echo JText::_( 'Please enter comment' ); ?>"*/
			}
		});
	});
</script>