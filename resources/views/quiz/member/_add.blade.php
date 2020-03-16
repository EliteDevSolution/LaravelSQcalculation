<?php 
$colours = ['bg_orange', 'bg_blue', 'bg_yellow', 'bg_violet'];
?>

<div data-ref="{index}" class="grid grid_6">         
    <div class="nicdark_archive1 nicdark_<?php echo $colours[$colour];?> nicdark_radius nicdark_shadow">
        
        <div class="nicdark_textevidence nicdark_width_percentage40 nicdark_width100_responsive">
            <img alt=""  class="nicdark_radius_left nicdark_opacity" src="<?php echo $url_photo; ?>">
        </div>
                
        <div class="nicdark_textevidence nicdark_width_percentage50 nicdark_width100_responsive">
            <div class="nicdark_margin20">        
                <h4 class="white"><a class="white" href="#!"><?php echo $name; ?></a></h4>                        
                <div class="nicdark_space20"></div>
                <div class="nicdark_divider left small"><span class="nicdark_bg_white nicdark_radius"></span></div>
                <div class="nicdark_space20"></div>
                <p class="white"><?php echo $email; ?></p>
                <div class="nicdark_space20"></div>                        
            </div>
        </div>

        <div class="nicdark_textevidence nicdark_width_percentage10 nicdark_displaynone_responsive">
            <div class="nicdark_space20"></div>
            <div class="nicdark_space5"></div>
            <a title="REMOVE MEMBER" href="#!" class="nicdark_rotate nicdark_tooltip nicdark_btn_icon small nicdark_<?php echo $colours[$colour];?>dark nicdark_radius_circle white remove_member"><i class="icon-user-delete"></i></a>
            <div class="nicdark_space20"></div>                    
        </div>

    </div>
</div>