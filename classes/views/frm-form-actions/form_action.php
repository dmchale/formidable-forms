<?php
$a = FrmAppHelper::simple_get( 't', 'sanitize_title', 'advanced_settings' );

$form_action = apply_filters( 'frm_form_action_settings', $form_action, $form_action->post_excerpt );
$form_action = apply_filters( 'frm_form_' . $form_action->post_excerpt . '_action_settings', $form_action );

?>
<div id="frm_form_action_<?php echo esc_attr( $action_key ); ?>" class="widget frm_form_action_settings frm_single_<?php echo esc_attr( $form_action->post_excerpt ); ?>_settings <?php echo esc_attr( $form_action->post_status === 'publish' ? '' : 'frm_disabled_action' ); ?>" data-actionkey="<?php echo esc_attr( $action_key ); ?>">
	<div class="widget-top">
		<div class="widget-title-action">
			<button type="button" class="widget-action hide-if-no-js" aria-expanded="false">
				<span class="toggle-indicator" aria-hidden="true"></span>
			</button>
		</div>
		<span class="frm_email_icons alignright">
			<?php if ( $action_control->action_options['limit'] > 2 ) { ?>
				<a href="javascript:void(0)" class="fas fa-clone frm_duplicate_form_action" title="<?php esc_attr_e( 'Duplicate', 'formidable' ); ?>"> </a>
			<?php } ?>
			<a href="javascript:void(0)" data-removeid="frm_form_action_<?php echo esc_attr( $action_key ); ?>" class="far fa-trash-alt frm_remove_form_action" data-frmverify="<?php echo esc_attr( 'Really?', 'formidable' ); ?>" title="<?php esc_attr_e( 'Delete', 'formidable' ); ?>"> </a>

			<label class="frm_toggle">
				<input type="checkbox" value="publish" name="<?php echo esc_attr( $action_control->get_field_name( 'post_status', '' ) ); ?>" <?php checked( $form_action->post_status, 'publish' ); ?> />
				<span class="frm_toggle_slider"></span>
				<span class="frm_toggle_on">ON</span>
				<span class="frm_toggle_off">OFF</span>
			</label>
		</span>
		<div class="widget-title">
			<h4><span class="frm_form_action_icon <?php echo esc_attr( $action_control->action_options['classes'] ); ?>"></span>
				<?php echo esc_html( $form_action->post_title ); ?>
			</h4>
		</div>
	</div>
	<div class="widget-inside frm_hidden">
		<?php
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			// only load settings if they are just added or are open
			include( dirname( __FILE__ ) . '/_action_inside.php' );
		} else {
			// include hidden settings so action won't get lost on update
			?>
		<input type="hidden" name="<?php echo esc_attr( $action_control->get_field_name( 'post_excerpt', '' ) ); ?>" class="frm_action_name" value="<?php echo esc_attr( $form_action->post_excerpt ); ?>" />
		<input type="hidden" name="<?php echo esc_attr( $action_control->get_field_name( 'ID', '' ) ); ?>" value="<?php echo esc_attr( $form_action->ID ); ?>" />
		<?php } ?>
	</div>
</div>
