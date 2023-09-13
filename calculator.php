<?php

function addNum($x, $y){
    return $x + $y;
}

function subNum($x, $y){
    return $x - $y;
}

function mulNum($x, $y){
    return $x * $y;
}

function divNum($x, $y){
    return $x/$y;
}

function checkRange($x){
    if ($x > 0 && $x < 10) {
        return true;
    } else {
        return false;
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <title>Calculator</title>
</head>
<body style="background-color: #eee">
    <div class="container border p-5 bg-light" style="margin-top: 9%; max-width: 500px">
        <h1>Calculator</h1>
        <form action="<?php $_PHP_SELF ?>" method="post">
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingNum1" name="num1" placeholder="1">
                <label for="floatingInput">Enter 1st number</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingNum2" name="num2" placeholder="2">
                <label for="floatingInput">Enter 2nd number</label>
            </div>
            <div class="form-floating">
                <select name="selectAction" id="selectAction" class="form-select" aria-label="Floating label select example">
                    <option value=""></option>
                    <option value="addNum">Add</option>
                    <option value="subNum">Subtract</option>
                    <option value="mulNum">Multiply</option>
                    <option value="divNum">Divide</option>
                </select>
                <label for="selectAction">Select action:</label>
            </div>
            <input type="submit" value="Calculate" class="btn btn-primary mt-3" id="calcButton" name="calcButton">
        </form>
        <hr>
        <?php
        if (isset($_POST['selectAction'])){
            $selectedAction = $_POST['selectAction'];
            if (isset($_POST['num1']) && isset($_POST['num2']))
                $x = $_POST['num1'];
                $y = $_POST['num2'];
                switch ($selectedAction) {
                    case "addNum":
                        echo "Sum is: " . addNum($x, $y);
                        break;
                    case "subNum":
                        echo "Difference is: " . subNum($x, $y);
                        break;
                    case "mulNum":
                        echo "Product is: " . mulNum($x, $y);
                        break;
                    case "divNum":
                        echo "Quotient is: " . divNum($x, $y);
                        break;
                    default:
                        echo "Please fill out all the fields.";
                }
        }
        ?>
    </div>
</body>
</html>
