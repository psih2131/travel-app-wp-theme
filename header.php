<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head() ?>
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="container">
                <a href="" class="header__logo">
                    <img src="<?php bloginfo('template_directory') ?>/assets/src/img/header-logo-test-2.jpg" alt="" class="header__logo-img">
                </a>

                <nav class="header__nav">
                    <ul class="header__nav-list">
                        <!-- <li><a href="/">Главная</a></li>
                        <li><a href="/tours.html">Туры</a></li>
                        <li><a href="/directions.html">Направлений</a></li>
                        <li><a href="/guides.html">Гиды</a></li>
                        <li><a href="/blog">Полезыне статьи</a></li> -->

                        <?php wp_nav_menu( array(

                        //ВЫВОД МЕНЮ
                        'menu'            => 'header-meny',              // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее 
                        // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
                        'container'       => false,           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
                        'container_class' => '',              // (string) class контейнера (div тега)
                        'container_id'    => '',              // (string) id контейнера (div тега)
                        'menu_class'      => 'header__nav-list ',          // (string) class самого меню (ul тега)
                        'menu_id'         => '',              // (string) id самого меню (ul тега)
                        'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
                        'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
                        'before'          => '',              // (string) Текст перед <a> каждой ссылки
                        'after'           => '',              // (string) Текст после </a> каждой ссылки
                        'link_before'     => '',              // (string) Текст перед анкором (текстом) ссылки
                        'link_after'      => '',              // (string) Текст после анкора (текста) ссылки
                        'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
                        'walker'          => '',              // (object) Класс собирающий меню. Default: new Walker_Nav_Menu
                        'theme_location'  => 'headermeny'               // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)
                        ) ); ?>
                    </ul>
                </nav>

                <div class="header__right">
                    <div class="header__search">
                        <input type="text" class="header__search-input" placeholder="Поиск">
                        <div class="header__search-icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.7321 12.3182H12.9907L12.7279 12.065C13.8541 10.7518 14.436 8.96032 14.1169 7.05624C13.6758 4.44869 11.4984 2.36639 8.87055 2.04749C4.90061 1.55974 1.55948 4.89891 2.04751 8.86652C2.36661 11.4928 4.45012 13.6689 7.05921 14.1098C8.9644 14.4287 10.757 13.8471 12.0709 12.7216L12.3243 12.9842V13.7252L16.313 17.7116C16.6978 18.0961 17.3266 18.0961 17.7114 17.7116C18.0962 17.327 18.0962 16.6986 17.7114 16.314L13.7321 12.3182ZM8.10096 12.3182C5.76405 12.3182 3.87763 10.4329 3.87763 8.09739C3.87763 5.76184 5.76405 3.87653 8.10096 3.87653C10.4379 3.87653 12.3243 5.76184 12.3243 8.09739C12.3243 10.4329 10.4379 12.3182 8.10096 12.3182Z"
                                    fill="#5DB8A6" />
                            </svg>
                        </div>
                    </div>
                    
                    <?php 
                    if ( is_user_logged_in() ) {
                        ?>
                        <a href="/user-home/" class="header__user-data user-data-header">
                            <img src="<?php bloginfo('template_directory') ?>/assets/image/user1.CDEjALZz.webp" alt="User Avatar" class="header__user-data-avatar-img">
                        </a>
                        <?php
                    }
                    else {
                    ?>
                        <button class="header__auth-btn" data-engram-button="auth">Войти</button>
                    <?php
                    }
                    ?>
                    

                    

                    <div class="header__burger burger-menu-btn">
                        <span class="burger-menu-btn__line"></span>
                        <span class="burger-menu-btn__line"></span>
                        <span class="burger-menu-btn__line"></span>     
                    </div>
                </div>
            </div>
        </header>

        <div class="header-mobile-menu">
            <div class="container">
                <div class="header__search">
                    <input type="text" class="header__search-input" placeholder="Поиск">
                    <div class="header__search-icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.7321 12.3182H12.9907L12.7279 12.065C13.8541 10.7518 14.436 8.96032 14.1169 7.05624C13.6758 4.44869 11.4984 2.36639 8.87055 2.04749C4.90061 1.55974 1.55948 4.89891 2.04751 8.86652C2.36661 11.4928 4.45012 13.6689 7.05921 14.1098C8.9644 14.4287 10.757 13.8471 12.0709 12.7216L12.3243 12.9842V13.7252L16.313 17.7116C16.6978 18.0961 17.3266 18.0961 17.7114 17.7116C18.0962 17.327 18.0962 16.6986 17.7114 16.314L13.7321 12.3182ZM8.10096 12.3182C5.76405 12.3182 3.87763 10.4329 3.87763 8.09739C3.87763 5.76184 5.76405 3.87653 8.10096 3.87653C10.4379 3.87653 12.3243 5.76184 12.3243 8.09739C12.3243 10.4329 10.4379 12.3182 8.10096 12.3182Z"
                                fill="#5DB8A6" />
                        </svg>
                    </div>
                </div>

                <nav class="header-mobile-menu__nav">

                    <?php wp_nav_menu( array(
                    //ВЫВОД МЕНЮ
                    'menu'            => 'header-meny',              // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее 
                    // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
                    'container'       => false,           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
                    'container_class' => '',              // (string) class контейнера (div тега)
                    'container_id'    => '',              // (string) id контейнера (div тега)
                    'menu_class'      => 'header__nav-list ',          // (string) class самого меню (ul тега)
                    'menu_id'         => '',              // (string) id самого меню (ul тега)
                    'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
                    'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
                    'before'          => '',              // (string) Текст перед <a> каждой ссылки
                    'after'           => '',              // (string) Текст после </a> каждой ссылки
                    'link_before'     => '',              // (string) Текст перед анкором (текстом) ссылки
                    'link_after'      => '',              // (string) Текст после анкора (текста) ссылки
                    'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
                    'walker'          => '',              // (object) Класс собирающий меню. Default: new Walker_Nav_Menu
                    'theme_location'  => 'headermeny'               // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)
                    ) ); ?>

                </nav>
            </div>
        </div>