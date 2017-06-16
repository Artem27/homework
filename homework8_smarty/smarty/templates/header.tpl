<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="description" content="Доска объявлений">
    <meta name="author" content="Artem Artemov">
    <meta name="viewport" content="width=1220">

    <!-- ||******|__ ИКОНКА САЙТА __|****** || -->
    <link rel="shortcut icon" type="images/png" href="style/img/icon/icon.png">

    <!-- ||******|__ STYLE __|****** || -->
    <link rel="stylesheet" href="style/main.css">

    <!-- ||******|__ SCRIPT __|****** || -->
    <script src="js/modernizr.js"></script>

</head>
<body>
<div class="wrapper">
    <div class="maincontent">
        <header class="header">
            <div class="container">
                <div class="header__left">
                    <div class="user">
                        <div class="user__avatar">
                            <div class="user__avatar-pic">
                                <img src="style/img/avatars/ava.png" alt="Артёмов Артём" class="user__avatar-img">
                            </div>
                        </div>
                        <div class="user__name">
                            <div class="user__name-text" >
                                Username
                            </div>
                            <div class="user__email">
                                <a href="http://www.newart09@mail.ru" class="email-link email-link__hover" target="_blank">
                                    newart09@mail.ru
                                </a>
                                <div class="email-message">
                                    <div class="trangle"></div>
                                    <div class="message-text">
                                        Напишите мне
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header__right">
                    <div class="message">
                        <div class="message__date">
                            {* Вывод приветствия, даты *}
                            {$helloDisplay}
                        </div>
                    </div>
                    <div class="social">
                        <ul class="social__list">
                            <li class="social__item">
                                <a href="https://vk.com/id90424187" class="social__link social__link_vk" target="_blank">
                                    <img src="style/img/icon/social_new/vk.png" alt="Вконтакте" class="social-img">
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="" class="social__link social__link_ap" target="_blank">
                                    <img src="style/img/icon/social_new/ap.png" alt="Apple" class="social-img">
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="" class="social__link social__link_fb" target="_blank">
                                    <img src="style/img/icon/social_new/fb.png" alt="FaceBoock" class="social-img">
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="www.google.ru" class="social__link social__link_gl" target="_blank">
                                    <img src="style/img/icon/social_new/gl.png" alt="Google" class="social-img">
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="" class="social__link social__link_h" target="_blank">
                                    <img src="style/img/icon/social_new/h.png" alt="Social" class="social-img">
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="" class="social__link social__link_it" target="_blank">
                                    <img src="style/img/icon/social_new/it.png" alt="Инстаграмм" class="social-img">
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="" class="social__link social__link_sp" target="_blank">
                                    <img src="style/img/icon/social_new/sp.png" alt="Скайп" class="social-img">
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="" class="social__link social__link_tw" target="_blank">
                                    <img src="style/img/icon/social_new/tw.png" alt="Twitter" class="social-img">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="contacts-list">
                        <li class="nav__item-contacts"
                        <a href="#" class="contacts">
                            Контакты
                        </a>
                        <ul class="dropdown">
                            <div class="trangle-dropdown"></div>
                            <li class="dropdown__item">
                                <i class="fa fa-phone-square" aria-hidden="true"></i>
                                8-874-463-01-01
                            </li>
                        </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
