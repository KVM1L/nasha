<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Сообщение с сайта</title>
</head>

<body>
    <h2>Новое сообщение с формы контактов:</h2>

    <p><strong>Имя:</strong> {{ $formData['name'] ?? 'Не указано' }}</p>
    <p><strong>Email:</strong> {{ $formData['email'] ?? 'Не указано' }}</p>
    <p><strong>Сообщение:</strong> {{ $formData['message'] ?? 'Пусто' }}</p>
</body>

</html>
