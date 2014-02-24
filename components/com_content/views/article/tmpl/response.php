<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<script src="<?php echo $this->template_dir; ?>Scripts/mootools1.2b.js" language="javascript"></script>
<div class=" p10t">
  <div class="bol_bottom">
    <div id="content1" class="w898" style="height: auto !important;"> 
    <!--<?php if($this->article->article_image) { ?><img src="<?php echo JURI::base().$this->article->article_image; ?>" width="206" style=" float:left; margin:0 10px 10px 0;"/><?php } ?>-->
        <?php echo $this->item->text; ?>
       
        <br />
    <a href="<?php echo JURI::base(); ?>"><img border="0" src="templates/jyd/mwc/danish/btn_1.png" /></a></div>
    <!--div id="scrollbar1" class="scrollbar-vert">
      <div id="handle1" class="handle-vert"></div>
    </div-->
    <!--<div class="roll" style="height:410px;">
                <a href="#"><img src="img/icon_roll.jpg" /></a>
            </div>-->
    <div class=" clear"></div>
    <!--end .table_limiter-->
    <script type="text/javascript">
            /* <![CDATA[ */
            
            function makeScrollbar(content,scrollbar,handle,horizontal,ignoreMouse){
                var steps = (horizontal?(content.getScrollSize().x - content.getSize().x):(content.getScrollSize().y - content.getSize().y))
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
  <!--<div class="p10t"><a href="javascript:history.go(-1)"><img border="0" src="templates/jyd/img/bt_tibage.jpg" /></a></div>-->
</div>
</div>
