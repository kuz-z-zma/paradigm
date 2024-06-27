<form id="commentform" class="form-horizontal" action="#commentform" method="post"<?php echo getCommentformFormAutocompleteAttr(); ?>>
	<input type="hidden" name="comment" value="1" />
	<?php printCommentErrors(); ?>
	<div class="form-group" style="display:none;">
		<label for="username" class="col-sm-3 control-label">Username:</label>
		<div class="col-sm-9">
			<input type="text" id="username" name="username" autocomplete="username" value="" class="form-control" />
		</div>
	</div>

	<?php if (getOption('comment_name_required')) { ?>
		<div class="form-group">
			<label for="name" class="col-sm-3 control-label"><?php printf(gettext_th("Name%s"), getCommentFormRequiredFieldMark('comment_name_required')); ?></label>
		<div class="col-sm-9">
			<input<?php printCommentFormFieldAttributes('comment_name_required', $disabled['name'], 'name'); ?> type="text" id="name" name="name" size="22" value="<?php echo html_encode($stored['name']); ?>" class="form-control" />
		</div>
		</div>
	<?php } ?>

	<?php if (getOption('comment_form_anon') && !$disabled['anon']) { ?>
			<div class="form-group">
				<label for="anon" class="col-sm-3 control-label"> (<?php echo gettext_th("<em>anonymous</em>"); ?>)</label>
		<div class="col-sm-9">
				<input type="checkbox" id="anon" name="anon" value="1"<?php if ($stored['anon']) echo ' checked="checked"'; echo $disabled['anon']; ?> />
		</div>
		</div>
	<?php } ?>

	<?php if (getOption('comment_email_required')) {
		?>
		<div class="form-group">
			<label for="email" class="col-sm-3 control-label"><?php printf(gettext_th("E-Mail%s"), getCommentFormRequiredFieldMark('comment_email_required')); ?></label>
		<div class="col-sm-9">
			<input<?php printCommentFormFieldAttributes('comment_email_required', $disabled['email'], 'email'); ?> type="email" id="email" name="email" size="22" value="<?php echo html_encode($stored['email']); ?>" class="form-control" />
		</div>
		</div>
	<?php } ?>

	<?php if ($req = getOption('comment_web_required')) {
		?>
		<div class="form-group">
			<label for="website" class="col-sm-3 control-label"><?php printf(gettext_th("Website%s"), getCommentFormRequiredFieldMark('comment_web_required')); ?></label>
		<div class="col-sm-9">
			<input<?php printCommentFormFieldAttributes('comment_web_required', $disabled['website'], 'url'); ?> type="url" id="website" name="website" size="22" value="<?php echo html_encode($stored['website']); ?>" class="form-control" />
		</div>
		</div>
	<?php } ?>

	<?php if (getOption('comment_form_addresses')) { ?>
		<div class="form-group">
			<label for="comment_form_street" class="col-sm-3 control-label"><?php printf(gettext_th('Street%s'), getCommentFormRequiredFieldMark('comment_form_addresses')); ?></label>
		<div class="col-sm-9">
			<input<?php printCommentFormFieldAttributes('comment_form_addresses', $disabled['street']); ?> type="text" id="comment_form_street" name="0-comment_form_street"<?php printCommentformAutocompleteAttr('street-address', true); ?> size="22" value="<?php echo html_encode($stored['street']); ?>" class="form-control" />
		</div>
		</div>

		<div class="form-group">
			<label for="comment_form_city" class="col-sm-3 control-label"><?php printf(gettext_th('City%s'), getCommentFormRequiredFieldMark('comment_form_addresses')); ?></label>
		<div class="col-sm-9">
			<input<?php printCommentFormFieldAttributes('comment_form_addresses', $disabled['city']); ?> type="text" id="comment_form_city" name="0-comment_form_city"<?php printCommentformAutocompleteAttr('address-level2', true); ?> size="22" value="<?php echo html_encode($stored['city']); ?>" class="form-control" />
		</div>
		</div>

		<div class="form-group">
			<label for="comment_form_state" class="col-sm-3 control-label"><?php printf(gettext_th('State%s'), getCommentFormRequiredFieldMark('comment_form_addresses')); ?></label>
		<div class="col-sm-9">
			<input<?php printCommentFormFieldAttributes('comment_form_addresses', $disabled['state']); ?> type="text" id="comment_form_state" name="0-comment_form_state"<?php printCommentformAutocompleteAttr('address-level1', true); ?> size="22" value="<?php echo html_encode($stored['state']); ?>" class="form-control" />
		</div>
		</div>

		<div class="form-group">
			<label for="comment_form_country" class="col-sm-3 control-label"><?php printf(gettext_th('Country%s'), getCommentFormRequiredFieldMark('comment_form_addresses')); ?></label>
		<div class="col-sm-9">
			<input<?php printCommentFormFieldAttributes('comment_form_addresses', $disabled['country']); ?> type="text" id="comment_form_country" name="0-comment_form_country"<?php printCommentformAutocompleteAttr('country', true); ?> size="22" value="<?php echo html_encode($stored['country']); ?>" class="form-control" />
		</div>
		</div>

		<div class="form-group">
			<label for="comment_form_postal"><?php printf(gettext_th('Postal code%s'), getCommentFormRequiredFieldMark('comment_form_addresses')); ?></label>
		<div class="col-sm-9">
			<input<?php printCommentFormFieldAttributes('comment_form_addresses', $disabled['postal']); ?> type="text" id="comment_form_postal" name="0-comment_form_postal"<?php printCommentformAutocompleteAttr('postal-code', true); ?> size="22" value="<?php echo html_encode($stored['postal']); ?>" class="form-control" />
		</div>
		</div>
	<?php } ?>

	<?php if ($_zp_captcha->name && commentFormUseCaptcha()) {
		$captcha = $_zp_captcha->getCaptcha(gettext_th("Enter CAPTCHA<strong>*</strong>")); ?>
		<div class="form-group">
			<?php
			if (isset($captcha['html']))
				echo $captcha['html'];
				echo '<div class="col-sm-9">';
			if (isset($captcha['input']))
				echo $captcha['input'];
			if (isset($captcha['hidden']))
				echo $captcha['hidden'];
				echo '</div>';
			?>
		</div>
		<?php } ?>

		<?php if (getOption('comment_form_private') && !$disabled['private']) { ?>
		<div class="form-group">
			<label for="private" class="col-sm-3 control-label"><?php echo gettext_th("Private comment (do not publish)"); ?></label>
		<div class="col-sm-9">
			<input type="checkbox" id="private" name="private" value="1"<?php if ($stored['private']) echo ' checked="checked"'; ?> />
		</div>
		</div>
		<?php } ?>

	<?php if(getOption('comment_form_remember')) { ?>
	<div class="form-group">
		<label for="remember" class="col-sm-3 control-label"><?php echo gettext_th("Remember me"); ?></label>
		<div class="col-sm-9">
			<input type="checkbox" id="remember" name="remember" value="1" />
		</div>
		</div>
	<?php } ?>

	<?php if (getOption('comment_form_dataconfirmation')) { ?>
	<div class="form-group">
		<label for="comment_dataconfirmation"><?php printDataUsageNotice(); echo '<strong>*</strong>'; ?>
			<input type="checkbox" id="comment_dataconfirmation" name="comment_dataconfirmation" value="1"<?php if ($stored['comment_dataconfirmation']) echo ' checked="checked"'; ?> required />
		</label>
	</div>
	<?php } ?>

<div class="form-group"><div class="col-sm-3"></div><div class="col-sm-9"><p><?php echo gettext_th('<strong>*</strong> Required fields'); ?></p></div></div>

	<div class="form-group">
		<label for="comment" class="col-sm-3 control-label"><?php echo gettext_th("Comment"); ?></label>
		<div class="col-sm-9">
			<textarea id="comment" name="comment" rows="6" cols="42" class="textarea_inputbox" <?php if(!getOption('tinymce4_comments')) echo 'required'; ?>><?php
				echo $stored['comment'];
				echo $disabled['comment'];
			?></textarea>
		</div>
	</div>

	<div class="col-sm-9 col-sm-offset-3">
		<input type="submit" class="button buttons" value="<?php echo gettext_th('Add Comment'); ?>" />
	</div>

</form>
