<?php defined('_JEXEC') or die('Restricted access');
$this->template_dir = 'templates/jyd/';
?>
<script src="<?php echo $this->template_dir ;?>jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo $this->template_dir ;?>jquery/lightbox/js/jquery.lightbox-0.5.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->template_dir ;?>jquery/lightbox/css/jquery.lightbox-0.5.css" media="screen" />
<div class="title_4">Galleri</div>
<div class=" p10t">
  <div class="bol_bottom gallery">
	<?php foreach ($this->intro_items as $i=>$item) : 
        $tmp = json_decode($item->images);
        $image = $tmp->image_intro;
    ?>
      <div class="w120 float_left p30b p10t<?php if($i%6!=5) echo ' p37r';?>">
        <div class="bg_img"><a title="<?php echo $item->title; ?>" href="<?php echo $image; ?>" rel="prettyPhoto[gallery1]">
        <img src="<?php echo JURI::base().'thumbnail/timthumb.php?src='.JURI::base().$image.'&q=100&w=116&h=68'; ?>" ></a></div>
        <div class="p5t" align="center"><?php echo $item->title; ?></div>
      </div>
	  <?php if($i%6==5) echo '<div class="clear_left"></div>';?>
	<?php endforeach; ?>
      <div class="clear_left"></div>
    </div>
  </div>
  <div class="p10t" style="text-align:center"><? echo $this->pagination->getPagesLinks(); ?></div>
</div>
</div>
<script type="text/javascript">
    jQuery(function() {
        jQuery('#gallery a').lightBox({
			'fixedNavigation':true,
			'txtImage':'Billede',
			'txtOf':'af',
			'imageLoading':'<? echo $this->template_dir; ?>jquery/lightbox/images/lightbox-ico-loading.gif',
			'imageBtnPrev':'<? echo $this->template_dir; ?>jquery/lightbox/images/lightbox-btn-prev.gif',
			'imageBtnNext':'<? echo $this->template_dir; ?>jquery/lightbox/images/lightbox-btn-next.gif',
			'imageBtnClose':'<? echo $this->template_dir; ?>jquery/lightbox/images/lightbox-btn-close.gif',
			'imageBlank':'<? echo $this->template_dir; ?>jquery/lightbox/images/lightbox-btn-blank.gif'
			
		});
    });
</script>