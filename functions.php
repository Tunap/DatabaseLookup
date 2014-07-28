<?php
	function DotPerLen($len){
		$d = "";
		for($i = 0; $i < $len+1; ++$i){
			$d .= "*";
		}
		return $d;
	}
?>