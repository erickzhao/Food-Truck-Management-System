<?php
class InputValidator{
	public static function validate_input($data){
		$data = trim($data);
		$data = striplslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
}
?>