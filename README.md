 * API PayMaster для приема платежей на сайте без CMS
 * В БД, необходимо выполнить orders.sql, payments.sql.
 * В файле payresult.php - обработчике событий (notification, success и failure) 
 * необходимо указать параметры PayMaster.
 * pay_online.php -  генерация ордера
 * Расположите файл генерации ордера и обработчика событий в корне сайта или по Вашему усмотрению.
 * Используется билиотека mysqli
 * Необходимо настроить доступ к БД, указав параметры доступа в файле /mysqli/class/mysql_crud.php

 
 
 Параметры, необходимые в обоих скриптах:
 
  * $LMI_SECRET_KEY 
  * $LMI_MERCHANT_ID

 
 Параметры, необходимые для приема платежей:
 
 * NOTIFICATION
 * http://yousite.com/index.php?item=payresult&payment=notification
 
 * SUCCESS
 * http://yousite.com/index.php?item=payresult&payment=success

 * FAILURE
 * http://yousite.com/index.php?item=payresult&payment=failure

 Вы можете расширить набор параметров добавив в запросы свои,
 например: &LMI_PAYMENT_NO=" . $LMI_PAYMENT_NO . '&payment=paymaster'
 чтобы сделать более гибкой обработку событий!
 
 
 Параметры, необходимые для создания ордера:
 
 * $inv_desc
 * $out_summ
 
 
  * Мира Вашему дому и побольше транзакций Вашему сайту!
  rashidovich
__________________________________________________________________________________________________  # paymaster-plain-site
