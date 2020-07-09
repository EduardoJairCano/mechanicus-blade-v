<html lang="en">
<head>
    <title>Mensaje recibido</title>
</head>
<body>
    <p><strong>Recibiste un mensaje de: </strong>{{ $msg['name'] . ' - ' . $msg['email'] }} </p>
    <p><strong>Asunto: </strong>{{ $msg['subject'] }}</p>
    <p>{{ $msg['content'] }}</p>
</body>
</html>
