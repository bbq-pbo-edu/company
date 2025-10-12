<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../tokens/colors.css">
    <link rel="stylesheet" href="../card/card.css">
    <link rel="stylesheet" href="../button/button.css">
    <link rel="stylesheet" href="../../../../index.php">
    <title>Add Employee Modal Demo</title>
</head>
<body>
<dialog id="modal" >
    <div class="card">
        <div class="card__content">
            <div class="card__header">
                <h2 class="card__title">Add Employee</h2>
            </div>
            <div class="card__body">
                <form class="add-employee-form" method="dialog">
                    <button>Close</button>
                </form>
            </div>
        </div>
    </div>
</dialog>
<button onclick="modal.show()">Show Modal</button>
</body>
</html>
