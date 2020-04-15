jQuery(document).ready(function($) {
	$('form.quform').Quform();

	// Tooltip settings
	if ($.isFunction($.fn.qtip)) {
		$('.quform-tooltip').qtip({
			content: {
				text: false
			},
			style: {
				classes: 'quform-tt ui-tooltip ui-tooltip-shadow',
				width: '180px'
			},
			position: {
				my: 'left center',
				at: 'right center'
			}
		});
	}
	
	// Changes subject to a text field when 'Other' is chosen
	var $subjectWrapper = $('.subject-input-wrapper'),
		subjectHtml = $subjectWrapper.html();
	
	$('#subject').live('change', function () {		
		if ($(this).val() == 'Other') {
			$subjectWrapper.html('<input name="subject" type="text" id="subject" value="" />');
			
			$cancelOther = $('<a>').click(function () {
				$subjectWrapper.html(subjectHtml);
				$(this).remove();
				return false;
			}).attr('href', '#').addClass('cancel-button').attr('title', 'Cancel');
			
			$subjectWrapper.append($cancelOther);
		}
	});
	
	// Preload images
	$.preloadImages([
		'quform/images/close.png',
		'quform/images/success.png',
		'quform/images/err.png'
	]);
}); // End document.ready()