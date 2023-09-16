<?php
session_start();
$_SESSION['errorMsg'] = "<div class='alert alert-danger fade show' role='alert'> Please fill out all the fields. </div>";
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
    if ($x >= 0 && $x <= 10) {
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
    <script src="./js/ajax.js"></script>
    <title>Calculator</title>
</head>
<body style="background-color: #eee">
    <div class="container border p-5 bg-light" style="margin-top: 9%; max-width: 500px">
        <h1 class="h1 text-center pb-3">Calculator</h1>
        <p class="small">Enter numbers from 1-10</p>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
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
            if (isset($_POST['num1']) && isset($_POST['num2'])) {
                $x = $_POST['num1'];
                $y = $_POST['num2'];
                $status = (checkRange($x)) ? "in range" : "not in range";
                $status = (checkRange($y)) ? "in range" : "not in range";

                if (!empty($x) && !empty($y)) {
                    switch ($selectedAction) {
                        case "addNum":
                            echo "<div class='alert alert-success fade show' role='alert'> Sum of $x and $y is " . addNum($x, $y);
                            if ($x > 0 && $x < 10) {
                                echo "<br>$x is $status and $y is $status.</div>";
                            } else {
                                echo "<br>$x is $status and $y is $status.</div>";
                            }
                            unset($_SESSION['errorMsg']);
                            break;
                        case "subNum":
                            echo "<div class='alert alert-success fade show' role='alert'> Difference of $x and $y is " . subNum($x, $y);
                            if ($x > 0 && $x < 10) {
                                echo "<br>$x is $status and $y is $status.</div>";
                            } else {
                                echo "<br>$x is $status and $y is $status.</div>";
                            }
                            unset($_SESSION['errorMsg']);
                            break;
                        case "mulNum":
                            echo "<div class='alert alert-success fade show' role='alert'> Product of $x and $y is " . mulNum($x, $y);
                            if ($x > 0 && $x < 10) {
                                echo "<br>$x is $status and $y is $status.</div>";
                            } else {
                                echo "<br>$x is $status and $y is $status.</div>";
                            }
                            unset($_SESSION['errorMsg']);
                            break;
                        case "divNum":
                            echo "<div class='alert alert-success fade show' role='alert'> Quotient of $x and $y is " . divNum($x, $y);
                            if ($x > 0 && $x < 10) {
                                echo "<br>$x is $status and $y is $status.</div>";
                            } else {
                                echo "<br>$x is $status and $y is $status.</div>";
                            }
                            unset($_SESSION['errorMsg']);
                            break;
                        default:
                            echo $_SESSION['errorMsg'];
                    }
                } else {
                    echo $_SESSION['errorMsg'];
                }
            }
        }
        ?>
    </div>
</body>
</html>
