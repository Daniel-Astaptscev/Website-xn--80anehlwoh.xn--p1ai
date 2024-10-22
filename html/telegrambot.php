<?php
// Токен
const TOKEN = '<secret-key>';

// ID чата
const CHATID = '<secret-key>';

// Проверяем была ли отправлена форма
if (!empty($_POST['contact-name']) && !empty($_POST['contact-number'])) {
        // Если не пустые, то валидируем эти поля и сохраняем и добавляем в тело сообщения. Минимально для теста так:
        $txt = "";
        // Имя
        if (isset($_POST['contact-name']) && !empty($_POST['contact-name'])) {
            $name1 = 'Имя клиента: ';
            $FirstName = "<b>".$name1."</b> ";
            $txt .= $FirstName . strip_tags(trim(urlencode($_POST['contact-name']))) . "%0A";
        }
        
        // Номер телефона
        if (isset($_POST['contact-number']) && !empty($_POST['contact-number'])) {
            $phone = 'Контактный телефон: ';
            $Phone = "<b>".$phone."</b> ";
            $txt .= $Phone . "%2B" . strip_tags(trim(urlencode($_POST['contact-number']))) . "%0A";
        }
            
        $textSendStatus = @file_get_contents('https://api.telegram.org/bot'. TOKEN .'/sendMessage?chat_id=' . CHATID . '&parse_mode=html&text=' . $txt);
        
        //redirect to the 'thank you' page
        header("Location: ./index.html");
    }