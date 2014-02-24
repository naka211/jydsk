<?php defined('_JEXEC') or die('Restricted access');
?>
<div class="title_4"><?php echo $this->category->title; ?></div>
<div class=" p10t">
    <div class="bol_bottom p10b">
        <div class="w440 boder_right p10r float_left">
            <?php
	  $n = count($this->items);
	  for($i=0; $i<$n; $i+=2)
	  {
	  		$row = $this->items[$i];
            $tmp = json_decode($row->images);
            $image = $tmp->image_intro;
	  ?>
            <div class="box_news1"<?php if($i+2>=$n) echo ' style="background:none;"'; ?>> <a href="<?php echo JURI::base();?>index.php?option=com_content&view=article&id=<?php echo $row->id;?>"><img src="<?php echo JURI::base().'thumbnail/timthumb.php?src='.JURI::base().$image.'&q=100&w=126&h=84'; ?>" ></a>
                <h5><?php echo $row->title; ?></h5>
                <span class="gry_color"><?php echo date('d-m-Y', strtotime($row->publish_up)); ?></span><br />
                <?php echo implode(' ', array_slice(explode(' ', $row->introtext), 0, 50)); ?>... <span class="blu"><a href="<?php echo JURI::base();?>index.php?option=com_content&view=article&id=<?php echo $row->id;?>">mere</a></span>
                <div class="clear_left"></div>
            </div>
            <?php 
	  }
	  ?>
        </div>
        <div class="w440 float_left p30l">
            <?php
	  for($i=1; $i<$n; $i+=2)
	  {
	  		$row = $this->items[$i];
            $tmp = json_decode($row->images);
            $image = $tmp->image_intro;
	  ?>
            <div class="box_news1"<?php if($i+2>=$n) echo ' style="background:none;"'; ?>> <a href="<?php echo JURI::base();?>index.php?option=com_content&view=article&id=<?php echo $row->id;?>"><img src="<?php echo JURI::base().'thumbnail/timthumb.php?src='.JURI::base().$image.'&q=100&w=126&h=84'; ?>" ></a>
                <h5><?php echo $row->title; ?></h5>
                <span class="gry_color"><?php echo date('d-m-Y', strtotime($row->publish_up)); ?></span><br />
                <?php echo implode(' ', array_slice(explode(' ', $row->introtext), 0, 50)); ?>... <span class="blu"><a href="<?php echo JURI::base();?>index.php?option=com_content&view=article&id=<?php echo $row->id;?>">mere</a></span>
                <div class="clear_left"></div>
            </div>
            <?php 
	  }
	  ?>
        </div>
        <div class="clear_left"></div>
    </div>
    <div class="p10t">
        <div class="ptrang">
            <ul>
                <?php echo $this->pagination->getPagesLinks(); ?>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
</div>
</div>
