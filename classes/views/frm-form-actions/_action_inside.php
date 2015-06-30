<input type="hidden" name="<?php echo esc_attr( $action_control->get_field_name('post_excerpt', '') ) ?>" class="frm_action_name" value="<?php echo esc_attr( $form_action->post_excerpt ); ?>" />
<input type="hidden" name="<?php echo esc_attr( $action_control->get_field_name('ID', '') ) ?>" value="<?php echo esc_attr( $form_action->ID ); ?>" />

<table class="form-table">
    <tr>
        <th>
            <label <?php FrmAppHelper::maybe_add_tooltip('action_title') ?>><?php _e( 'Label', 'formidable' ) ?></label>
        </th>
        <td><input type="text" name="<?php echo esc_attr( $action_control->get_field_name('post_title', '') ) ?>" value="<?php echo esc_attr($form_action->post_title); ?>" class="large-text <?php FrmAppHelper::maybe_add_tooltip('action_title', 'open') ?>" id="<?php echo esc_attr( $action_control->get_field_id('action_post_title') ) ?>" />
        </td>
    </tr>
</table>
<?php $action_control->form($form_action, compact('form', 'action_key', 'values')); ?>

<table class="form-table frm-no-margin">
    <tr><td>
<?php
if ( ! isset( $action_control->action_options['event'] ) ) {
	$events = 'create';
}

if ( ! is_array( $action_control->action_options['event'] ) ) {
	$action_control->action_options['event'] = explode( ',', $action_control->action_options['event'] );
}

if ( count( $action_control->action_options['event'] ) == 1 || $action_control->action_options['force_event'] ) {
	foreach ( $action_control->action_options['event'] as $e ) { ?>
	<input type="hidden" name="<?php echo esc_attr( $action_control->get_field_name('event') ) ?>[]" value="<?php echo esc_attr( $e ) ?>" />
<?php
	}
} else {
?>
	<p><label class="frm_left_label"><?php _e( 'Trigger this action after', 'formidable' ) ?></label>
		<select name="<?php echo esc_attr( $action_control->get_field_name('event') ) ?>" multiple="multiple" class="frm_multiselect" id="<?php echo esc_attr( $action_control->get_field_id('event') ) ?>">
<?php
	$event_labels = apply_filters( 'frm_action_triggers', array(
		'create'    => __( 'Create', 'formidable' ),
		'update'    => __( 'Update', 'formidable' ),
		'delete'    => __( 'Delete', 'formidable' ),
	) );

	foreach ( $action_control->action_options['event'] as $event ) { ?>
		<option value="<?php echo esc_attr( $event ) ?>" <?php echo in_array( $event, (array) $form_action->post_content['event'] ) ? ' selected="selected"' : ''; ?> /><?php echo isset( $event_labels[ $event ] ) ? $event_labels[ $event ] : $event; ?></option>
<?php
	}
?>		</select>
 	</p>
<?php
}

do_action( 'frm_additional_action_settings', $form_action, compact( 'form', 'action_control', 'action_key', 'values' ) );

?>
    <span class="alignright frm_action_id <?php echo empty( $form_action->ID ) ? 'frm_hidden' : ''; ?>"><?php printf( __( 'Action ID: %1$s', 'formidable' ), $form_action->ID); ?></span>
    </td></tr>
</table>
