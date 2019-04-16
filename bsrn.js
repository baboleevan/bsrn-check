	var is_bsrn = function(v) {
		v = String(v).replace(/-/gi, '');
		if (v.length == 10) {
			var sum = 0, arr = [1, 3, 7, 1, 3, 7, 1, 3, 5], tmp, last = v.charAt(9), _last;
			for(var i=0; i < 9; i++) {
				tmp = arr[i] * v[i];
				if (i < 8) {
					sum += tmp;
				}
				else {
					sum += Number(String(tmp).charAt(0)) + Number(String(tmp).charAt(1));
					_last = (10 - (sum % 10)) % 10;
				}
			}
			return _last == last;
		}
		return false;
	};
