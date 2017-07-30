<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($title) ? $title : 'Главная страница' ?></title>
    <link href="/dz6_session/assets/style/main.css" type="text/css" rel="stylesheet">

<!--    <script src="dz6_test/assets/js/modernizr.js"></script>-->
</head>
<body>
    <div class="wrapper">
        <div class="maincontent">
            <header class="header">
                <div class="container">
                    <div class="header__left">
                        <div class="nav">
                            <ul class="nav__list">
                                <li class="nav__item">
                                    <a href="<?php $project = explode('/', $_SERVER['REQUEST_URI']); echo $project_string = !empty($project[1]) ? '/'.$project[1].'/' : ''?>" class="nav__links">Главная</a>
                                </li>
                                <li class="nav__item">
                                    <a href="<?php $project = explode('/', $_SERVER['REQUEST_URI']); echo $project_string = !empty($project[1]) ? '/'.$project[1].'/' : ''?>portfolio/" class="nav__links">Ещё страница</a>
                                </li>
                                <li class="nav__item">
                                    <a href="<?php $project = explode('/', $_SERVER['REQUEST_URI']); echo $project_string = !empty($project[1]) ? '/'.$project[1].'/' : ''?>ads" class="nav__links">Доска объявлений</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="header__right">
                        <div class="header__logo">
                            <div class="logo__pic">
                                <img src="/dz6_session/assets/img/header/logo.png" alt="" class="logo__img">
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <?php include 'application/views/'.$page_file;?>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            
        </div>
    </footer>
</body>
</html>