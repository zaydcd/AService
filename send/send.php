
<?php
// Адрес, куда отправлять
$to = "info@avtoservis.ru";

// Достаём данные из формы
$name    = isset($_POST['name'])    ? trim($_POST['name'])    : '';
$phone   = isset($_POST['phone'])   ? trim($_POST['phone'])   : '';
$email   = isset($_POST['email'])   ? trim($_POST['email'])   : '';
$brand   = isset($_POST['brand'])   ? trim($_POST['brand'])   : '';
$service = isset($_POST['service']) ? trim($_POST['service']) : '';
$date    = isset($_POST['date'])    ? trim($_POST['date'])    : '';
$time    = isset($_POST['time'])    ? trim($_POST['time'])    : '';
$comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

// Тема письма
$subject = "Новая заявка с сайта автосервиса";

// Текст письма
$message = "Поступила новая заявка на сервис:\n\n"
         . "Имя: $name\n"
         . "Телефон: $phone\n"
         . "E-mail: $email\n"
         . "Марка авто: $brand\n"
         . "Тип работ: $service\n"
         . "Желаемая дата: $date\n"
         . "Желаемое время: $time\n"
         . "Комментарий: $comment\n";

// Заголовки письма
$headers  = "Content-Type: text/plain; charset=utf-8\r\n";

if (!empty($email)) {
    $headers .= "From: $email\r\n";
}

// Отправка
$ok = mail($to, $subject, $message, $headers);

// Простая реакция для пользователя
if ($ok) {
    echo "Спасибо, ваша заявка отправлена. Мы свяжемся с вами по телефону $phone.";
} else {
    echo "Ошибка при отправке заявки. Попробуйте позже или позвоните по телефону.";
}