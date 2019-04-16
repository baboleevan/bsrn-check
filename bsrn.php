/**
	 * 사업자등록번호 유효성 검사
	 *
	 * 사업자등록번호 = 123-45-67890 = 10자리
	 * 123 : 국세청 / 세무서별 코드
	 * 45 : 개인 법인 구분코드
	 * 6789 : 과세/면세/법인 사업자 등록/지정일자 일련번호
	 * 0 : 검증번호
	 *
	 * @param string $bsrn 사업자번호
	 *
	 * @return bool
	 */
	function is_bsrn($bsrn)
	{
		$str_array = str_split(preg_replace('/[^0-9]/', '', (string) $bsrn));
		if (count($str_array) == 10) {
			$str_last = $str_array[9];
			$last = '';
			$sum = 0;
			$arr = [1, 3, 7, 1, 3, 7, 1, 3, 5];
			for ($i = 0; $i < 9; $i++) {
				$tmp = $str_array[ $i ] * $arr[ $i ];
				if ($i < 8) {
					$sum += $tmp;
				}
				else {
					$tmp = (string) $tmp;
					$sum += (int) ($tmp[0]) + (int) (isset($tmp[1]) ? $tmp[1] : 0);

					$last = (10 - ($sum % 10)) % 10;
				}
			}
			return $str_last == $last;
		}
		return FALSE;
	}
