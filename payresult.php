<?php
include "../mysqli/class/mysql_crud.php";
//[paymaster]
$LMI_PAYEE_PURSE  = "R";
$LMI_MERCHANT_ID = "****************************";
$LMI_SECRET_KEY  = "****************************";

//NOTIFICATION
if (isset($_GET['paymaster']) AND $_GET['paymaster'] == 'notification') {

//получение запроса Notification
    $LMI_HASH = $_REQUEST['LMI_HASH'];
    $LMI_PAYEE_PURSE = $_REQUEST['LMI_PAYEE_PURSE'];
    $LMI_PAYMENT_AMOUNT = $_REQUEST['LMI_PAYMENT_AMOUNT'];
    $LMI_PAYMENT_NO = $_REQUEST['LMI_PAYMENT_NO'];
    $LMI_SYS_PAYMENT_ID = $_REQUEST['LMI_SYS_PAYMENT_ID'];
    $LMI_MODE = $_REQUEST['LMI_MODE'];
    $LMI_SYS_INVS_NO = $_REQUEST['LMI_SYS_INVS_NO'];
    $LMI_SYS_TRANS_NO = $_REQUEST['LMI_SYS_TRANS_NO'];
    $LMI_SYS_TRANS_DATE = $_REQUEST['LMI_SYS_TRANS_DATE'];
    $LMI_SYS_PAYMENT_DATE = $_REQUEST['LMI_SYS_PAYMENT_DATE'];
    $LMI_PAYER_PURSE = $_REQUEST['LMI_PAYER_PURSE'];
    $LMI_PAYER_WM = $_REQUEST['LMI_PAYER_WM'];
    $LMI_CURRENCY = $_REQUEST['LMI_CURRENCY'];
    $LMI_PAID_AMOUNT = $_REQUEST['LMI_PAID_AMOUNT'];
    $LMI_PAID_CURRENCY = $_REQUEST['LMI_PAID_CURRENCY'];
    $LMI_PAYMENT_SYSTEM = $_REQUEST['LMI_PAYMENT_SYSTEM'];
    $LMI_SIM_MODE = $_REQUEST['LMI_SIM_MODE'];
    $LMI_SIM_MODE = 0;

//кладем данные запроса в БД
    $db = new Database();
    $db->connect();
    $db->sql("INSERT INTO payments VALUES
			('$LMI_PAYMENT_NO','$LMI_HASH', '$LMI_MERCHANT_ID','$LMI_PAYMENT_NO','$LMI_SYS_PAYMENT_ID','$LMI_SYS_PAYMENT_DATE','$LMI_PAYMENT_AMOUNT','$LMI_CURRENCY','$LMI_PAID_AMOUNT','$LMI_PAID_CURRENCY','$LMI_PAYMENT_SYSTEM','$LMI_SIM_MODE','$LMI_SECRET_KEY','" . date("U") . "');");
    $res = $db->getResult();

//генерируем MY_LMI_HASH (11-ть переменных)
    $HASH=$LMI_MERCHANT_ID.";".$LMI_PAYMENT_NO.";".$LMI_SYS_PAYMENT_ID.";".$LMI_SYS_PAYMENT_DATE.";".$LMI_PAYMENT_AMOUNT.";".$LMI_CURRENCY.";".$LMI_PAID_AMOUNT.";".$LMI_PAID_CURRENCY.";".$LMI_PAYMENT_SYSTEM.";".$LMI_SIM_MODE.";".$LMI_SECRET_KEY;

//получаем HASH в кодировке SHA256
    $MY_LMI_HASH = base64_encode(hash('sha256', $HASH, true));

    //обновляем статус ордера на оплачен
    if($LMI_HASH==$MY_LMI_HASH) {
        $db2 = new Database();
        $db2->connect();
        $db2->sql("UPDATE orders SET orders.state='Оплачен' WHERE orders.orderid='" . $LMI_PAYMENT_NO . "'");
        $res2 = $db2->getResult();
        }
        exit;
}

//SUCCESS
else if (isset($_GET['paymaster']) AND $_GET['paymaster'] == 'success') {
print "Ваш заказ №".$_GET['LMI_PAYMENT_NO']." успешно оплачен.";
}

//FAILURE
else if (isset($_GET['paymaster']) AND $_GET['paymaster'] == 'failure') {
print "Оплата не произведена.";
}

?>