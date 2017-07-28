{*--  Форма  --*}

<div class="ads">
    <div class="form-wrapper">
        <div class="title">
            <h1 class="title__text">
                Создать объявление
            </h1>
        </div>
        <form class="form" method="POST" action="index.php?page={if isset($smarty.get.page)}{$smarty.get.page}{else}{''}{/if}" >
            <div class="form__ads">
                <div class="inputs">

                    {* <!-- ===== User ===== --> *}

                    <div class="inputs__block {if isset($display_error.error_input.input_error_user)}{$displayError.error_input.input_error_user}{else}{''}{/if}">
                        <div class="inputs__title">
                            <label for="username"> Введите своё имя <span style="color:red; position: absolute">*</span></label>
                        </div>
                        <div class="inputs__input">
                            <input class="input" value="{if isset($ads_edit.user_name)}{$ads_edit.user_name}{else}{''}{/if}" name="user_name" type="text" placeholder="{if isset($display_error.error.error_user_name)}{$display_error.error.error_user_name}{else}{'-- Введите имя --'}{/if}" maxlength="40" title="Введите имя" id="username">
                        </div>
                    </div>

                    {* <!-- ===== Email ===== --> *}

                    <div class="inputs__block {if isset($display_error.error_input.input_error_email)}{$display_error.error_input.input_error_email}{else} {''} {/if}">
                        <div class="inputs__title">
                            <label for="useremail" > Введите свой Email <span style="color:red; position: absolute">*</span> </label>
                        </div>
                        <div class="inputs__input">
                            <input class="input" value="{if isset($ads_edit.user_email)}{$ads_edit.user_email}{else}{''}{/if}" name="user_email" type="text" placeholder="{if isset($display_error.error.error_user_email)}{$display_error.error.error_user_email}{else}{'-- Введите Email --'}{/if}" maxlength="40" title="Введите Email" id="useremail">
                        </div>
                    </div>

                    {* <!-- ===== Checkbox ===== --> *}

                    <div class="inputs__block">
                        <div class="checkbox">
                            <label for="checkbox"> Я не хочу получать вопросы по объявлению по e-mail </label>
                            <input value="on" title="Я не хочу получать вопросы по объявлению по e-mail" {if isset($checked)} {$checked}{else}{''}{/if} class="checkbox__on" name="checkbox_email" type="checkbox" id="checkbox">
                        </div>
                    </div>
                </div>

                {* <!-- ===== Options ===== --> *}

                {* <!-- ===== Города ===== --> *}

                <div class="selects">
                    <div class="inputs__block {if isset($display_error.error_input.input_error_city)}{$display_error.error_input.input_error_city}{else}{''}{/if}">
                        <div class="inputs__title">
                            <label for="region">
                                Выберите город
                                <span style="color:red; position: absolute">*</span>
                            </label>
                        </div>
                        <select class="select" name="city_index" id="region" title="Выберите город">
                            <option class="select-text" value="" selected="" disabled="disabled">
                                {if isset($display_error.error.error_city_index)}{$display_error.error.error_city_index}{else}{'-- Выберите город --'}{/if}
                            </option>
                            {foreach from = $alphabet_city key = city_title item = array_city}
                            <option class='select-letter' value='' disabled='disabled'>{$city_title}</option>

                                {foreach from = $array_city key = category_index item = one_city}
                                {if ($city === $one_city)}
                                    {assign var = selected value = 'selected=""'}
                                {else}
                                    {''}
                                {/if}
                                <option {if isset($selected)}{$selected}{else}{''}{/if} class="city__select_city" value="{$one_city}">{$one_city}</option>
                                {/foreach}
                            {/foreach}
                        </select>
                    </div>


                    {* <!-- ===== Станиции метро ===== --> *}

                    <div class="inputs__block">
                        <div class="inputs__title">
                            <label for="region">
                                Выберите станцию
                            </label>
                        </div>
                        <select class="select" name="metro_index" id="region" title="Выберите станцию метро">
                            <option class="select-text" value="" selected="" disabled="disabled"> -- Выберите станцию -- </option>
                            {foreach from = $alphabet_station_metro key = metro_title item = array_metro}
                            <option class='select-letter' value='' disabled='disabled'>{$metro_title}</option>

                                {foreach from = $array_metro key = metro_index item = one_metro}
                                    {if ($metro === $metro_index)}
                                        {assign var = selected_metro value = 'selected=""'}
                                    {else}
                                        {''}
                                    {/if}
                                    <option {if isset($selected_metro)}{$selected_metro}{else}{''}{/if} class="city__select_city" value="{$metro_index}">{$one_metro}</option>
                                {/foreach}
                            {/foreach}
                        </select>
                    </div>

                    {* <!-- ===== Категории ===== --> *}

                    <div class="inputs__block">
                        <div class="inputs__title">
                            <label for="region">
                                Выберите категорию
                            </label>
                        </div>
                        <select class="select" name="category_index" id="region" title="Выберите категорию">
                            <option class="select-text" value="" selected="" disabled="disabled"> -- Выберите категорию -- </option>
                            {foreach from = $category key = category_title item = array_category}
                            <option class='select-letter' value='' disabled='disabled'>{$category_title}</option>;

                                {foreach from = $array_category key = category_index item = one_category}
                                    {if ($category_id === $category_index)}
                                        {assign var = selected_category value = 'selected=""'}
                                    {else}
                                        {''}
                                    {/if}
                                <option {if isset($selected_category)}{$selected_category}{else}{''}{/if} class="city__select_city" value="{$category_index}">{$one_category}</option>
                                {/foreach}
                            {/foreach}
                        </select>
                    </div>
                </div>

                {* <!-- ===== Inputs ===== --> *}

                <div class="inputs">

                    <!-- ===== Название объявления ===== -->

                    <div class="inputs__block {if isset($display_error.error_input.input_error_ads_name)}{$display_error.error_input.input_error_ads_name}{else}{''}{/if}">
                        <div class="inputs__title">
                            <label for="ads" > Название объявления <span style="color:red; position: absolute">*</span></label>
                        </div>
                        <div class="inputs__input">
                            <input class="input" value="{if isset($ads_edit.ads_name)}{$ads_edit.ads_name}{else}{''}{/if}" name="ads_name" type="text" placeholder="{if isset($display_error.error.error_ads_name)}{$display_error.error.error_ads_name}{else}{'-- например: Монитор --'}{/if}" maxlength="40" title="Введите название объявления" id="ads">
                        </div>
                    </div>

                    {* <!-- ===== Цена ===== --> *}

                    <div class="inputs__block {if isset($display_error.error_input.input_error_price)}{$display_error.error_input.input_error_price}{else}{''}{/if}">
                        <div class="inputs__title">
                            <label for="price" > Укажите цену </label> <span style="color:red; position: absolute">*</span>
                        </div>
                        <div class="inputs__input">
                            <input class="input" value="{if isset($ads_edit.price)}{$ads_edit.price}{else}{''}{/if}" name="price" type="text"  placeholder="{if isset($display_error.error.error_price)}{$display_error.error.error_price}{else}{'-- в рублях --'}{/if}"  title="Укажите цену" id="price">
                        </div>
                    </div>

                    {* <!-- ===== Описание объявления ===== --> *}

                    <div class="description__block">
                    <div class="description__title">
                        <label for="description" > Описание объявления </label>
                    </div>
                    <div class="description__input">
                        <textarea class="description" placeholder="Опишите объявление..." name="description" spellcheck="true" type="text" maxlength="3000" title="Коротко опишите своё объявление :)" id="description">{if isset($adsEdit.description)}{$adsEdit.description}{else}{''}{/if}</textarea>
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
                            {if isset($submit)}{$submit}{else}{''}{/if}
                        </span>
                    </button>
                    <div class="inputs__block">
                        <div style="font-size: 16px;">
                            <span style="color:red; font-size: 20px;"> * </span>
                            Поля для обязательного заполнения
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="{if isset($smarty.get.edit)}{$smarty.get.edit}{else}{''}{/if}">
            </div>
        </form>
    </div>
</div>

{* <!-- ===== Вывод объявления ===== --> *}

{if !empty($ads)}
{foreach from = $ads key = id item = desc}

<div class="ads ads__display">
    <div class="form-wrapper">
        <div class="display-ads">
            <div class="title">
                <h1 class="title__text">
                    {assign var=i value=1}
                    Объявление № {if isset($id)}{$id+$i} '{$desc.ads_name}'{else}{''}{/if}
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
                        {if isset($desc)}{$desc.user_name}{else}{''}{/if}
                    </div>
                </div>
                <div class="bulleti__left">
                    <div class="bulleti__title">
                        Город
                    </div>
                </div>
                <div class="bulleti__right">
                    <div class="bulleti__description">
                        {if isset($desc)}{$desc.city_index}{else}{''}{/if}
                    </div>
                </div>
                <div class="bulleti__left">
                    <div class="bulleti__title">
                        Название
                    </div>
                </div>
                <div class="bulleti__right">
                    <div class="bulleti__description">
                        {if isset($desc)}{$desc.ads_name}{else}{''}{/if}
                    </div>
                </div>
                <div class="bulleti__left">
                    <div class="bulleti__title">
                        Цена
                    </div>
                </div>
                <div class="bulleti__right">
                    <div class="bulleti__description">
                       {if isset($desc)}{$desc.price}{else}{''}{/if}
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
                        <a href="http://www.{if isset($desc)}{$desc.user_email}{''}{/if}" class="panel__link" target="_blank">
                            {if isset($desc)}{$desc.user_email}{else}{''}{/if}
                        </a>
                    </li>
                    <li class="panel__item">
                        <a href="index.php?page=ads&edit={if isset($id)}{$id}{else}{''}{/if}" class="panel__link">
                            Редактировать
                        </a>
                    </li>
                    <li class="panel__item">
                        <a href="index.php?page=ads&deleted_ads={if isset($id)}{$id}{else}{''}{/if}" class="panel__link">
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
{/foreach}
{/if}
</div>  <!--content -->
</div>      <!--container-->
</div>          <!--wrapper-->
</div>              <!--maincontent-->