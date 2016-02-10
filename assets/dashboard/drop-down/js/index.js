$(document).ready(function() {
	var triggerOpen		= $('#input');
	var triggerClose 	= $('#dropdown-menu').find('li');
	var marka 			= $('#icon');

	// set initial Marka icon
	var m = new Marka('#icon');
	m.set('triangle').size(10);
	m.rotate('down');

	// trigger dropdown
    triggerOpen.add(marka).on('click', function(e) {
		e.preventDefault();
		$('#dropdown-menu').add(triggerOpen).toggleClass('open');


		if($('#icon').hasClass("marka-icon-times")) {
			m.set('triangle').size(10);
		} else {
			m.set('times').size(15);
		}
	});

	triggerClose.on('click', function() {
		// set new placeholder for demo
		var options = $(this).find('a').html();
		triggerOpen.text(options);

		$('#dropdown-menu').add(triggerOpen).toggleClass('open');
		m.set('triangle').size(10);
	});

});