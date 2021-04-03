<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
?>
<div class="frm_forms <?php echo esc_attr( FrmFormsHelper::get_form_style_class( $values ) ); ?>" id="frm_form_<?php echo esc_attr( $form->id ); ?>_container" <?php echo wp_strip_all_tags( apply_filters( 'frm_form_div_attributes', '', $form ) ); // WPCS: XSS ok. ?>>
<?php if ( ! isset( $include_form_tag ) || $include_form_tag ) { ?>
<form enctype="<?php echo esc_attr( apply_filters( 'frm_form_enctype', 'multipart/form-data', $form ) ); ?>" method="post" class="frm-show-form <?php do_action( 'frm_form_classes', $form ); ?>" id="form_<?php echo esc_attr( $form->form_key ); ?>" <?php echo $frm_settings->use_html ? '' : 'action=""'; ?> <?php echo wp_strip_all_tags( apply_filters( 'frm_form_attributes', '', $form ) ); // WPCS: XSS ok. ?>>
<?php } else { ?>
<div id="form_<?php echo esc_attr( $form->form_key ); ?>" class="frm-show-form <?php do_action( 'frm_form_classes', $form ); ?>" >
	<?php
}

$message_placement = isset( $message_placement ) ? $message_placement : 'before';

if ( ! in_array( $message_placement, array( 'after', 'submit' ), true ) ) {
	include FrmAppHelper::plugin_path() . '/classes/views/frm-entries/errors.php';
}

$form_action = 'create';
require FrmAppHelper::plugin_path() . '/classes/views/frm-entries/form.php';

if ( $message_placement === 'after' ) {
	include FrmAppHelper::plugin_path() . '/classes/views/frm-entries/errors.php';
}

if ( ! isset( $include_form_tag ) || $include_form_tag ) {
	?>
</form>
<style type="text/css">
	.frm_required_field span {
	    font-size: 12px;
	    color: #B94A48;
	    padding: 0;
	    font-weight: normal;
	    text-align: left;
	    font-style: normal;
	    max-width: 100%;
	    display: block;
	}
	.frm_required_field .frm_required {
		display: initial;
	}
</style>
<?php } else { ?>
</div>
<?php } ?>
</div>
