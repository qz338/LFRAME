<?php
function get($key, $default = "") {
	return isset($_GET[$key]) ? $_GET[$key] : $default;
}
?>