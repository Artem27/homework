<div class="content">
    <div class="container">

        <!--  Навигация по сайту  -->

        <aside class="sidebar">
            <nav class="nav">
                <ul class="nav__list">
                    <li class="nav__item  {if isset($mod) and ($mod === 'active_about')} {$active} {else} '' {/if}">
                        <a href="index.php?page=about" class="nav__link">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                            Обо мне
                        </a>
                    </li>
                    <li class="nav__item  {if isset($mod) and ($mod === 'active_career')} {$active} {else} '' {/if}">
                        <a href="index.php?page=career" class="nav__link">
                            <i class="fa fa-handshake-o" aria-hidden="true"></i>
                            Карьерный путь
                        </a>
                    </li>
                    <li class="nav__item  {if isset($mod) and ($mod === 'active_study')} {$active} {else} '' {/if}">
                        <a href="index.php?page=study" class="nav__link">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            Образование
                        </a>
                    </li>
                    <li class="nav__item  {if isset($mod) and ($mod === 'active_skills')} {$active} {else} '' {/if}">
                        <a href="index.php?page=skills" class="nav__link">
                            <i class="fa fa-code" aria-hidden="true"></i>
                            Проффесиональные навыки
                        </a>
                    </li>
                    <li class="nav__item  {if isset($mod) and ($mod === "active_ads")} {$active} {else} '' {/if}">
                        <a href="index.php?page=ads" class="nav__link">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            Доска объявлений
                        </a>
                    </li>
                    <li class="nav__item  {if isset($mod) and ($mod === 'active_calculator')} {$active} {else} '' {/if}">
                        <a href="index.php?page=calculator" class="nav__link">
                            <i class="fa fa-calculator" aria-hidden="true"></i>
                            Экономический калькулятор
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
