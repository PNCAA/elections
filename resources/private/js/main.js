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
		var ref = $('form').find('[required]');
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

	if ($('#resultContainer').length > 0) {
		var chart = AmCharts.makeChart('resultContainer',{
			'type': 'serial',
			'theme': 'light',
			'dataProvider': electionData,
			'valueAxes': [{
				'axisAlpha': 0.1,
				'dashLength': 5,
				'position': 'left'
			}],
			'startDuration': 1,
			'graphs': [{
				'balloonText': '<span style="font-size:13px;">[[category]]: <strong>[[value]]</strong></span>',
				'bulletOffset': 10,
				'bulletSize': 50,
				'colorField': 'color',
				'cornerRadiusTop': 4,
				'customBulletField': 'bullet',
				'fillAlphas': 0.9,
				'lineAlpha': 0.2,
				'type': 'column',
				'valueField': 'votes',
				'valueLabels': {
					'boldLabel': true
				}
			}],
			'depth3D': 20,
			'angle': 30,
			'marginTop': 0,
			'marginRight': 0,
			'marginLeft': 0,
			'marginBottom': 0,
			'autoMargins': false,
			'categoryField': 'name',
			'categoryAxis': {
				'axisAlpha': 0,
				'gridAlpha': 0,
				'inside': false,
			}
		});
	}
});