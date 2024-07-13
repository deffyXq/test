<!-- save_comment.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    // Сохраняем комментарий в файл comments.txt
    $file = fopen("comments.txt", "a");
    fwrite($file, "Имя: " . htmlspecialchars($name) . "\n");
    fwrite($file, "Комментарий: " . htmlspecialchars($comment) . "\n\n");
    fclose($file);

    // Возвращаем успешный ответ
    echo json_encode(array("status" => "success"));
} else {
    // Возвращаем ошибку
    echo json_encode(array("status" => "error", "message" => "Метод не поддерживается"));
}
?>