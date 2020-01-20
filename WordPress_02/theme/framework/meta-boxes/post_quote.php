<div id="tb-blog-metabox" class='jws_theme_metabox'>
	<?php
	$this->select('post_quote_type',
			'Quote Content',
			array(
					'' 	=> 'From Post',
					'custom' 		=> 'Custom'
			),
			'',
			''
	);
	?>
	<div id="post_quote_custom">
	<?php
	$this->textarea('post_quote',
			'Content',
			esc_html__('Please type the text for your quote here.','medicare')
	);
	$this->text('post_author',
			'Author',
			'',
			esc_html__('Please type the text for author quote here.','medicare')
	);
	?>
	</div>
</div>
<?php
