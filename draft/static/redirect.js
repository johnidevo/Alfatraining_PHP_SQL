'use strict';

var redirect = {
	on: {
		load: function() {
			location.href = router.redirect;
		}
	}
};

