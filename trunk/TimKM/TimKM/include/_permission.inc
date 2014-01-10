<?php

if (!global_common::isCLogin())
{
	global_common::redirectByScript("Login.php");
}

?>