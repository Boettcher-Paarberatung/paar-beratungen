<div id="jws_theme_doctor_metabox" class='tb-doctor-metabox'>
	<?php
	$this->text('doctor_position',
			'Position',
			'',
			esc_html__('Enter position of member.','medicare')
	);
	?>

	<?php
	$this->textarea('doctor_social',
			'Social',
			'',
			esc_html__('Enter social of member.','medicare')
	);
	?>
</div>