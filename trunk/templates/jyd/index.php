<?php 
defined( '_JEXEC' ) or die( 'Restricted access' );

$db = JFactory::getDBO();
$db->setQuery("SELECT * FROM #__content WHERE id=3");
$item=$db->loadObject();

$db = JFactory::getDBO();
$db->setQuery("SELECT * FROM #__content WHERE catid = 12 AND state = 1 ORDER BY ordering");
$images = $db->loadObjectList();

$template_dir = $this->baseurl.'/templates/'.$this->template.'/';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="da-dk" lang="da-dk" dir="ltr" >
<head>
<jdoc:include type="head" />
<link href="<?php echo $template_dir; ?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo $template_dir; ?>css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" />
</head>

<body>
<div id="page"> 
    <!-- begin: #Page_margin -->
    <div id="page_margin"> 
        <!-- begin: #Page_margin_content -->
        <div id="page_margin_content"> 
            <!-- begin: #Header -->
            <div id="header">
                <div class="logo"><a href="index.php"><img src="<?php echo $template_dir; ?>img/logo.png" alt="Jydsk Lasercenter"  title="Jydsk Lasercenter" /></a>
                    <p>{article 4}{text}{/article}</p>
                </div>
                <div class="float_right">
                    <div id="tabs7"> {module Main Menu} </div>
                    <br class="clear_left" />
                </div>
                <div class="clear_left"></div>
            </div>
            <!-- end: #Header --> 
            <!-- begin: #Main -->
            <div id="main">
                <div class="w290 float_left box_welcome">
                    <div class="p20t p15l"><img src="<?php echo $template_dir; ?>img/welcome.png"  alt="Jydsk Lasercenter" title="Jydsk Lasercenter" /></div>
                    <p class="p40t p30l p15r w_color"><?php echo strip_tags(substr($item->introtext, 0, 300));?>... <img src="<?php echo $template_dir; ?>img/icon.png" alt="" /> <span class="blu"><a href="index.php?option=com_content&view=article&id=3&Itemid=118">mere</a></span><br />
                        <br />
                        <span class=" p10t"><a href="kontakt.php"><img border="0" src="<?php echo $template_dir; ?>img/bt_osher.png" onmouseout="tonus(false)" onmouseover="tonus(true)" /></a></span></p>
                    <div id="tooltip" class="box_map"><img src="<?php echo $template_dir; ?>img/map.jpg" title="Jydsk Lasercenter-Kontakt" alt="Jydsk Lasercenter-Kontakt"/></div>
                </div>
                <div id="foo3" class="banner">
                	<?php foreach($images as $image){
						$tmp = json_decode($image->images);
        				$image_link = $tmp->image_intro;
					?>
                    <div class="slide"><img src="<?php echo $image_link; ?>" alt="" /></div>
                    <?php }?>
                </div>
                <div class="clear"></div>
                <div class="temp1 p10t">
                    <jdoc:include type="component" />
                </div>
                <div class="clear"></div>
            </div>
            <!-- end: #Main --> 
        </div>
        <!-- end: #Page_margin_content --> 
    </div>
    <!-- end: #Page_margin --> 
    
</div>
<!-- end: #Page -->
<div class=" clear"></div>
<!-- begin: #Footer -->
<div id="footer">
    <div class="w898">
        <p class="float_left"> <strong>Jydsk Lasercenter</strong> - Havnetorv 1b 7700 Thisted - Tlf : 97926700 - Copyright © 2010 JYDSKLASERCENTER.DK - All rights reserved.
        <p class="float_right"><a style="display:none" href="http://www.mywebcreations.dk/" target="_blank">Design by My Web Creations</a></p>
        <br class="clear" />
    </div>
</div>
<!-- end: #Footer --> 
<!--<script src="http://code.jquery.com/jquery-2.0.0.js"></script>--> 
<script src="<?php echo $template_dir; ?>jquery/jquery-1.9.1.min.js" type="text/javascript"></script> 
<script src="<?php echo $template_dir; ?>jquery/jcarousellite/jquery.carouFredSel-6.2.0-packed.js" type="text/javascript"></script> 
<script src="<?php echo $template_dir; ?>jquery/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script> 
<script src="<?php echo $template_dir; ?>jquery/jcarousellite/jcarousellite_1.0.1.js" type="text/javascript"></script> 
<script src="<?php echo $template_dir; ?>jquery/validate/jquery.validate.min.js" type="text/javascript"></script> 
<script src="<?php echo $template_dir; ?>jquery/watermark/jquery.updnWatermark.js" type="text/javascript"></script> 
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("area[rel^='prettyPhoto']").prettyPhoto();
    
    $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
    $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});

    $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
      custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
      changepicturecallback: function(){ initialize(); }
    });

    $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
      custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
      changepicturecallback: function(){ _bsap.exec(); }
    });
  });
  </script> 
<script language="javascript" type="text/javascript">   
  function tonus(state)
  {
    var tip = document.getElementById('tooltip');
    if (state)
    {
      tip.style.display = 'block';
      tip.style.visibility = 'visible';
    } else {
      tip.style.display = 'none';
      tip.style.visibility = 'hidden';      
    }
  }
</script> 
<script language="javascript" type="text/javascript">
  $(document).ready(function(){
    $("#mycarousel").jCarouselLite({
      btnNext: ".next",
      btnPrev: ".prev",
      circular: true,
      visible : 2,
      scroll: 1,
      speed : 500
    }); 
    
    $("#mycarousel2").jCarouselLite({
      btnNext: ".next2",
      btnPrev: ".prev2",
      circular: true,
      visible : 4,
      scroll: 1,
      speed : 500
    });

    $("#foo3").carouFredSel
    ({
      responsive  : true,
      scroll    : 
      {
        duration  :1200,
        fx      : "crossfade"
      },
      items   : 
      {
        visible   : 1,
        width   : 632,
        height    : 293
      } 
    });

    $("area[rel^='prettyPhoto']").prettyPhoto();

  });
</script> 
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
        },
                capcha2: {
          required: true,
          equalTo: "#capcha1"
        }
                /*,text: "required"*/
      },
      messages: {
        //company: "Indtast dit firma",
        name: "Venligst indtast dit navn",
        /*street: "Indtast adresse",
        zipcode: "Indtast postnummer",
        city: "Indtast by",
        telefon: "Indtast telefon",
        fax: "Indtast fax",*/
        email: "Venligst indtast din email",
                capcha2: "Venligst indtast koden i højre boks"
                /*,text: "Indtast kommentar"*/
      }
    });
  });
</script>
</body>
</html>
