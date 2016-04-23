$(function() {
	function changeSection(section) {
		section = section.replace(/^#/, '');
		if ($('.content[data-name="' + section + '"]').size() == 0) {
			console.log(section);
			return;
		}

		$('.navbar a.active').removeClass('active');
		$('.navbar a[href="#' + section + '"]').addClass('active');

		$('.content.active').fadeOut(500, function() {
			$(this).removeClass('active');
			$('.content[data-name="' + section + '"]').fadeIn().addClass('active');
		});
		window.location.hash = section;
	}

	$('.navbar a').click(function() {
		changeSection($(this).attr('href'));
	});

	window.onhashchange = function() {
		changeSection(window.location.hash);
	};

	changeSection(window.location.hash);
});