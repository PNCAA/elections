$(function() {
	var limit = 5;
	$('input[type="checkbox"]').on('change', function() {
		if($('input[type="checkbox"]:checked').length >= limit) {
			if($('input[type="checkbox"]:checked').length >= limit + 1) {
				this.checked = false;
				alert('You are allowed to select only 5 candidates!');
			}
			$('input[type="submit"]').removeAttr('disabled');
		} else {
			$('input[type="submit"]').attr('disabled', 'disabled');
		}
	});

	// validate form
	$('input[type="submit"]').on('click', function() {
		var fullName = $('input[name="full_name"]').val();
		var major = $('select[name="major"]').val();
		var promotion = $('input[name="promotion"]').val();
		if (fullName === '') {
			$('input[name="full_name"]').parent().parent().addClass('has-error');
			$('input[name="full_name"]').focus();
			return false;
		} else {
			$('input[name="full_name"]').parent().parent().removeClass('has-error');
		}
		if (major === '') {
			$('select[name="major"]').parent().parent().addClass('has-error');
			$('select[name="major"]').focus();
			return false;
		} else {
			$('select[name="major"]').parent().parent().removeClass('has-error');
		}
		if (promotion === '') {
			$('input[name="promotion"]').parent().parent().addClass('has-error');
			$('input[name="promotion"]').focus();
			return false;
		} else {
			$('input[name="promotion"]').parent().parent().removeClass('has-error');
		}
		return true;
	});
});
