$(document).ready(function() {
	$('.start').click(function() {
		$('#first').fadeTo('slow', '0', function() {
			$('#first').hide();
			$('#second').show();
			$('#second').animate({ opacity: '0.9'});
			$('html, body').animate({ scrollTop: $('#second').offset().top-100}, 2000);
		});
	});

	$('.catList li').click(function() {
		$('.project').append($(this).clone());
		$('#second').fadeTo('slow', '0', function() {
			$('#second').hide();
			$('#third').show();
			$('#third').animate({ opacity: '0.9'});
			$('html, body').animate({ scrollTop: $('#third').offset().top-100}, 2000);
		});
	});
	$('#third input').focus(function() {
		$(this).next('rspan').animate({ opacity: '1'});
	});
	$('#third input').focusout(function() {
		$(this).next('rspan').fadeTo('slow', '0.5', function() {
			$('rspan').css('display', 'none');
			$('rspan').next('confirm').css('display', 'inline-block');
		});
	});
	$('#third confirm').click(function() {
		$('#third').fadeTo('slow', '0', function() {
			$('#third').hide();
			$('.project').append(("<li><a>"+$('#third input').val()+"</a></li>"));
			$('#fourth').show();
			$('#fourth').animate({ opacity: '0.9'});
			$('html, body').animate({ scrollTop: $('#fourth').offset().top-100}, 2000);
		});
	});
	$('#fourth confirm').click(function() {
		$('#fourth').fadeTo('slow', '0', function() {
			$('#fourth').hide();
			$('.project').append(("<li><a>"+$('#fourth input').val()+"</a></li>"));
			$('#fifth').show();
			$('#fifth').animate({ opacity: '0.9'});
			$('html, body').animate({ scrollTop: $('#fifth').offset().top-100}, 2000);

		});
	});
	$('#fifth confirm').click(function() {
		$('#fifth').fadeTo('slow', '0', function() {
			$('#fifth').hide();
			$('.project').append(("<li><a>"+"$"+$('#fifth input').val()+"</a></li>"));
			$('#sixth').show();
			$('#sixth').animate({ opacity: '0.9'});
			$('html, body').animate({ scrollTop: $('#sixth').offset().top-100}, 2000);

		});
	});

});
	