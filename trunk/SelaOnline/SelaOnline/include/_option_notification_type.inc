<?php
include_once('class/model_notificationtype.php');

/* TODO: Add code here */
$objNotification = new Model_NotificationType($objConnection);
$arrNotification = $objNotification->getAllNotificationType();
echo '<select id="txtNotificationType">';
foreach($arrNotification as $item)
{
	echo '<option value='.$item['NotificationTypeID'].'>';
	echo $item['NotificationTypeName'];
	echo '</option>';
}
echo '</select>';
?>