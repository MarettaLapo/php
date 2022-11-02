<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo $_POST['name'];
        echo $_POST['email'];
        echo $_POST['year'];
        echo $_POST['sex'];
        echo $_POST['theme'];
        echo $_POST['question'];
        echo $_POST['agree'];
        if(isset($_POST['agree']) && $_POST['agree'] == 'yes') 
        {
            echo "Need wheelchair access.";
        }
        else
        {
            echo "Do not Need wheelchair access.";
        }
    ?>
</body>
</html>