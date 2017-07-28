<?php $ad = isset($data_array['ad']) ? $data_array['ad'] : ''?>
<div class="form">
    <div class="container">
        <form class="form__ads" method="POST" action="<?php $project = explode('/', $_SERVER['REQUEST_URI']); echo $project_string = !empty($project[1]) ? '/'.$project[1].'/' : ''?>ads/index/validate/">
            <div class="inputs">

                <!-- ===== User ===== -->

                <div class="inputs__title">
                    <label for="user">Введите имя</label>
                </div>
                <div class="inputs__name">
                    <input class="input" type="text" name="user_name" value="<?php echo isset($ad['user_name']) ? $ad['user_name'] : ''?>" title="" placeholder="Введите имя..." id="user">
                </div>

                <!-- ===== Email ===== -->

                <div class="inputs__title">
                    <label for="email">Введите свой Email</label>
                </div>
                <div class="inputs__name">
                    <input class="input" type="text" name="email" value="<?php echo isset($ad['email']) ? $ad['email'] : ''?>" title="" placeholder="Введите свой Email..." id="email">
                </div>

                <!-- ===== Options ===== -->

                <!-- ===== Города ===== -->

                <div class="inputs__name">
                    <div class="inputs__title">
                        Выберите свой город
                    </div>
                    <select class="input" name="city" id="city_index" title="Выберите город">
                        <option disabled="disabled" selected="" value="">Выберите город</option>

                        <?php $city = isset($ad['city']) ? $ad['city'] : '' ?>
                        <?php foreach ($alphabet_city as $city_title => $array_city) : ?>
                        <option class='select-letter' value='' disabled='disabled'> <?php echo $city_title ?> </option>;
                            <?php foreach ($array_city as $city_index => $one_city) {
                                $selected = ($city === $one_city) ? 'selected=""' : '';
                                echo '<option '."$selected".' value="'.$one_city.'">'.$one_city.'</option>';
                            } ?>
                        <?php endforeach;?>
                    </select>
                </div>

                <!-- ===== Станции метро ===== -->

                <div class="inputs__name">
                    <div class="inputs__title">
                        Выберите свою станцию метро
                    </div>
                    <select class="input" name="station_metro" id="metro_index" title="Выберите свою станцию метро">
                        <option disabled="disabled" selected=""  value="">Выберите станцию</option>

                        <?php $metro = isset($ad['station_metro']) ?  $ad['station_metro'] : ''?>
                        <?php foreach ($alphabet_stations as $station_title => $array_station) :?>
                        <option class='select-letter' value='' disabled='disabled'><?php echo $station_title ?></option>
                            <?php foreach ($array_station as $station_index => $one_station) {
                                $selected = ($metro === $one_station) ? 'selected=""' : '';
                                echo '<option '."$selected".' value="'.$one_station.'">'.$one_station.'</option>';
                            } ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- ===== Категории ===== -->

                <div class="inputs__name">
                    <div class="inputs__title">
                        Выберите категорию
                    </div>
                    <select class="input" name="category" id="category_index" title="Выберите категорию">
                        <option disabled="disabled" selected=""  value="">Выберите категорию</option>

                        <?php $category = isset($ad['category']) ?  $ad['category'] : ''?>
                        <?php foreach ($alphabet_category as $category_title => $array_category) :?>
                            <option class='select-letter' value='' disabled='disabled'><?php echo $category_title ?></option>
                            <?php foreach ($array_category as $category_index => $one_category) {
                                $selected = ($category === $one_category) ? 'selected=""' : '';
                                echo '<option '."$selected".' value="'.$one_category.'">'.$one_category.'</option>';
                            } ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- ===== Название объявления ===== -->

                <div class="inputs__title">
                    <label for="ads_name">Название объявления</label>
                </div>
                <div class="inputs__name">
                    <input class="input" type="text" name="ads_name" value="<?php echo isset($ad['ads_name']) ? $ad['ads_name'] : ''?>" title="" placeholder="Например, Монитор..." id="ads_name">
                </div>

                <!-- ===== Цена ===== -->

                <div class="inputs__title">
                    <label for="price">Укажите цену</label>
                </div>
                <div class="inputs__name">
                    <input class="input" type="text" name="price" value="<?php echo isset($ad['price']) ? $ad['price'] : ''?>" title="" placeholder="Укажите цену..." id="price">
                </div>

                <!-- ===== Описание объявления ===== -->

                <div class="inputs__title">
                    <label for="description_ads">Описание объявления</label>
                </div>
                <div class="inputs__name">
                    <textarea class="input input_font-size" type="text" name="description_ads" spellcheck="true" id="price" maxlength="3000" title="Коротко опишите своё объявление :)"><?php echo isset($ad['description_ads']) ? $ad['description_ads'] : ''?></textarea>
                </div>

                <!-- ===== Checkbox ===== -->

                <div class="inputs__title">
                    <label for="checkbox">Я не хочу получать вопросы по объявлению по e-mail</label>
                    <input value="on" <?php echo isset($ad['checkbox']) ? 'checked' : '' ?> class="checkbox" type="checkbox" name="checkbox" title="" id="checkbox">
                </div>

                <div class="inputs__name">
                    <input class="btn" type="submit" name="submit"  value="<?php echo !empty($ad) ? 'Редактировать' : 'Отправить' ?>" title="">
                    <input class="btn" type="hidden" name="id"      value="<?php echo isset($_GET['edit_ad']) ? $_GET['edit_ad'] : '' ?>" title="">
                </div>
            </div>
        </form>

        <div class="ads">
            <?php $ads = isset($data_array['ads']) ? $data_array['ads'] : '';
            if (!empty($ads)) :

                foreach ($ads as $key => $value) : ?>

                    <div class="ads__display">
                        <div class="ads__number">
                            Объявление: "<?php echo isset($value['ads_name']) && !empty($value['ads_name']) ? $value['ads_name'] : '<span style="color: red; font-size: 75%">Автор не указал название</span>'?>"
                        </div>
                        <div class="ads__title">
                            Имя
                        </div>
                        <div class="ads__value">
                            <?php echo isset($value['user_name']) && !empty($value['user_name']) ? $value['user_name'] : '<span style="color: red; font-size: 75%">Автор не указал своё имя</span>'?>
                        </div>
                        <div class="ads__title">
                            Email
                        </div>
                        <div class="ads__value">
                            <?php echo isset($value['email']) && !empty($value['email']) ? $value['email'] : '<span style="color: red; font-size: 75%">Автор не указал свой Email</span>'?>
                        </div>
                        <div class="ads__title">
                            Город
                        </div>
                        <div class="ads__value">
                            <?php echo isset($value['city']) ? $value['city'] : '<span style="color: red; font-size: 75%">Автор не указал город</span>'?>
                        </div>
                        <div class="ads__title">
                            Станция метро
                        </div>
                        <div class="ads__value">
                            <?php echo isset($value['station_metro']) ? $value['station_metro'] : '<span style="color: red; font-size: 75%">Автор не указал станцию</span>'?>
                        </div>
                        <div class="ads__title">
                            Категории
                        </div>
                        <div class="ads__value">
                            <?php echo isset($value['category']) ? $value['category'] : '<span style="color: red; font-size: 75%">Автор не указал категорию</span>'?>
                        </div>
                        <div class="ads__title">
                            Название обявления
                        </div>
                        <div class="ads__value">
                            <?php echo isset($value['ads_name']) && !empty($value['ads_name']) ? $value['ads_name'] : '<span style="color: red; font-size: 75%">Автор не указал название объявления</span>'?>
                        </div>
                        <div class="ads__title">
                            Цена
                        </div>
                        <div class="ads__value">
                            <?php echo isset($value['price']) && !empty($value['price']) ? $value['price'] : '<span style="color: red; font-size: 75%">Автор не указал цену</span>'?>
                        </div>
                        <div class="desc">
                            <div class="desc__ads">
                                Описание объявления
                            </div>
                        </div>
                        <div class="desc__ads_value">
                            <?php echo isset($value['description_ads']) ? $value['description_ads'] : 'Автор не указал описание...'?>
                        </div>
                        <div class="ads__links">
                            <div class="ads__link">
                                <a href="<?php $project = explode('/', $_SERVER['REQUEST_URI']); echo $project_string = !empty($project[1]) ? '/'.$project[1].'/' : ''?>ads/index/edit/<?php echo $key ?>" class="ads__link">Редактироватиь</a>
                            </div>
                            <div class="ads__link">
                                <a href="<?php $project = explode('/', $_SERVER['REQUEST_URI']); echo $project_string = !empty($project[1]) ? '/'.$project[1].'/' : ''?>ads/index/deleted/<?php echo $key ?>" class="ads__link">Удалить</a>
                            </div>
                        </div>
                    </div>

                <?php endforeach;?>

            <?php endif;
            header('Location:'.$_SERVER['REQUEST_URI']);
            exit;?>
        </div>
    </div>
</div>