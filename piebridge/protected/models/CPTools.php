<?php
class CPTools{
	public static function convetARToList($ar_arr, array $tmpl)
	{
		$rnt = array();

		if (is_array($ar_arr))
		{
			foreach ($ar_arr as $i => $ar)
			{
				foreach ($tmpl as $k)
					$rnt[$i][$k] = isset($ar->{$k}) ? $ar->{$k} : '';
			}
		}
		elseif ($ar_arr instanceof ActiveRecordInterface)
		{
			return self::convetARToArray($ar, $tmpl);
		}

		return $rnt;
	}

	public static function getCookie($k)
	{
		return isset($_COOKIE[$k]) ? $_COOKIE[$k] : null;
	}


}