<div class="widget-text-country">Country: <?php echo esc_attr($country); ?></div>
<div class="widget-text-company">Company: <?php echo esc_attr($company); ?></div>
<div class="widget-text-info">Info: <?php echo esc_attr($info); ?></div>
<div class="widget-text-phone">Phone: <?php echo esc_attr($phone); ?></div>
<div class="widget-text-street">Street: <?php echo esc_attr($street); ?></div>
<div class="widget-text-country">Country: <?php echo esc_attr($country); ?></div>
<div><a href=mailto:<?php echo esc_attr($email) ?>><i class="fa fa-envelope" aria-hidden="true"></i> E-Mail senden</a></div>
<div class="widget-text-maps"><a href=<?php echo esc_attr($maps); ?>><i class="fa fa-globe" aria-hidden="true"></i> Route berechnen</a></div>
<div>Input Field: <?php echo get_option('location_input_field'); ?></div>
<div>Checkbox Field: <?php echo get_option('location_checkbox_field'); ?></div>
<div>Select Option Field: <?php echo get_option('location_select_option_field'); ?></div>
<div>Radio Option Field: <?php echo get_option('location_radio_option_field'); ?></div>
<div>Colorpicker: <?php echo get_option('location_color_option_field') ?></div>