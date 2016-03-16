<?php
/**
 * Created by PhpStorm.
 * User: olegaliullov
 * Date: 16.03.16
 * Time: 17:53
 * Генерация ордера
 * Используется билиотека mysqli
 * Необходимо настроить доступ к БД, указав параметры доступа в файле
 */
setlocale(LC_ALL, 'ru_RU.utf8');
include "/mysqli/class/mysql_crud.php";

//создание ордера
$db=new Database();
$db->connect();
$db->sql("INSERT INTO orders VALUES
			(NULL,'Создан', NULL);");
$res3 = $db->getResult();
//var_dump($res3);
//$lid = $db->myconn->insert_id;
$db->disconnect();

$db2=new Database();
$db2->connect();
$db2->sql("SELECT MAX(orderid) as lid FROM orders;");
$res4 = $db2->getResult();
$db2->disconnect();
//print_r($res4);
$lid=$res4[0]['lid'];
//print $lid;

$LMI_PAYMENT_NO = $lid;
$LMI_PAYEE_PURSE  = "R";
$LMI_MERCHANT_ID = "********************************************";
$LMI_SECRET_KEY  = "********************************************";
$inv_desc = "Оплата заказа №$lid";
$out_summ = 1.00;

//формирование URLs
$url = ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'];
$success_url = "$url/index.php?item=payresult&paymaster=success&LMI_PAYMENT_NO=" . $LMI_PAYMENT_NO . '&payment=paymaster';
$fail_url = "$url/index.php?item=payresult&paymaster=failure";

//формирование формы
$disp = "
<div align='center'>
<p>Заказ</p>
<form id=pay name=pay method='POST' action='https://paymaster.ru/Payment/Init' name='pay'>
        <input type=hidden name=LMI_MERCHANT_ID value='$LMI_MERCHANT_ID'>
		<label for='amount'>Сумма:</p><input id='amount' class=form-control type=text name=LMI_PAYMENT_AMOUNT value='$out_summ'>
		<label for='payno'>Номер заказа:</label><input id='payno' class=form-control type=text name=LMI_PAYMENT_NO value='$LMI_PAYMENT_NO'>
		<label for='desc'>Описание заказа:</p><input id='desc' class=form-control type=text name=LMI_PAYMENT_DESC value='$inv_desc'>
		<input type=hidden name=LMI_PAYEE_PURSE value='$LMI_PAYEE_PURSE'>
		<input type=hidden name=LMI_SIM_MODE value='0'>
		<input type=hidden name=LMI_SUCCESS_URL value='$success_url'>
		<a class='btn btn-primary btn-lg btn-block' href='javascript:pay.submit();' role=button>Оплатить</a>
	</form>
</div>";

print $disp;

?>