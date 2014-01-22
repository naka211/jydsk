<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$template_dir = JURI::base().'templates/jyd/';
$db = JFactory::getDBO();
$db->setQuery("SELECT * FROM #__content WHERE catid = 10 AND state = 1 ORDER BY ordering");
$items = $db->loadObjectList();

$db = JFactory::getDBO();
$db->setQuery("SELECT * FROM #__content WHERE catid = 9 AND state = 1 ORDER BY ordering");
$items1 = $db->loadObjectList();

?>
<div class="col1 p15r">
    <div class="title_1">Produkter</div>
    <div class="box_pro1" style="height:120px;">
        <div class="icon_2"><a class="next" href="javascript:;"><img src="<?php echo $template_dir; ?>img/back.png" alt="" /></a></div>
        <div class="float_left" id='mycarousel' style="height:115px;">
            <ul class="float_left">
                <?php foreach($items as $item){
                    $tmp = json_decode($item->images);
                    $image = $tmp->image_intro;
                    $tmp = json_decode($item->urls);
                    $url = $tmp->urla;
                ?>
                <li style="width:110px; margin-left:0px;">
                    <div class="bg_img1"><a href="<?php echo $url;?>" target="_blank"><img src="<?php echo JURI::base().'thumbnail/timthumb.php?src='.JURI::base().$image.'&q=100&w=90&h=56'; ?>" ></a></div>
                    <div style=" text-align:center"><a title="<?php echo $item->title;?>" href="<?php echo $url;?>" target="_blank"><?php echo $item->title;?></a><br />
                        <span class="orange"><?php echo $item->introtext; ?></div>
                </li>
                <?php }?>
            </ul>
        </div>
        <div class="icon_2"><a class="prev" href="javascript:;"><img src="<?php echo $template_dir; ?>img/next.png" alt="" /></a></div>
        <br class="clear" />
    </div>
    <div class="m20l p10t"><a href="http://hudlaegenscremeshop.dk" target="_blank"><img src="<?php echo $template_dir; ?>img/bt_trykher.jpg" title="Gå til webshoppen" alt="Gå til webshoppen" /></a></div>
</div>
<div class="col1 p15r">
    <div class="title_1">Behandlinger</div>
    <div class="m10t">
        <div>{article 20}{text}{/article}
        </div>
        <div class="p5t box_be">
            <table summary="Behandlinger" width="100%" border="0" cellspacing="0" cellpadding="0">
            <?php
            for($i=0; $i<count($items1); $i+=2){
                $item = $items1[$i];
                $link = ('index.php?option=com_content&view=article&layout=behandlinger&id='.$item->id);
                $item2 = @$items1[$i+1];
                $link2 = $item2?('index.php?option=com_content&view=article&layout=behandlinger&id='.$item2->id):'#';
            ?>
                <tr>
                    <td width="51%" height="27"><img src="<?php echo $template_dir; ?>img/icon1.jpg" /><a title="<?php echo $item->title; ?>" href="<?php echo $link;?>"><?php echo $item->title; ?></a></td>
                    <td width="49%"><?php if($item2) { ?><img src="<?php echo $template_dir; ?>img/icon1.jpg" /><a title="<?php echo $item2->title; ?><" href="<?php echo $link2; ?>"><?php echo $item2->title; ?></a><?php } ?></td>
                </tr>
             <?php }?>
            </table>
        </div>
    </div>
</div>
<div class="col1" style="min-height: 300px;">
    <div class="title_1"> Kontaktformular </div>
    <div class="m10t">
        <div>Vi kontakter dig hurtigst muligt. Ved patienthenvendelse oplys venligst Cpr.nr.
            :</div>
        <div class="p10t">
            <form action="index.php" method="post" name="emailForm" id="emailForm" class="form-validate">
                <div class="input_1">
                    <input name="name" id="name" type="text" title="Dit navn" class="form2" />
                </div>
                <div class="input_1">
                    <input name="telefon" id="telefon" type="text" title="Telefon-nummer" class="form2" />
                </div>
                <div class="input_1">
                <input name="email" id="email" type="text" title="E-mail" class="form2" />
                </div>
                <div class="texterea" style="z-index:3">
                    <textarea name="text" id="text" cols="" rows="" class="form2" title="Emne / Besked"></textarea>
                </div>
                <?php $string = md5(microtime() * time());$text = substr($string, 0, 5);?>
                <input type="text" name="capcha1" id="capcha1" style="display:none;" value="<?php echo $text;?>"/>
                <input style="margin-bottom:5px; width:100px; height: 22px;border: 1px solid #c5d1dc;" type="text" name="capcha2" id="capcha2" value=""/>
                <img style="vertical-align: top;" width="55" height="23" src="index.php?option=com_captcha&text=<?php echo $text;?>" alt="<?php echo $text;?>" /> <br />
                <input type="submit" style="background:url(<?php echo $template_dir; ?>img/bt_send.jpg) no-repeat -2px 0px;width:81px;height:30px;border:0px red solid;cursor:pointer" value="" />
                <input type="reset" style="background:url(<?php echo $template_dir; ?>img/bt_nulstil.jpg) no-repeat -2px 0px;width:81px;height:30px;border:0px red solid;cursor:pointer" value="" />
                <input type="hidden" name="task" value="frontpage_submit" />
                <input type="hidden" name="option" value="com_kontakt" />
                <?php echo JHTML::_( 'form.token' ); ?>
            </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<div class="bg_bot m10t">
    <div class="w290 float_left" style="min-height: 395px;">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=329684403786353";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like-box" data-href="https://www.facebook.com/pages/Jydsk-Lasercenter/203270099703773" data-width="290" data-show-faces="false" data-stream="true" data-header="false"></div>
        &nbsp; </div>
    <div class="w620 float_left">
        <p class="title_3 m30l">Galleri</p>
        <div class="icon_1"><a href="javascript:;" class="next2"><img src="<?php echo $template_dir; ?>img/back.png" alt="" /></a></div>
        <div class="w558 float_left m30t" id='mycarousel2' style="height:80px; padding-left:12px">
            <ul class="float_left">
                <li class="w120 float_left center" style="width:137px; margin-left:0px;">
                    <div class="bg_img"><a href="/Galleri.html"><img src="<?php echo $template_dir; ?>img/metteefter1.jpg" alt="Madonna Eyelift - efter foto" title="Madonna Eyelift - efter foto" width="116" height="68" /></a></div>
                </li>
                <li class="w120 float_left center" style="width:137px; margin-left:0px;">
                    <div class="bg_img"><a href="/Galleri.html"><img src="<?php echo $template_dir; ?>img/metteefter1.jpg" alt="Madonna Eyelift - før foto" title="Madonna Eyelift - før foto" width="116" height="68" /></a></div>
                </li>
                <li class="w120 float_left center" style="width:137px; margin-left:0px;">
                    <div class="bg_img"><a href="/Galleri.html"><img src="<?php echo $template_dir; ?>img/metteefter1.jpg" alt="Smartxide CO2 DOT-laser" title="Smartxide CO2 DOT-laser" width="116" height="68" /></a></div>
                </li>
                <li class="w120 float_left center" style="width:137px; margin-left:0px;">
                    <div class="bg_img"><a href="/Galleri.html"><img src="<?php echo $template_dir; ?>img/metteefter1.jpg" alt="Smartxide CO2 DOT-laser" title="Smartxide CO2 DOT-laser" width="116" height="68" /></a></div>
                </li>
                <li class="w120 float_left center" style="width:137px; margin-left:0px;">
                    <div class="bg_img"><a href="/Galleri.html"><img src="<?php echo $template_dir; ?>img/metteefter1.jpg" alt="Madonna Eyelift" title="Madonna Eyelift" width="116" height="68" /></a></div>
                </li>
                <li class="w120 float_left center" style="width:137px; margin-left:0px;">
                    <div class="bg_img"><a href="/Galleri.html"><img src="<?php echo $template_dir; ?>img/metteefter1.jpg" alt="Madonna Eyelift" title="Madonna Eyelift" width="116" height="68" /></a></div>
                </li>
                <li class="w120 float_left center" style="width:137px; margin-left:0px;">
                    <div class="bg_img"><a href="/Galleri.html"><img src="<?php echo $template_dir; ?>img/metteefter1.jpg" alt="Kombinationsbehandling" title="Kombinationsbehandling" width="116" height="68" /></a></div>
                </li>
                <li class="w120 float_left center" style="width:137px; margin-left:0px;">
                    <div class="bg_img"><a href="/Galleri.html"><img src="<?php echo $template_dir; ?>img/metteefter1.jpg" alt="Kombinationsbehandling" title="Kombinationsbehandling" width="116" height="68" /></a></div>
                </li>
            </ul>
        </div>
        <div class="icon_1" style="margin-left:-3px"><a href="javascript:;" class="prev2"><img src="<?php echo $template_dir; ?>img/next.png" alt="" /></a></div>
        <div class="clear_left"></div>
    </div>
    <div class="w620 float_left" style="padding-top:30px;">
        <div style="margin: 0; padding: 0 15px 0 15px; width:290px; float:left;">
            <div class="title_1"><img src="<?php echo $template_dir; ?>img/icon_3.png" width="22" height="22" style=" float:left; margin-right:10px;"/> <a href="/Table/Nyheder/">Nyheder </a></div>
            <div style="margin-top: 10px;" class="text_news">
                <ul>
                </ul>
            </div>
        </div>
        <div style="margin: 0; width: 290px; float: left;">
            <div style="padding: 35px 0 0 10px;"> <a href="http://www.youtube.com/user/JydskLasercenter?feature=mhee" target="_blank"><img src="<?php echo $template_dir; ?>img/button_Youtube.png" /></a> </div>
        </div>
        <div style="clear: left;"></div>
    </div>
    <div class="clear_left"></div>
</div>
