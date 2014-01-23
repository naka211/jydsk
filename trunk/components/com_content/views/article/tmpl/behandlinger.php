<?php // no direct access  NDK - seo
defined('_JEXEC') or die('Restricted access');

$db = JFactory::getDBO();
$db->setQuery("SELECT * FROM #__content WHERE catid = 9 AND state = 1 ORDER BY ordering");
$items = $db->loadObjectList();
?>
<script src="<?php echo $this->template_dir; ?>Scripts/mootools1.2b.js" language="javascript"></script>
<style>
#content1{height: 470px;background-color:#FF0000;float:left;background: transparent;overflow:hidden;
	}
	.scrollbar-vert{
		/*background-color: #d2e8ff;*/
		background:url(<?php echo $this->template_dir; ?>img/lone_scroll.jpg) repeat-y center;height: 470px;width: 10px;float:left;margin-top:5px;margin-left:10px;padding-top:5px;border:0px solid #f5f5f5;
	}	
	</style>
<div class="title_4"><?php if($this->item->category_title != 'Uncategorised') echo $this->item->category_title; ?></div>
<div class=" p10t">
  <div class="col1 w240">
    <div class="box_mn_left">
      <ul class="list_1">
		<?php
		$id = JRequest::getVar('id');
		for($i=0; $i<count($items); $i++)
		{
			$row = $items[$i];
			$link = JRoute::_('index.php?option=com_content&view=article&layout=behandlinger&id='.$row->id);
		?>
		<li><a title="<?php echo $row->title; ?>" href="<?php echo $link;?>"<?php if($id == $row->id) echo ' class="current"'; ?>><?php echo $row->title; ?></a></li>
		<?php
		}
		?>
      </ul>
    </div>
  </div>
  <div class="col2 w650">
    <?php /*?>
    <div style="margin: 0 0 5px 0;">
        {module Video}
    </div>
    <?php */?>
    <div id="content1" class="w630" style="height: auto !important;">
        <h4><?php echo $this->item->title ?></h4>
        <?php echo $this->item->text; ?>
      
    </div>
    
    <!--div id="scrollbar1" class="scrollbar-vert">
      <div id="handle1" class="handle-vert"></div>
    </div-->
    <!-- begin facebook -->
    <div>
    	<div id="fb-root"></div><script src="http://connect.facebook.net/da_DK/all.js#xfbml=1"></script><fb:like href="http://www.jydsklasercenter.dk/index.php?option=com_content&amp;view=article&amp;layout=behandlinger&amp;id=<?php echo $id;?>" send="false" width="450" show_faces="false" font=""></fb:like>
    </div>
    <!-- end facebook -->
    <!--<div class="roll" style="height:410px;">
                <a href="#"><img src="img/icon_roll.jpg" /></a>
            </div>-->
    <div class=" clear"></div>
    <!--end .table_limiter-->
    <script type="text/javascript">
            /* <![CDATA[ */
            
            function makeScrollbar(content,scrollbar,handle,horizontal,ignoreMouse){
                var steps = (horizontal?(content.getScrollSize().x - content.getSize().x):(content.getScrollSize().y - content.getSize().y));
				if (steps <= 0)
				{
					scrollbar.style.visibility = 'hidden';
					return;
				}
                var slider = new Slider(scrollbar, handle, {	
                    steps: steps,
                    mode: (horizontal?'horizontal':'vertical'),
                    onChange: function(step){
                        // Scrolls the content element in x or y direction.
                        var x = (horizontal?step:0);
                        var y = (horizontal?0:step);
                        content.scrollTo(x,y);
                    }
                }).set(0);
                if( !(ignoreMouse) ){
                    // Scroll the content element when the mousewheel is used within the 
                    // content or the scrollbar element.
					$$(content, scrollbar).addEvent('DOMMouseScroll', function(e){	
                        e = new Event(e).stop();
                        var step = slider.step - e.wheel * 30;	
                        slider.set(step);					
                    });
					
                    $$(content, scrollbar).addEvent('mousewheel', function(e){	
                        e = new Event(e).stop();
                        var step = slider.step - e.wheel * 30;	
                        slider.set(step);					
                    });
                }
                // Stops the handle dragging process when the mouse leaves the document body.
                $(document.body).addEvent('mouseleave',function(){slider.drag.stop()});
            }
                        
            window.addEvent('domready', function(){				
                // -- first example, vertical scrollbar --
                //makeScrollbar( $('content1'), $('scrollbar1'), $('handle1') );
            });
            /* ]]> */
        </script>
  </div>
  <div class="clear"></div>
</div>
</div>
