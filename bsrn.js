	var checkCSRN = function(v) {
		v = v.replace(/-/gi, '');
		var nv = String(v), ts = 0, dg = 0, len = v.length, n = 1, i = 0, j = 0;
		if (len == 13) {
			for(; n < len; n++) {
				i = n % 2;
				j = 0;
				if (i === 1) j = 1;
				else if (i === 0) j = 2;
				ts = ts + parseInt(nv.substring(n - 1, n), 10) * j;
			}
			dg = ts % 10;
			if (dg !== 0) dg = 10 - dg;
			return nv.substring(12, 13) === String(dg);
		}
		return false;
	};
