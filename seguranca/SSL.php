<?php
	if (!isset($_SERVER['HTTPS'])) {
		$new_url = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		header("Location: $new_url");
    }
?>