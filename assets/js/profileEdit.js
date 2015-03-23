$(document).ready(function() {
	$('edit').click(function() {
		var names = ["fn", "ln"];
		$('.user li').each(function(index) {
			if(index==2) {
				$('.dob select').prop('disabled', false);
			} else {
				$(this).children('a').replaceWith("<input name=\""+names[index]+"\" type='text' value='"+$(this).children('a').text()+"'>");	
			}
		});
		$('.user ').append("<li name=\"pass\"> Password: "+"<input name=\"pswd\" type='password' >"+"</li>");
		$('.user ').append("<li name=\"pass\"> Reconfirm: "+"<input name=\"cpswd\"type='password' >"+"</li>");
		$('edit').hide();
		$('.left-side input').css('display', 'block');
	});
	$('.left-side input').click(function() {
		$('.left-side input').submit();
		$('.user li').each(function(index) {
			if(index==2) {
				$('.dob select').prop('disabled', true);
			} else {
				$(this).children('input').replaceWith("<a>"+$(this).children('input').val()+"</a>");
			}
		});
		$('.user .pass').hide();
		$('.left-side input').hide();
		$('edit').css('display', 'block');
	});
});