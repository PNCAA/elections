$(function() {
	$('[data-toggle="tooltip"]').tooltip();

	var limit = 9;
	$('input[type="checkbox"]').on('change', function() {
		if($('input[type="checkbox"]:checked').length >= limit) {
			if($('input[type="checkbox"]:checked').length >= limit + 1) {
				this.checked = false;
				alert('You are allowed to select only ' + limit + ' candidates!');
			}
			$('#vote').removeAttr('disabled').removeClass('btn-default').addClass('btn-success');
		} else {
			$('#vote').attr('disabled', 'disabled');
			$('#vote').removeClass('btn-success').addClass('btn-default');
		}
	});

	$('#vote').click(function(e) {
		var ref = $('form').find("[required]");
		$(ref).each(function() {
			if ($(this).val() == '') {
				alert('All Voter Information fields are required!');
				$(this).focus();
				e.preventDefault();
				return false;
			}
		});
		return true;
	});
});