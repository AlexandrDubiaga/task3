<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>task3</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
    <table class="table table-bordered">
        <tr>
            <td width="200">Read from file</td>
            <td>
            <?php
                foreach ($data as $val)
                {
                    echo $val."<br>";
                }
            ?>
            </td>
        </tr>
        <tr>
            <td>Get string from file by number string</td>
            <td>
                <?php
                echo $getStringFromFile;
                ?>
            </td>
        </tr>
        <tr>
            <td>Get letter from file by string number and letter number</td>
            <td>
                <?php
                echo $getCurrentDigit;
                ?>
            </td>
        </tr>
        <tr>
            <td>Change string in file by here number</td>
            <td>
                <?php
                foreach ($stringChange as $val)
                {
                    echo $val."<br>";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>Change symbol in string  by here number and simvol number</td>
            <td>
                <?php
                foreach ($symbolChange as $val)
                {
                    echo $val."<br>";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>Read from file by string</td>
            <td>
                <?php
                foreach ($showFileByString as $val)
                {
                    echo $val."<br>";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>Read from file by digit</td>
            <td>
                <?php
                foreach ($showFileByDigits as $val)
                {
                   foreach($val as $it)
                    {
                        echo $it;
                    }
                }
                ?>
            </td>
        </tr>
    </table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
