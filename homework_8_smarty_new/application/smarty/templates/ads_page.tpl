
{if isset($data_array.ad) && !empty($data_array.ad)}{assign var=ad value=$data_array.ad}{else}{''}{/if}
<div class="form">
    <div class="container">
        <form class="form__ads" method="POST" action="{$project_string|cat:'ads/index/validate/'}">
            <div class="inputs">

                <!-- ===== User ===== -->

                <div class="inputs__title">
                    <label for="user">Введите имя</label>
                </div>
                <div class="inputs__name">
                    <input class="input" type="text" name="user_name" value="{if (isset($ad.user_name))}{$ad.user_name}{else}{''}{/if}" title="" placeholder="Введите имя..." id="user">
                </div>

                <!-- ===== Email ===== -->

                <div class="inputs__title">
                    <label for="email">Введите свой Email</label>
                </div>
                <div class="inputs__name">
                    <input class="input" type="text" name="email" value="{if (isset($ad.email))}{$ad.email}{else}{''}{/if}" title="" placeholder="Введите свой Email..." id="email">
                </div>

                <!-- ===== Options ===== -->

                <!-- ===== Города ===== -->

                <div class="inputs__name">
                    <div class="inputs__title">
                        Выберите свой город
                    </div>
                    <select class="input" name="city" id="city_index" title="Выберите город">
                        <option disabled="disabled" selected="" value="">Выберите город</option>

                        {if (isset($ad.city))}{assign var=city value=$ad.city}{else}{''}{/if}
                        {foreach from=$alphabet_city key=city_title item=array_city}
                        <option class='select-letter' value='' disabled='disabled'>{$city_title}</option>;

                            {foreach from=$array_city key=city_index item=one_city}
                            {if ($city === $one_city)}
                                {assign var=selected value='selected=""'}
                            {else}
                                {''}
                            {/if}
                        <option {if (isset($selected))}{$selected}{else}{''}{/if} value="{$one_city}">{$one_city}</option>
                            {/foreach}
                        {/foreach}
                    </select>
                </div>

                <!-- ===== Станции метро ===== -->

                <div class="inputs__name">
                    <div class="inputs__title">
                        Выберите свою станцию метро
                    </div>
                    <select class="input" name="station_metro" id="metro_index" title="Выберите свою станцию метро">
                        <option disabled="disabled" selected=""  value="">Выберите станцию</option>

                        {if (isset($ad.station_metro))}{assign var=metro value=$ad.station_metro}{else}{''}{/if}
                        {foreach from=$alphabet_stations key=station_title item=array_station}
                        <option class='select-letter' value='' disabled='disabled'>{$station_title}</option>

                            {foreach from=$array_station key=station_index item=one_station}
                            {if ($metro === $one_station)}
                                {assign var=selected_metro value='selected=""'}
                            {else}
                                {''}
                            {/if}
                            <option {if (isset($selected_metro))}{$selected_metro}{else}{''}{/if} value="{$one_station}">{$one_station}</option>'
                            {/foreach}
                        {/foreach}
                    </select>
                </div>

                <!-- ===== Категории ===== -->

                <div class="inputs__name">
                    <div class="inputs__title">
                        Выберите категорию
                    </div>
                    <select class="input" name="category" id="category_index" title="Выберите категорию">
                        <option disabled="disabled" selected=""  value="">Выберите категорию</option>

                        {if (isset($ad.category))}{assign var=metro value=$ad.category}{else}{''}{/if}
                        {foreach from=$alphabet_category key=category_title item=array_category}
                        <option class='select-letter' value='' disabled='disabled'>{$category_title}</option>

                            {foreach from=$array_category key=category_index item=one_category}
                            {if ($metro === $one_category)}
                                {assign var=selected_category value='selected=""'}
                            {else}
                                {''}
                            {/if}
                            <option {if (isset($selected_metro))}{$selected_metro}{else}{''}{/if} value="{$one_category}">{$one_category}</option>
                            {/foreach}
                        {/foreach}
                    </select>
                </div>

                <!-- ===== Название объявления ===== -->

                <div class="inputs__title">
                    <label for="ads_name">Название объявления</label>
                </div>
                <div class="inputs__name">
                    <input class="input" type="text" name="ads_name" value="{if (isset($ad.ads_name))}{$ad.ads_name}{else}{''}{/if}" title="" placeholder="Например, Монитор..." id="ads_name">
                </div>

                <!-- ===== Цена ===== -->

                <div class="inputs__title">
                    <label for="price">Укажите цену</label>
                </div>
                <div class="inputs__name">
                    <input class="input" type="text" name="price" value="{if (isset($ad.price))}{$ad.price}{else}{''}{/if}" title="" placeholder="Укажите цену..." id="price">
                </div>

                <!-- ===== Описание объявления ===== -->

                <div class="inputs__title">
                    <label for="description_ads">Описание объявления</label>
                </div>
                <div class="inputs__name">
                    <textarea class="input input_font-size" type="text" name="description_ads" spellcheck="true" id="price" maxlength="3000" title="Коротко опишите своё объявление :)">
                        {if (isset($ad.description_ads))}{$ad.description_ads}{else}{''}{/if}
                    </textarea>
                </div>

                <!-- ===== Checkbox ===== -->

                <div class="inputs__title">
                    <label for="checkbox">Я не хочу получать вопросы по объявлению по e-mail</label>
                    <input value="on" {if (isset($ad.checkbox))}{$ad.checkbox}{else}{''}{/if} class="checkbox" type="checkbox" name="checkbox" title="" id="checkbox">
                </div>

                <div class="inputs__name">
                    <input class="btn" type="submit" name="submit"  value="{if (!empty($ad))}{'Редактировать'}{else}{'Отправить'}{/if}" title="">
                    <input class="btn" type="hidden" name="id"      value="{if (isset($smarty.get.edit_ad))}{$smarty.get.edit_ad}{else}{''}{/if}" title="">
                </div>
            </div>
        </form>

        <div class="ads">

            {if (isset($data_array.ads) && !empty($data_array.ads))}{assign var=ads value=$data_array.ads}{else}{''}{/if}
            {if (!empty($ads))}
                {foreach from=$ads key=key item=value}

            <div class="ads__display">
                <div class="ads__number">
                    Объявление: "{if (isset($value.ads_name) && !empty($value.ads_name))}{$value.ads_name}{else}{'<span style="color: red; font-size: 75%">Автор не указал название</span>'}{/if}"
                </div>
                <div class="ads__title">
                    Имя
                </div>
                <div class="ads__value">
                    {if (isset($value.user_name) && !empty($value.user_name))}{$value.user_name}{else}{'<span style="color: red; font-size: 75%">Автор не указал своё имя</span>'}{/if}
                </div>
                <div class="ads__title">
                    Email
                </div>
                <div class="ads__value">
                    {if (isset($value.email) && !empty($value.email))}{$value.email}{else}{'<span style="color: red; font-size: 75%">Автор не указал свой Email</span>'}{/if}
                </div>
                <div class="ads__title">
                    Город
                </div>
                <div class="ads__value">
                    {if (isset($value.city))}{$value.city}{else}{'<span style="color: red; font-size: 75%">Автор не указал город</span>'}{/if}
                </div>
                <div class="ads__title">
                    Станция метро
                </div>
                <div class="ads__value">
                    {if (isset($value.station_metro))}{$value.station_metro}{else}{'<span style="color: red; font-size: 75%">Автор не указал станцию</span>'}{/if}
                </div>
                <div class="ads__title">
                    Категории
                </div>
                <div class="ads__value">
                    {if (isset($value.category))}{$value.category}{else}{'<span style="color: red; font-size: 75%">Автор не указал категорию</span>'}{/if}
                </div>
                <div class="ads__title">
                    Название обявления
                </div>
                <div class="ads__value">
                   {if (isset($value.ads_name) && !empty($value.ads_name))}{$value.ads_name}{else}{'<span style="color: red; font-size: 75%">Автор не указал название объявления</span>'}{/if}
                </div>
                <div class="ads__title">
                    Цена
                </div>
                <div class="ads__value">
                    {if (isset($value.price) && !empty($value.price))}{$value.price}{else}{'<span style="color: red; font-size: 75%">Автор не указал цену</span>'}{/if}
                </div>
                <div class="desc">
                    <div class="desc__ads">
                        Описание объявления
                    </div>
                </div>
                <div class="desc__ads_value">
                    {if (isset($value.description_ads) && !empty($value.description_ads))}{$value.description_ads}{else}{'Автор не указал описание...'}{/if}
                </div>
                <div class="ads__links">
                    <div class="ads__link">
                        {assign var=ad_edit value=$project_string|cat:'ads/index/edit/'}
                        <a href="{$ad_edit|cat:$key}" class="ads__link">Редактироватиь</a>
                    </div>
                    <div class="ads__link">
                        {assign var=ad_deleted value=$project_string|cat:'ads/index/deleted/'}
                        <a href="{$ad_deleted|cat:$key}" class="ads__link">Удалить</a>
                    </div>
                </div>
            </div>

            {/foreach}
            {/if}

        </div>
    </div>
</div>