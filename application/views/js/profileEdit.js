$(document).ready(function() {
	$('edit').click(function() {
		var names = ['fn', 'ln'];
		$('.user li').each(function(index) {
			if(index==2) {
				$('.dob select').prop('disabled', false);
			} else {
				$(this).children('a').replaceWith("<input class=\""+names[index]+"\" type='text' value='"+$(this).children('a').text()+"'>");	
			}
		});
		$('.user ').append("<li class=\"pass\"> Password: "+"<input class=\"pswd\" type='text' value='"+"password"+"'>"+"</li>");
		$('.user ').append("<li class=\"pass\"> Reconfirm: "+"<input class=\"cpswd\"type='text' value='"+"password"+"'>"+"</li>");

		$('edit').hide();
		$('done').css('display', 'block');
	});
	$('done').click(function() {
		$('.user li').each(function(index) {
			if(index==2) {
			
				$('.dob select').prop('disabled', true);
			} else {
				$(this).children('input').replaceWith("<a>"+$(this).children('input').val()+"</a>");
			}
		});
		$('.user .pass').hide();
		$('done').hide();
		$('edit').css('display', 'block');
	});

});
