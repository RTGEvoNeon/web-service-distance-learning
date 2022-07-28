<?php

$uploadErrorMessages = [
  'UPLOAD_ERR_INI_SIZE'   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
  'UPLOAD_ERR_FORM_SIZE'  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
  'UPLOAD_ERR_PARTIAL'    => 'Загружаемый файл был получен только частично.',
  'UPLOAD_ERR_NO_FILE'    => 'Файл не был загружен.',
  'UPLOAD_ERR_NO_TMP_DIR' => 'Отсутствует временная папка.',
  'UPLOAD_ERR_CANT_WRITE' => 'Не удалось записать файл на диск.',
  'UPLOAD_ERR_EXTENSION'  => 'PHP-расширение остановило загрузку файла.',
];


// Проверяем что $_FILES есть наш файл
if (isset($_FILES['fl'])) {
  $image = $_FILES['fl'];
  // Получаем нужные элементы массива "fl"
  $tmpFileName = $_FILES['fl']['tmp_name'];
  $uploadErrorCode = $_FILES['fl']['error'];
  $uploadDir = "../files/";

  //Если есть ошибка или файл был загружен не через HTTP POST вернём ошибку
  if ($uploadErrorCode !== UPLOAD_ERR_OK || !is_uploaded_file($tmpFileName)) {
      //Выводим соответствующее $errorCode сообщение об ошибка или "ошибка неизвестна"
      $message = isset($uploadErrorMessages[$uploadErrorCode]) ? $uploadErrorMessages[$uploadErrorCode] : 'При загрузке файла произошла неизвестная ошибка.';
      //Завершаем работу скрипта, выводим сообщение об ошибке
      echo json_encode(['status'=>'error', 'msg'=>$message]);
  } else {
      //Если всё ок, выполняем манипуляции с файлом
      if (move_uploaded_file($_FILES['fl']['tmp_name'], $uploadDir . $_FILES['fl']['name'])) {
        $new_url = 'http://school.ru/student/spisok1.php';
        header('Location: '.$new_url);
      } else {
        echo json_encode(['status'=>'error', 'msg'=>'Ошибка загрузки файла']);
      }
  }
  
}

?>