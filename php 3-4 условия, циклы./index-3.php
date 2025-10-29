<!-- 3. Сформируйте динамичесткую html страничку, где в начале задается число $n - количество строк ячеек таблицы с какими-то данными.
*сделайте разным фоном четные и нечетные строки. -->
<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        tr,
        td,
        table {
            border: 1px solid;
            border-collapse: collapse;
            padding: 5px;
        }

        tr:nth-child(even) {
            background-color: aquamarine;
        }

        tr:nth-child(odd) {
            background-color: blueviolet;
        }
    </style>

</head>

<body>
    <table>
        <?php $n = 5;
        for ($i = 1; $i <= $n; $i++): ?>
            <tr>
                <td>Строка <?php echo $i; ?></td>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>