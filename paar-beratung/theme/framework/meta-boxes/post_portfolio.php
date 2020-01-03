<div id="jws_theme_porfolio_metabox" class='tb-porfolio-metabox'>
	<p>
	<?php
	$this->text('createdby',
			esc_html__('Create by: ','medicare'),
			'Medicare',
			'',
			''
			
	);
	?>
	</p>
	<p>
	<?php
	//	public function text($id, $label, $default = '', $desc = '',$placeholder = '')
	$today = current_time('d / m / Y');
		$this->text('date',
				'Date: ',
				'$today',
				'',
				'today is '. $today
		);
	?>
	</p>
	<p>
	<?php
		$this->text('participants',
				esc_html__('Participants: ','medicare'),
				''
		);
	?>
	</p>
	<p>
	<?php
		$this->text('website',
				'Website: ',
				'yourdomain.com'
		);
		?>
	</p>
</div>