<form method="get" action="<?php echo esc_url(home_url('/')); ?>">
	<div class="form-group">
		<input type="s" name="s" value="" placeholder="<?php esc_attr_e('Search', 'mindron');?>" required>
		<button type="submit"><span class="icon fa fa-search"></span></button>
	</div>
</form>