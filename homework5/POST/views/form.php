<!DOCTYPE html>
<html>
<head>
    <title>Поиск новостей</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        .btn {
            margin-top: 10px;
            width:      210px;
            height:     30px;
        }

    </style>
</head>
<body>
<div>
    <form action="index_post.php" method="POST">
        <h3>Введите номер новости</h3>
        <div class="input2">
            <label for="input">
                <span>№</span>
                <input class="input" type="text" name="id" value="" id="input" title="Введите номер новости">
            </label>
        </div>
        <div class="input2">
            <input type="submit" value="Поиск новости" class="btn">
        </div>
    </form>
</div>
</body>
</html>
