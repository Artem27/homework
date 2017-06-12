
<?php $ads = isset( $_SESSION['ads']) && !empty($_SESSION['ads'] ) ? $_SESSION['ads'] : '' ?>

<!--  Форма  -->

<div class="ads">
    <div class="form-wrapper">
        <div class="title">
            <h1 class="title__text">
                Создать объявление
            </h1>
        </div>
        <form class="form" method="POST" action="index.php?page=<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>" >
            <div class="form__ads">
                <div class="inputs">

                    <!-- ===== User ===== -->

                    <div class="inputs__block <?php echo isset($display_error['error_input']['input_error_user']) ? $display_error['error_input']['input_error_user'] : '' ?> ">
                        <div class="inputs__title">
                            <label for="username"> Введите своё имя <span style="color:red; position: absolute">*</span></label>
                        </div>
                        <div class="inputs__input">
                            <input class="input" value="<?php echo isset($ads_edit['user_name']) ? $ads_edit['user_name'] : '' ?>" name="user_name" type="text" placeholder="<?php echo isset($display_error['error']['error_user_name']) ? $display_error['error']['error_user_name'] : '-- Введите имя --'?>" maxlength="40" title="Введите имя" id="username">
                        </div>
                    </div>

                    <!-- ===== Email ===== -->

                    <div class="inputs__block <?php echo isset($display_error['error_input']['input_error_email']) ? $display_error['error_input']['input_error_email'] : '' ?>">
                        <div class="inputs__title">
                            <label for="useremail" > Введите свой Email <span style="color:red; position: absolute">*</span> </label>
                        </div>
                        <div class="inputs__input">
                            <input class="input" value="<?php echo isset($ads_edit['user_email']) ? $ads_edit['user_email'] : '' ?>" name="user_email" type="text" placeholder="<?php echo isset($display_error['error']['error_user_email']) ? $display_error['error']['error_user_email'] : '-- Введите Email --'?>" maxlength="40" title="Введите Email" id="useremail">
                        </div>
                    </div>

                    <!-- ===== Checkbox ===== -->

                    <div class="inputs__block">
                        <div class="checkbox">
                            <label for="checkbox"> Я не хочу получать вопросы по объявлению по e-mail </label>
                            <input value="on" <?php echo isset($checked) ? $checked : '' ?> class="checkbox__on" name="checkbox_email" type="checkbox" id="checkbox">
                        </div>
                    </div>
                </div>

                <!-- ===== Options ===== -->

                <!-- ===== Города ===== -->

                <div class="selects">
                    <div class="inputs__block <?php echo isset($display_error['error_input']['input_error_city']) ? $display_error['error_input']['input_error_city'] : '' ?>">
                        <div class="inputs__title">
                            <label for="region">
                                Выберите город
                                <span style="color:red; position: absolute">*</span>
                            </label>
                        </div>
                        <select class="select" name="city_index" id="region" title="Выберите город">
                            <option class="select-text" value="" selected="" disabled="disabled">
                                <?php echo isset($display_error['error']['error_city_index']) ? $display_error['error']['error_city_index'] : '-- Выберите город --'?>
                            </option>
                            <?php foreach ($alphabetCity as $cityTitle => $arrayCity) : ?>
                                <option class='select-letter' value='' disabled='disabled'> <?php echo $cityTitle ?> </option>;

                                <?php foreach ($arrayCity as $categoryIndex => $oneCity) {
                                    $selected = ($city === $oneCity) ? 'selected=""' : '';
                                    echo '<option '."$selected".' class="city__select_city" value="'.$oneCity.'">'.$oneCity.'</option>';
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
                                    $selected_metro = ($metro === $metroIndex) ? 'selected=""' : '';
                                    echo '<option '."$selected_metro".' class="city__select_city" value="'.$metroIndex.'">'.$oneMetro.'</option>';
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
                                    $selected_category = ($categoryId === $categoryIndex) ? 'selected=""' : '';
                                    echo '<option '."$selected_category".' class="city__select_city" value="'.$categoryIndex.'">'.$oneCategory.'</option>';
                                } ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <!-- ===== Inputs ===== -->

                <div class="inputs">

                    <!-- ===== Название объявления ===== -->

                    <div class="inputs__block <?php echo isset($display_error['error_input']['input_error_ads_name']) ? $display_error['error_input']['input_error_ads_name'] : '' ?>">
                        <div class="inputs__title">
                            <label for="ads" > Название объявления <span style="color:red; position: absolute">*</span> </label>
                        </div>
                        <div class="inputs__input">
                            <input class="input" value="<?php echo isset($ads_edit['ads_name']) ? $ads_edit['ads_name'] : '' ?>" name="ads_name" type="text" placeholder="<?php echo isset($display_error['error']['error_ads_name']) ? $display_error['error']['error_ads_name'] : '-- например: Монитор --'?>" maxlength="40" title="Введите название объявления" id="ads">
                        </div>
                    </div>

                    <!-- ===== Цена ===== -->

                    <div class="inputs__block <?php echo isset($display_error['error_input']['input_error_price']) ? $display_error['error_input']['input_error_price'] : '' ?>">
                        <div class="inputs__title">
                            <label for="price" > Укажите цену </label> <span style="color:red; position: absolute">*</span>
                        </div>
                        <div class="inputs__input">
                            <input class="input" value="<?php echo isset($ads_edit['price']) ? $ads_edit['price']  : ''?>" name="price" type="text"  placeholder="<?php echo isset($display_error['error']['error_price']) ? $display_error['error']['error_price'] : '-- в рублях --'?>"  title="Укажите цену" id="price">
                        </div>
                    </div>

                    <!-- ===== Описание объявления ===== -->

                    <div class="description__block">
                        <div class="description__title">
                            <label for="description" > Описание объявления </label>
                        </div>
                        <div class="description__input">
                            <textarea class="description" placeholder="Опишите объявление..." name="description" spellcheck="true" type="text" maxlength="3000" title="Коротко опишите своё объявление :)" id="description"><?php echo isset($ads_edit['description']) ? $ads_edit['description'] : '' ?></textarea>
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
                <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ""; echo isset($id) ? $id : '' ?>">
            </div>
        </form>
    </div>
</div>

<!-- ===== Вывод объявления ===== -->
<?php if ( !empty($ads) ) : ?>
<?php foreach ($ads as $id => $desc) :?>

    <div class="ads ads__display">
        <div class="form-wrapper">
            <div class="display-ads">
                <div class="title">
                    <h1 class="title__text">
                        Объявление № <?php echo ( isset($id) ) ? $id + 1 ." '".$desc['ads_name']. "' " : '' ?>
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
                </div>
                <div class="panel">
                    <ul class="panel__list">
                        <li class="panel__item">
                        <span class="panel__text">
                            Написать владельцу:
                        </span>
                        </li>
                        <li class="panel__item">
                            <a href="http://www.<?php echo isset($desc) ? $desc['user_email'] : '' ?>" class="panel__link" target="_blank">
                                <?php echo isset($desc) ? $desc['user_email'] : '' ?>
                            </a>
                        </li>
                        <li class="panel__item">
                            <a href="index.php?page=ads&edit=<?php echo isset($id) ? $id : '' ?>" class="panel__link">
                                Редактировать
                            </a>
                        </li>
                        <li class="panel__item">
                            <a href="index.php?page=ads&deleted_ads=<?php echo isset($id) ? $id : ''  ?>" class="panel__link">
                                Удалить
                            </a>
                            <div class="panel__link-img">
                                <img src="style/img/decor/what.jpg" alt="Серьёзно хотите удалить?" class="panel__link-pic">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php endforeach ?>
<?php endif ?>
</div>  <!--content -->
</div>      <!--container-->
</div>          <!--wrapper-->
</div>              <!--maincontent-->

