<?php defined('_JEXEC') or die('Restricted access'); 
  //NDK - seo
?>
<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  winn = window.open('<?php echo JURI::base(); ?>index.php?option=com_profiles&tmpl=component&view=detail&id='+theURL,winName,features);
}
//-->
</script>
<div class="title_4">Medarbejdere</div>
<div class=" p20t">
  <div>
    <?php
	$css = array("float_left w280 p30b", "float_left w280 p30l p30b", "float_left w280 p30l p30b");
	for($i=0; $i<count($this->items); $i++)
	{
		$row = $this->items[$i];
	?>
    <div class="<?php echo $css[$i%3]; ?>">
      <div class="p10b bol_bottom">
        <div class=" w100 float_left box_pic"><img width="86" height="114" title="<?php echo $row->name; ?>" alt="<?php echo $row->name; ?>" src="<?php echo $row->image; ?>" /></div>
        <div class=" w180 float_left">
          <div class="tt_name"><?php echo $row->name; ?></div>
          <?php echo $row->rank; ?><br />
          <a href="mailto:<?php echo $row->email; ?>"><?php echo $row->email; ?></a><br />
          Tlf.: <?php echo $row->telephone; ?><br />
          <br /><?php if($row->name != 'Uffe Gjede'){ ?>
          <a href="javascript:;"><img src="templates/jyd/img/bt_senenbesked.jpg" onclick="MM_openBrWindow('<?php echo $row->id; ?>','','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=400')" /></a><?php } ?> </div>
        <div class="clear_left"></div>
      </div>
      <div class="p10t"><?php echo $row->description; ?></div>
    </div>	
	<?php
		if ($i%3 == 2)
			echo '<div class="clear"></div>';
	}
	?>	
  </div>
  <div class="clear"></div>
</div>
</div>
