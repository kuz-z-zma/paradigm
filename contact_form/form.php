<?php
/**
 * Form for contact_form plugin
 *
 * @package plugins
 */
?>
<form id="mailform" action="<?php echo html_encode(getRequestURI()); ?>" method="post" accept-charset="UTF-8"<?php echo contactForm::getFormAutocompleteAttr(); ?> class="form-horizontal" role="form">
<input type="hidden" id="sendmail" name="sendmail" value="sendmail" />

<?php if (contactForm::isVisibleField('contactform_title')) { ?>
<div class="form-group">
<label for="title" class="col-sm-3 control-label"><?php printf(gettext("Title%s"), contactform::getRequiredFieldMark('contactform_title')); ?></label>
<div class="col-sm-9">
<input type="text" id="title" name="title"<?php contactForm::printAutocompleteAttr('honorific-prefix'); ?> size="22" class="form-control" value="<?php echo html_encode($mailcontent['title']); ?>"<?php contactForm::printAttributes('contactform_title'); ?> />
</div>
</div>
<?php } ?>

<?php if (contactForm::isVisibleField('contactform_name')) { ?>
<div class="form-group">
<label for="name" class="col-sm-3 control-label"><?php printf(gettext("Name%s"), contactform::getRequiredFieldMark('contactform_name')); ?></label>
<div class="col-sm-9">
<input type="text" id="name" name="name"<?php contactForm::printAutocompleteAttr('name'); ?> size="22" class="form-control" value="<?php echo html_encode($mailcontent['name']); ?>"<?php contactForm::printAttributes('contactform_name'); ?> />
</div>
</div>
<?php } ?>

<div class="form-group" style="display:none;">
<label for="username" class="col-sm-3 control-label"><?php echo gettext('Username:'); ?></label>
<div class="col-sm-9">
<input type="text" id="username" name="username"<?php contactForm::printAutocompleteAttr('username'); ?> size="22" class="form-control" value="<?php echo html_encode($mailcontent['honeypot']); ?>"<?php echo contactform::getProcessedFieldDisabledAttr(); ?> />
</div>
</div>

<?php if (contactForm::isVisibleField('contactform_company')) { ?>
<div class="form-group">
<label for="company" class="col-sm-3 control-label"><?php printf(gettext("Company%s"), contactform::getRequiredFieldMark('contactform_company')); ?></label>
<div class="col-sm-9">
<input type="text" id="company" name="company"<?php contactForm::printAutocompleteAttr('organization'); ?> size="22" class="form-control" value="<?php echo html_encode($mailcontent['company']); ?>"<?php contactForm::printAttributes('contactform_company'); ?> />
</div>
</div>
<?php } ?>

<?php if (contactForm::isVisibleField('contactform_street')) { ?>
<div class="form-group">
<label for="street" class="col-sm-3 control-label"><?php printf(gettext("Street%s"), contactform::getRequiredFieldMark('contactform_street')); ?></label>
<div class="col-sm-9">
<input type="text" id="street" name="street"<?php contactForm::printAutocompleteAttr('street-address'); ?> size="22" class="form-control" value="<?php echo html_encode($mailcontent['street']); ?>"<?php contactForm::printAttributes('contactform_street'); ?> />
</div>
</div>
<?php } ?>

<?php if (contactForm::isVisibleField('contactform_city')) { ?>
<div class="form-group">
<label for="city" class="col-sm-3 control-label"><?php printf(gettext("City%s"), contactform::getRequiredFieldMark('contactform_city')); ?></label>
<div class="col-sm-9">
<input type="text" id="city" name="city"<?php contactForm::printAutocompleteAttr('address-level2'); ?> size="22" class="form-control" value="<?php echo html_encode($mailcontent['city']); ?>"<?php contactForm::printAttributes('contactform_city'); ?> />
</div>
</div>
<?php } ?>

<?php if (contactForm::isVisibleField('contactform_state')) { ?>
<div class="form-group">
<label for="state" class="col-sm-3 control-label"><?php printf(gettext("State%s"), contactform::getRequiredFieldMark('contactform_state')); ?></label>
<div class="col-sm-9">
<input type="text" id="state" name="state"<?php contactForm::printAutocompleteAttr('address-level1'); ?> size="22" class="form-control" value="<?php echo html_encode($mailcontent['city']); ?>"<?php contactForm::printAttributes('contactform_state'); ?> />
</div>
</div>
<?php } ?>

<?php if (contactForm::isVisibleField('contactform_country')) { ?>
<div class="form-group">
<label for="country" class="col-sm-3 control-label"><?php printf(gettext("Country%s"), contactform::getRequiredFieldMark('contactform_country')); ?></label>
<div class="col-sm-9">
<input type="text" id="country" name="country"<?php contactForm::printAutocompleteAttr('country'); ?> size="22" class="form-control" value="<?php echo html_encode($mailcontent['country']); ?>"<?php contactForm::printAttributes('contactform_country'); ?> />
</div>
</div>
<?php } ?>

<?php if (contactForm::isVisibleField('contactform_postal')) { ?>
<div class="form-group">
<label for="postal" class="col-sm-3 control-label"><?php printf(gettext("Postal code%s"), contactform::getRequiredFieldMark('contactform_postal')); ?></label>
<div class="col-sm-9">
<input type="text" id="postal" name="postal"<?php contactForm::printAutocompleteAttr('postal-code'); ?> size="22" class="form-control" value="<?php echo html_encode($mailcontent['postal']); ?>"<?php contactForm::printAttributes('contactform_postal'); ?> />
</div>
</div>
<?php } ?>

<?php if (contactForm::isVisibleField('contactform_email')) { ?>
<div class="form-group">
<label for="email" class="col-sm-3 control-label"><?php printf(gettext("E-Mail%s"), contactform::getRequiredFieldMark('contactform_email')); ?></label>
<div class="col-sm-9">
<input type="email" id="email" name="email" <?php contactForm::printAutocompleteAttr('email'); ?> size="22" class="form-control" value="<?php echo html_encode($mailcontent['email']); ?>"<?php contactForm::printAttributes('contactform_email'); ?> />
</div>
</div>
<?php } ?>

<?php if (contactForm::isVisibleField('contactform_website')) { ?>
<div class="form-group">
<label for="website" class="col-sm-3 control-label"><?php printf(gettext("Website%s"), contactform::getRequiredFieldMark('contactform_website')); ?></label>
<div class="col-sm-9">
<input type="text" id="website" name="website"<?php contactForm::printAutocompleteAttr('url'); ?> size="22" class="form-control" value="<?php echo html_encode($mailcontent['website']); ?>"<?php contactForm::printAttributes('contactform_website'); ?> />
</div>
</div>
<?php } ?>

<?php if (contactForm::isVisibleField('contactform_phone')) { ?>
<div class="form-group">
<label for="phone" class="col-sm-3 control-label"><?php printf(gettext("Phone%s"), contactform::getRequiredFieldMark('contactform_phone')); ?></label>
<div class="col-sm-9">
<input type="tel" id="phone" name="phone"<?php contactForm::printAutocompleteAttr('tel'); ?> size="22" class="form-control" value="<?php echo html_encode($mailcontent['phone']); ?>"<?php contactForm::printAttributes('contactform_phone'); ?> />
</div>
</div>
<?php } ?>

<?php if ($_zp_captcha->name && getOption("contactform_captcha") && !contactForm::isProcessingPost()) {
		$captcha = $_zp_captcha->getCaptcha(gettext("Enter CAPTCHA<strong>*</strong>")); ?>
<div class="form-group">
<?php
if (isset($captcha['html']))
echo $captcha['html'];
echo '<div class="col-sm-9">';
if (isset($captcha['input']))
echo $captcha['input'];
if (isset($captcha['hidden']))
echo $captcha['hidden'];
echo '</div>'; ?>
</div>
<?php } ?>

<div class="form-group">
<label for="subject" class="col-sm-3 control-label"><?php echo gettext("Subject<strong>*</strong>"); ?></label>
<div class="col-sm-9">
<input type="text" id="subject" name="subject" size="22" class="form-control" value="<?php echo html_encode($mailcontent['subject']); ?>"<?php echo contactForm::getProcessedFieldDisabledAttr(); ?> required />
</div>
</div>

<div class="mailmessage form-group">
<label for="message" class="col-sm-3 control-label"><?php echo gettext("Message<strong>*</strong>"); ?></label>
<div class="col-sm-9">
<textarea id="message" name="message" rows="6" cols="42" class="form-control" <?php echo contactform::getProcessedFieldDisabledAttr(); ?> required><?php echo $mailcontent['message']; ?></textarea>
</div>
</div>

	<?php 
	if(getOption('contactform_dataconfirmation')) { 
		$dataconfirmation_checked = '';
		if(!empty($mailcontent['dataconfirmation'])) {
			$dataconfirmation_checked = ' checked="checked"';
		} 
		?>
		<p>
			<label for="dataconfirmation">
				<input type="checkbox" id="dataconfirmation" name="dataconfirmation" value="1"<?php echo $dataconfirmation_checked; contactForm::getProcessedFieldDisabledAttr(); ?> required>
				<?php printDataUsageNotice(); echo '<strong>*</strong>'; ?>
			</label>
		</p>
	<?php } ?>

<?php if (!contactForm::isProcessingPost()) { ?>
<div class="col-sm-9 col-sm-offset-3">
<input type="submit" class="button buttons" value="<?php echo gettext("Send e-mail"); ?>" />
<input type="reset" class="button buttons" value="<?php echo gettext("Reset"); ?>" />
</div>
<?php } ?>
</form>