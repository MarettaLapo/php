<?php
    require "..\\site_php\\inc\\config.form.php"; 

    if(isset($_COOKIE['name'])){
        $name = $_COOKIE['name'];
    }
    else{
        $name = "";
    }

    if(isset($_COOKIE['email'])){
        $email = $_COOKIE['email'];
    }
    else{
        $email = "";
    }

    if(isset($_COOKIE['year'])){
        $year = $_COOKIE['year'];
    }
    else{
        $year = "";
    }

    if(isset($_COOKIE['sex'])){
        $sex = $_COOKIE['sex'];
    }
    else{
        $sex = "";
    }
    $theme = $question = "";
    $name_err = $email_err = $year_err = $sex_err = $theme_err = $question_err = $agree_err = "";
    $result = "";
    
    $pattern_name = '/^[a-zA-Z]|[А-ЯЁа-яё]*$/';
    $pattern_text = '/^[А-ЯЁ]|[а-яё]|[a-z]|[A-Z]|[0-9]*\.*\!*\?*\,*\(*\)*$/';
    $pattern_mail = "/^[a-z]|[A-Z]|[0-9]|[_.+-]+@[a-z]|[A-Z]|[0-9-]+\.[a-z]|[A-Z]|[0-9]|[-.]+$/";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($_POST['name'])){
            $name_err = "Пожалуйста, введите имя";
        }
        else{
            $name = clearStr($_POST['name']);
            if(!preg_match($pattern_name, $name)){
                $name_err = "Допустимы только буквы русского и английского алфавита";
            }
        }

        if(empty($_POST['email'])){
            $email_err = "Пожалуйста, введите адрес электронной почты";
        }
        else{
            $email = clearStr($_POST['email']);
            if(!preg_match($pattern_name, $email)){
                $email_err = "Введите адрес электронной почты вида: google@goo.go";
            }
        }

        if($_POST['year']=="Год"){
            $year_err = "Пожалуйста, выберите ваш год рождения";
        }
        else{
            $year = clearInt($_POST['year']);
        }

        if(empty($_POST['sex'])){
            $sex_err = "Пожалуйста, выберите ваш пол";
        }
        else{
            $sex = clearStr($_POST['sex']);
        }

        if(empty($_POST['theme'])){
            $theme_err = "Пожалуйста, введите тему обращения";
        }
        else{
            $theme = clearStr($_POST['theme']);
            if(!preg_match($pattern_text, $theme)){
                $theme_err = "Допустимы буквы русского и английского алфавита, а так специальные знаки: . , ? ! ( )";
            }
        }

        if(empty($_POST['question'])){
            $question_err = "Пожалуйста, введите суть вопроса обращения";
        }
        else{
            $question = clearStr($_POST['question']);
            if(!preg_match($pattern_text, $question)){
                $question_err = "Допустимы буквы русского и английского алфавита, а так специальные знаки: . , ? ! ( )";
            }
        }
        if(empty($_POST['agree'])){
            $agree_err = "Пожалуйста, согласитесь с условиями контракта";
        }
        
        if(empty($name_err) && empty($email_err) && empty($year_err) 
        && empty($sex_err) && empty($theme_err) && empty($question_err) && empty($agree_err)){
            if(!addForm($name, $email, $year, $sex, $theme, $question)){
                $result = "Не удалось отправить форму";
            }
            else{
                $result = "Форма успешно отправлена";
                setcookie('name', $name);   
                setcookie('email', $email);
                setcookie('year', $year);
                setcookie('sex', $sex);
            }
        }
        else{
            $result = "Заполните обязательные поля";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css\form_css.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <title>Форма авторизации</title>
</head>
<body>
    <div class="form_wrap">
        <div class="form_position">
            <p>Форма обратной связи</p>
            <form action="form.php" method="post">
                <div class="input">
                    <div class="user">
                        <label>имя</label><br>
                        <input type="text" name="name" value="<?php echo $name;?>"><br>
                        <div class="err"><?php echo $name_err;?></div>
                    </div>
                    <div class="user"> 
                        <label>e-mail</label><br>
                        <input type="text" name="email" value="<?php echo $email;?>"><br>
                        <div class="err"><?php echo $email_err;?></div>    
                    </div>
                    <div class="user"> 
                        <label>год рождения</label><br>
                        <select name="year">
                            <option selected>Год</option>
                                <?php
                                    for ($i = 1980; $i <= 2014; $i++){
                                ?>
                                        <option value="<?php echo $i;?>" <?php if ($year == $i) echo "selected=\"selected\""; ?>>
                                        <?php echo $i;?></option> 
                                <?php
                                    }
                                ?>
                        </select>  
                        <div class="err"><?php echo $year_err;?></div> 
                    </div>
                    <div class="input__radio"> 
                        <label>пол</label><br>
                            <input type="radio" id="female" name="sex" value="female" <?php if ($sex == 'female') echo "checked=\"checked\""; ?>>
                            <label for="female">Женский</label>  
                            <input type="radio" id="male" name="sex" value="male" <?php if ($sex == 'male') echo "checked=\"checked\""; ?>>
                            <label for="male">Мужской</label>
                        <div class="err"><?php echo $sex_err;?></div>
                    </div>
                    <div class="user"> 
                        <label>тема обращения</label><br>
                        <input type="text" name="theme" value="<?php echo $theme;?>"><br>  
                        <div class="err"><?php echo $theme_err;?></div>  
                    </div>
                    <div class="user"> 
                        <label>Суть вопроса</label><br>
                        <textarea rows="5" cols="50" name="question"><?php echo $question?></textarea>
                        <div class="err"><?php echo $question_err;?></div>
                    </div>
                    <div class="user__check"> 
                        <label for="agree">с контрактом ознакомлен</label>
                        <input type="checkbox" id="agree" name="agree" value="1">
                        <div class="err"><?php echo $agree_err;?></div>
                    </div>
                </div>
                <div class="sub">
                    <input type="submit" name="submit" value="Отправить">
                </div>
                <div <?php if($result == "Форма успешно отправлена"){
                        echo "class=\"success\"";
                    } 
                        else{echo "class=\"err\"";}
                            ?>>
                    <?php echo $result;?>
                </div>
            </form>
        </div>
   </div> 
</body>
</html>