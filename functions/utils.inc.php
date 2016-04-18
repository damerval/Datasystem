<?php

if (!function_exists("strFix")) {
	function strFix($str) {
		if ($str != "") {
			$str = " " . $str . " ";
		}
		return $str;
	}
}

if (!function_exists("commAppend")) {
	function commAppend($str1, $str2) {
		if ($str2 != '') {
			if ($str1 != '') {
				return $str1 . ', ' . $str2;
			} else {
				return $str2;
			}
		} else {
			return $str1;
		}
	}
}

