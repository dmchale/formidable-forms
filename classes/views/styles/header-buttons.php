<?php if ( isset( $delete_link ) ) { ?>
	<a href="<?php echo esc_url( $delete_link ); ?>" id="frm_delete_style" class="submitdelete deletion alignright" data-frmverify="<?php esc_attr_e( 'Permanently delete this style?', 'formidable' ); ?>">
		<i class="frm_icon_font frm_delete_icon"></i>
	</a>
<?php } ?>

<input type="submit" id="save_menu_header" class="button button-primary frm-button-primary menu-save" value="<?php esc_attr_e( 'Update', 'formidable' ); ?>"  />
<a href="#" class="button button-secondary frm-button-secondary" id="frm_reset_style" data-resetstyle="1" data-frmverify="<?php esc_attr_e( 'Do you really want to reset this style back to the default? ', 'formidable' ); ?>">
	<?php esc_attr_e( 'Reset', 'formidable' ); ?>
</a>
