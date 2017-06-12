<?php /* =      Шапка сайта         = */ ?>

<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="description" content="Доска объявлений">
    <meta name="author" content="Artem Artemov">
    <meta name="viewport" content="width=1220">

    <!-- ||******|__ ИКОНКА САЙТА __|****** || -->
    <link rel="shortcut icon" type="images/png" href="style/img/icon/icon_page.png">

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
                            <?php echo $helloDisplay ?>
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
        <?php /* =      Навигация по сайту         = */ ?>


        <div class="content">
            <div class="container">

                <!--  Навигация по сайту  -->

                <aside class="sidebar">
                    <nav class="nav">
                        <ul class="nav__list">
                            <li class="nav__item <?php echo isset($activeAbout) ? $activeAbout : ''?>">
                                <a href="index.php?action=about" class="nav__link">
                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                    Обо мне
                                </a>
                            </li>
                            <li class="nav__item <?php echo isset($activeCareer) ? $activeCareer : ''?>">
                                <a href="index.php?action=career" class="nav__link">
                                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                    Карьерный путь
                                </a>
                            </li>
                            <li class="nav__item <?php echo isset($activeStudy) ? $activeStudy : ''?>">
                                <a href="index.php?action=study" class="nav__link">
                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                    Образование
                                </a>
                            </li>
                            <li class="nav__item <?php echo isset($activeSkills) ? $activeSkills : ''?>">
                                <a href="index.php?action=skills" class="nav__link">
                                    <i class="fa fa-code" aria-hidden="true"></i>
                                    Проффесиональные навыки
                                </a>
                            </li>
                            <li class="nav__item <?php echo isset($activeAds) ? $activeAds : ''?>">
                                <a href="index.php?action=ads" class="nav__link">
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    Доска объявлений
                                </a>
                            </li>
                            <li class="nav__item <?php echo isset($activeCalculator) ? $activeCalculator : ''?>">
                                <a href="index.php?action=calculator" class="nav__link">
                                    <i class="fa fa-calculator" aria-hidden="true"></i>
                                    Экономический калькулятор
                                </a>
                            </li>
                        </ul>
                    </nav>
                </aside>
                <?php $ads = $_SESSION['ads']?>


                <!--  Форма  -->

                <div class="ads">
                    <div class="form-wrapper">
                        <div class="title">
                            <h1 class="title__text">
                                Создать объявление
                            </h1>
                        </div>
                        <form class="form" method="POST" action="index.php?action=<?php echo isset($_GET['action']) ? $_GET['action'] : '' ?>" >
                            <div class="form__ads">
                                <div class="inputs">

                                    <!-- ===== User ===== -->

                                    <div class="inputs__block <?php echo isset($displayAds['error_input']['input_error_user']) ? $displayAds['error_input']['input_error_user'] : '' ?> ">
                                        <div class="inputs__title">
                                            <label for="username"> Введите своё имя <span style="color:red; position: absolute">*</span></label>
                                        </div>
                                        <div class="inputs__input">
                                            <input class="input" value="" name="user_name" type="text" placeholder="<?php echo isset($displayAds['error']['error_user_name']) ? $displayAds['error']['error_user_name'] : '-- Введите имя --'?>" maxlength="40" title="Введите имя" id="username">
                                        </div>
                                    </div>

                                    <!-- ===== Email ===== -->

                                    <div class="inputs__block <?php echo isset($displayAds['error_input']['input_error_email']) ? $displayAds['error_input']['input_error_email'] : '' ?>">
                                        <div class="inputs__title">
                                            <label for="useremail" > Введите свой Email <span style="color:red; position: absolute">*</span> </label>
                                        </div>
                                        <div class="inputs__input">
                                            <input class="input" value="" name="user_email" type="text" placeholder="<?php echo isset($displayAds['error']['error_user_email']) ? $displayAds['error']['error_user_email'] : '-- Введите Email --'?>" maxlength="40" title="Введите Email" id="useremail">
                                        </div>
                                    </div>

                                    <!-- ===== Checkbox ===== -->

                                    <div class="inputs__block">
                                        <div class="checkbox">
                                            <label for="checkbox"> Я не хочу получать вопросы по объявлению по e-mail </label>
                                            <input value="on" <?php //echo $checked ?> class="checkbox__on" name="checkbox_email" type="checkbox" id="checkbox">
                                        </div>
                                    </div>
                                </div>

                                <!-- ===== Options ===== -->

                                <!-- ===== Города ===== -->

                                <div class="selects">
                                    <div class="inputs__block <?php echo isset($displayAds['error_input']['input_error_city']) ? $displayAds['error_input']['input_error_city'] : '' ?>">
                                        <div class="inputs__title">
                                            <label for="region">
                                                Выберите город
                                                <span style="color:red; position: absolute">*</span>
                                            </label>
                                        </div>
                                        <select class="select" name="city_index" id="region" title="Выберите город">
                                            <option class="select-text" value="" selected="" disabled="disabled">
                                                <?php echo isset($displayAds['error']['error_city_index']) ? $displayAds['error']['error_city_index'] : '-- Выберите город --'?>
                                            </option>
                                            <?php foreach ($alphabetCity as $cityTitle => $arrayCity) : ?>
                                                <option class='select-letter' value='' disabled='disabled'> <?php echo $cityTitle ?> </option>;

                                                <?php foreach ($arrayCity as $categoryIndex => $oneCity) {
                                                    echo '<option class="city__select_city" value=" '.$categoryIndex.'">' . $oneCity . '</option>';
                                                } ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <!-- ===== Станиции метро ===== -->

                                    <div class="inputs__block">
                                        <div class="inputs__title">
                                            <label for="region">
                                                Выберите станцию
                                            </label>
                                        </div>
                                        <select class="select" name="metro_index" id="region" title="Выберите станцию метро">
                                            <option class="select-text" value="" selected="" disabled="disabled"> -- Выберите станцию -- </option>
                                            <?php foreach ($alphabetStationMetro as $metroTitle => $arrayMetro) : ?>
                                                <option class='select-letter' value='' disabled='disabled'> <?php echo $metroTitle ?> </option>;

                                                <?php foreach ($arrayMetro as $metroIndex => $oneMetro) {
                                                    echo '<option class="city__select_city" value=" '.$metroIndex.'">' . $oneMetro . '</option>';
                                                } ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <!-- ===== Категории ===== -->

                                    <div class="inputs__block">
                                        <div class="inputs__title">
                                            <label for="region">
                                                Выберите категорию
                                            </label>
                                        </div>
                                        <select class="select" name="category_index" id="region" title="Выберите категорию">
                                            <option class="select-text" value="" selected="" disabled="disabled"> -- Выберите категорию -- </option>
                                            <?php foreach ($category as $categoryTitle => $arrayCategory) : ?>
                                                <option class='select-letter' value='' disabled='disabled'> <?php echo $categoryTitle ?> </option>;

                                                <?php foreach ($arrayCategory as $categoryIndex => $oneCategory) {
                                                    echo '<option class="city__select_city" value=" '.$categoryIndex.'">' . $oneCategory . '</option>';
                                                } ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- ===== Inputs ===== -->

                                <div class="inputs">

                                    <!-- ===== Название объявления ===== -->

                                    <div class="inputs__block <?php echo isset($displayAds['error_input']['input_error_ads_name']) ? $displayAds['error_input']['input_error_ads_name'] : '' ?>">
                                        <div class="inputs__title">
                                            <label for="ads" > Название объявления <span style="color:red; position: absolute">*</span> </label>
                                        </div>
                                        <div class="inputs__input">
                                            <input class="input" name="ads_name" type="text" placeholder="<?php echo isset($displayAds['error']['error_ads_name']) ? $displayAds['error']['error_ads_name'] : '-- например: Монитор --'?>" maxlength="40" title="Введите название объявления" id="ads">
                                        </div>
                                    </div>

                                    <!-- ===== Цена ===== -->

                                    <div class="inputs__block <?php echo isset($displayAds['error_input']['input_error_price']) ? $displayAds['error_input']['input_error_price'] : '' ?>">
                                        <div class="inputs__title">
                                            <label for="price" > Укажите цену </label> <span style="color:red; position: absolute">*</span>
                                        </div>
                                        <div class="inputs__input">
                                            <input class="input" value="" name="price" type="text"  placeholder="<?php echo isset($displayAds['error']['error_price']) ? $displayAds['error']['error_price'] : '-- в рублях --'?>"  title="Укажите цену" id="price">
                                        </div>
                                    </div>

                                    <!-- ===== Описание объявления ===== -->

                                    <div class="description__block">
                                        <div class="description__title">
                                            <label for="description" > Описание объявления </label>
                                        </div>
                                        <div class="description__input">
                                            <textarea class="description" placeholder="Опишите объявление..." name="description" spellcheck="true" type="text" maxlength="3000" title="Коротко опишите своё объявление :)" id="description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- ===== Кнопка ===== -->

                                <div class="button">
                                    <button value="" name="submit" class="button__submit">
                        <span class="button__img">
                            <img src="style/img/icon/button/add.png" alt="Создать объявление" class="button__icon_pic">
                        </span>
                                        <span class="form__submit-text">
                            <?php echo isset($submit) ? $submit : '' ?>
                        </span>
                                    </button>
                                    <div class="inputs__block">
                                        <div style="font-size: 16px;">
                                            <span style="color:red; font-size: 20px;"> * </span>
                                            Поля для обязательного заполнения
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : "" ?>">
                            </div>
                        </form>

                        <!-- ===== Вывод объявления ===== -->


                    </div>
                </div>
                <!-- ===== Вывод объявления ===== -->
                <?php foreach ($ads as $id => $desc) :?>
                <div class="ads">
                    <div class="form-wrapper">
                        <div class="display-ads">
                            <div class="title">
                                <h1 class="title__text">
                                    Объявления
                                </h1>
                            </div>
                            <div class="bulleti">

                                <div class="bulleti__left">
                                    <div class="bulleti__title">
                                        Имя владельца
                                    </div>
                                </div>
                                <div class="bulleti__right">
                                    <div class="bulleti__description">
                                        <?php echo isset($desc) ? $desc['user_name'] : '' ?>
                                    </div>
                                </div>
                                <div class="bulleti__left">
                                    <div class="bulleti__title">
                                        Город
                                    </div>
                                </div>
                                <div class="bulleti__right">
                                    <div class="bulleti__description">
                                        <?php echo isset($desc) ? $desc['city_index'] : '' ?>
                                    </div>
                                </div>
                                <div class="bulleti__left">
                                    <div class="bulleti__title">
                                        Название
                                    </div>
                                </div>
                                <div class="bulleti__right">
                                    <div class="bulleti__description">
                                        <?php echo isset($desc) ? $desc['ads_name'] : '' ?>
                                    </div>
                                </div>
                                <div class="bulleti__left">
                                    <div class="bulleti__title">
                                        Цена
                                    </div>
                                </div>
                                <div class="bulleti__right">
                                    <div class="bulleti__description">
                                        <?php echo isset($desc) ? $desc['price'] : '' ?>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>  <!--content -->
        </div>      <!--container-->
    </div>          <!--wrapper-->
</div>              <!--maincontent-->
<?php /* =      Подвал сайта         = */ ?>

<footer class="footer">
    <div class="container">
        Это футер
    </div>
</footer>
</body>
</html>

