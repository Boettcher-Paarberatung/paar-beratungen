<div id="tb-blog-loading" class="jws_theme_loading" style="display: block;">
	<div id="followingBallsG">
	<div id="followingBallsG_1" class="followingBallsG">
	</div>
	<div id="followingBallsG_2" class="followingBallsG">
	</div>
	<div id="followingBallsG_3" class="followingBallsG">
	</div>
	<div id="followingBallsG_4" class="followingBallsG">
	</div>
	</div>
</div>
<div class='jws_theme_metabox' style="display: none;">
	<?php
	$this->select('post_video_source',
			'Select Source',
			array(
					'post'		=>'From Post',
					'media' 	=> 'From Media',
					'youtube' 	=> 'Youtube',
					'vimeo' 	=> 'Vimeo'
			),
			'',
			''
	);
	?>
	<div id="jws_theme_video_setting">
	<?php
	$this->select('post_video_type',
			'Video Type',
			array(
					'mp4' 	=> 'MP4',
					'webm' 	=> 'WebM',
					'ogg' 	=> 'Ogg'
			),
			'',
			''
	);
	$this->upload('post_video_url',
			'Video URL',
			esc_html__('Please upload the (MP4,WebM,Ogg) video file. You must include both formats.','medicare')
	);
	$this->upload('post_preview_image',
			'Preview Image',
			esc_html__('Image should be at least 680px wide. Click the "Upload" button to begin uploading your image, followed by "Select File" once you have made your selection. Only applies to self hosted videos.','medicare')
	);
	$this->text('post_video_youtube',
			'Youtube',
			'',
			esc_html__('Enter in a Youtube (http://youtu.be/ID)','medicare')
	);
	$this->text('post_video_vimeo',
			'Vimeo',
			'',
			esc_html__('Enter in a Vimeo (http://vimeo.com/ID)','medicare')
	);
	$this->text('post_video_height',
			'Video Height',
			'200px',
			'Set Height for Video'
	);
	?>
	<p class="jws_theme_info"><i class="dashicons dashicons-dashboard"></i><a href="<?php echo esc_url('http://www.w3schools.com/html/html5_video.asp');?>"><?php echo esc_html_e('Video Formats and Browser Support','medicare'); ?></a></p>
	</div>
</div>
<?php
