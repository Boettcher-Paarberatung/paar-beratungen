<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.1.2
 * 
 * Website Footer Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = psychology_help_get_global_options();
?>


		</div>
	</div>
</div>
<!-- _________________________ Finish Middle _________________________ -->
<?php 

get_sidebar('bottom');

?>
<a href="javascript:void(0);" id="slide_top" class="cmsmasters_theme_icon_slide_top"></a>
</div>
<!-- _________________________ Finish Main _________________________ -->

<!-- _________________________ Start Footer _________________________ -->
<footer id="footer" role="contentinfo" class="<?php echo 'cmsmasters_color_scheme_' . $cmsmasters_option['psychology-help' . '_footer_scheme'] . ($cmsmasters_option['psychology-help' . '_footer_type'] == 'default' ? ' cmsmasters_footer_default' : ' cmsmasters_footer_small');
?>">
	<div class="footer_bg">
		<div class="footer_inner">
		<?php 
			psychology_help_footer_logo($cmsmasters_option);
		
		
			psychology_help_get_footer_nav($cmsmasters_option);
			
			
			psychology_help_get_footer_social_icons($cmsmasters_option);
		
		
			psychology_help_get_footer_custom_html($cmsmasters_option);
		?>
		</div>
		<div class="copyright_wrap">
			<span class="footer_copyright copyright">
			<?php 
			if (function_exists('the_privacy_policy_link')) {
				the_privacy_policy_link('', ' / ');
			}
			
			echo esc_html(stripslashes($cmsmasters_option['psychology-help' . '_footer_copyright']));
			?>
			</span>
		</div>
	</div>
</footer>
<!-- _________________________ Finish Footer _________________________ -->

</div>
<span class="cmsmasters_responsive_width"></span>
<!-- _________________________ Finish Page _________________________ -->

<?php wp_footer(); ?>
</body>
</html>
