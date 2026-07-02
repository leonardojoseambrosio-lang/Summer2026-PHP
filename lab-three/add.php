<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <?php
            require_once('crud.php');
            require_once (valide.php);

            $crud = new crud();
            $valid = new validate();
            if(isset($_POST['Submit'])){
                //Clean up our data
                $name = $crud->escape_string($POST['name']);
                $age = $crud->escape_string($_POST['age']);
                $email = $crud->escape_string($_POST['email']);

                //validate our fields
                $msg = $valid->checkEmpty($_POST, array('name','age','email'));
                $checkAge = $valid->validAge($_POST['age']);
                $checkEmail = $valid->validEmail($_POST['email']);

                if($msg != null){
                    echo "<p>$msg</p>";
                    echo "<a href='javascript:self.history.back();'>Go Back</a>";
                }elseif(!$checkAge){
                    echo "<p>Must provide a valid age</p>";
                }elseif(!$checkEmail){
                    echo "<p>Email must contain an @</p>";
                }else{
                    $result = $crud->execute("INSERT INTO week8phpusers(name,age,email) VALUES('$name', '$age', '$email')");
                    echo "<p>Record Created</p>";
                    echo "<a href='index.php'>Go Home</a>";
                }
            }
        ?>
    </main>
</body>
</html>