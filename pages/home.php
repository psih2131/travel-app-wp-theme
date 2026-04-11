<?php
/*
Template Name: Home
*/
?>

<?php get_header() ?>

<main class="main">

	<section class="home-hero-sec">
	    <!-- Блок 1: фон + поиск -->
	    <div class="home-hero-sec__block home-hero-sec__block--hero">
	        <div class="home-hero-sec__bg" style="background-image: url('<?php bloginfo('template_directory') ?>/assets/image/hero-3.ewIqg74W.jpg');"></div>
	        <div class="home-hero-sec__overlay"></div>
	        <div class="home-hero-sec__content">
	            <div class="container">
	                <h1 class="home-hero-sec__title">Невероятная природа и культура путешествий</h1>
	                <p class="home-hero-sec__subtitle">Исследуйте мир с гидами, которые знают каждую тропу</p>
	                <div class="hero-search">
	                    <div class="hero-search__inner">
	                        <div class="hero-search__field hero-search__field--direction" data-hero-field="direction">
	                            <span class="hero-search__icon hero-search__icon--direction" aria-hidden="true">
	                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
	                            </span>
	                            <button type="button" class="hero-search__trigger" data-hero-trigger="direction" aria-expanded="false" aria-haspopup="listbox" aria-label="Выберите направление">
	                                <span class="hero-search__value" data-hero-value="direction">Направление</span>
	                                <span class="hero-search__chevron">
	                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
	                                </span>
	                            </button>
	                            <div class="hero-search__dropdown hero-search__dropdown--direction" role="listbox" hidden>
	                                <ul class="hero-search__list" data-hero-list="direction">
	                                    <li><button type="button" class="hero-search__option" data-value="">Любое</button></li>
	                                    <li><button type="button" class="hero-search__option" data-value="norway">Норвегия</button></li>
	                                    <li><button type="button" class="hero-search__option" data-value="kamchatka">Камчатка</button></li>
	                                    <li><button type="button" class="hero-search__option" data-value="italy">Италия</button></li>
	                                    <li><button type="button" class="hero-search__option" data-value="thailand">Тайланд</button></li>
	                                    <li><button type="button" class="hero-search__option" data-value="iceland">Исландия</button></li>
	                                    <li><button type="button" class="hero-search__option" data-value="canada">Канада</button></li>
	                                    <li><button type="button" class="hero-search__option" data-value="karelia">Карелия</button></li>
	                                    <li><button type="button" class="hero-search__option" data-value="crimea">Крым</button></li>
	                                    <li><button type="button" class="hero-search__option" data-value="jordan">Иордания</button></li>
	                                    <li><button type="button" class="hero-search__option" data-value="greece">Греция</button></li>
	                                </ul>
	                            </div>
	                        </div>
	                        <span class="hero-search__sep" aria-hidden="true"></span>
	                        <div class="hero-search__field hero-search__field--price" data-hero-field="price">
	                            <span class="hero-search__icon hero-search__icon--price" aria-hidden="true">
	                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v12M15 9H9.5a2.5 2.5 0 0 0 0 5H14.5a2.5 2.5 0 0 1 0 5H9"/></svg>
	                            </span>
	                            <button type="button" class="hero-search__trigger" data-hero-trigger="price" aria-expanded="false" aria-haspopup="dialog" aria-label="Укажите цену">
	                                <span class="hero-search__value" data-hero-value="price">Цена</span>
	                                <span class="hero-search__chevron">
	                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
	                                </span>
	                            </button>
	                            <div class="hero-search__dropdown hero-search__dropdown--price" hidden>
	                                <div class="hero-search__price-range" id="hero-price-slider"></div>
	                                <div class="hero-search__price-inputs">
	                                    <label class="hero-search__price-label">
	                                        <span>От</span>
	                                        <input type="number" class="hero-search__price-input hero-search__price-input--min" min="0" max="1000000" step="1000" value="0" placeholder="0">
	                                    </label>
	                                    <label class="hero-search__price-label">
	                                        <span>До</span>
	                                        <input type="number" class="hero-search__price-input hero-search__price-input--max" min="0" max="1000000" step="1000" value="500000" placeholder="500 000">
	                                    </label>
	                                </div>
	                            </div>
	                        </div>
	                        <span class="hero-search__sep" aria-hidden="true"></span>
	                        <div class="hero-search__field hero-search__field--date" data-hero-field="date">
	                            <span class="hero-search__icon hero-search__icon--date" aria-hidden="true">
	                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
	                            </span>
	                            <button type="button" class="hero-search__trigger" data-hero-trigger="date" aria-expanded="false" aria-haspopup="dialog" aria-label="Выберите даты">
	                                <span class="hero-search__value" data-hero-value="date">Дата</span>
	                                <span class="hero-search__chevron">
	                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
	                                </span>
	                            </button>
	                            <input type="text" class="hero-search__date-input" id="hero-date-input" readonly placeholder="Выберите даты" data-input>
	                            <div class="hero-search__dropdown hero-search__dropdown--date" hidden></div>
	                        </div>
	                        <button type="button" class="hero-search__btn" data-hero-search>Начать поиск</button>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- Блок 2: карточки статистики -->
	    <div class="home-hero-sec__block home-hero-sec__block--stats">
	        <div class="container">
	            <div class="home-hero-sec__stats-grid">
	                <div class="home-hero-sec__stat">
	                    <span class="home-hero-sec__stat-num">937+</span>
	                    <span class="home-hero-sec__stat-label">Направлений</span>
	                </div>
	                <div class="home-hero-sec__stat">
	                    <span class="home-hero-sec__stat-num">117</span>
	                    <span class="home-hero-sec__stat-label">Стран</span>
	                </div>
	                <div class="home-hero-sec__stat">
	                    <span class="home-hero-sec__stat-num">2K+</span>
	                    <span class="home-hero-sec__stat-label">Туров</span>
	                </div>
	                <div class="home-hero-sec__stat">
	                    <span class="home-hero-sec__stat-num">4.9</span>
	                    <span class="home-hero-sec__stat-label">Средний рейтинг</span>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	
	<section class="home-popular-directions">
	    <div class="container">
	        <div class="sec-header">
	            <div class="sec-header__text">
	                <h2 class="sec-title">Популярные направления</h2>
	                <p class="sec-header__subtitle">937 городов в 117 странах</p>
	            </div>
	
	            <a href="" class="sec-header__btn">Все направления</a>
	        </div>
	
	        <div class="home-popular-directions__wrapper">
	
	            <a href="" class="direction-card">
	                <div class="direction-card__img-wrapper">
	                    <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-1.C1Ozobgs.jpg" alt="" class="direction-card__img">
	                </div>
	                <div class="direction-card__data">
	                    <p class="direction-card__name-location">Норвегия</p>
	                    <div class="direction-card__count">241 экскурсий</div>
	                </div>
	            </a>
	            <a href="" class="direction-card">
	                <div class="direction-card__img-wrapper">
	                    <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-2.CAw743nH.webp" alt="" class="direction-card__img">
	                </div>
	                <div class="direction-card__data">
	                    <p class="direction-card__name-location">Камчатка</p>
	                    <div class="direction-card__count">89 экскурсий</div>
	                </div>
	            </a>
	            <a href="" class="direction-card">
	                <div class="direction-card__img-wrapper">
	                    <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-3.BZml2eiK.jpg" alt="" class="direction-card__img">
	                </div>
	                <div class="direction-card__data">
	                    <p class="direction-card__name-location">Италия</p>
	                    <div class="direction-card__count">124 экскурсий</div>
	                </div>
	            </a>
	            <a href="" class="direction-card">
	                <div class="direction-card__img-wrapper">
	                    <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-5.DJ8SjQhy.jpg" alt="" class="direction-card__img">
	                </div>
	                <div class="direction-card__data">
	                    <p class="direction-card__name-location">Тайланд</p>
	                    <div class="direction-card__count">54 экскурсий</div>
	                </div>
	            </a>
	            <a href="" class="direction-card">
	                <div class="direction-card__img-wrapper">
	                    <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-6.Cjz7bpZz.jpg" alt="" class="direction-card__img">
	                </div>
	                <div class="direction-card__data">
	                    <p class="direction-card__name-location">Исландия</p>
	                    <div class="direction-card__count">23 экскурсий</div>
	                </div>
	            </a>
	            <a href="" class="direction-card">
	                <div class="direction-card__img-wrapper">
	                    <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-7.yJJ5feKL.jpg" alt="" class="direction-card__img">
	                </div>
	                <div class="direction-card__data">
	                    <p class="direction-card__name-location">Канада</p>
	                    <div class="direction-card__count">76 экскурсий</div>
	                </div>
	            </a>
	            <a href="" class="direction-card">
	                <div class="direction-card__img-wrapper">
	                    <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-8.D4eW1C_4.webp" alt="" class="direction-card__img">
	                </div>
	                <div class="direction-card__data">
	                    <p class="direction-card__name-location">Карелия</p>
	                    <div class="direction-card__count">89 экскурсий</div>
	                </div>
	            </a>
	            <a href="" class="direction-card">
	                <div class="direction-card__img-wrapper">
	                    <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-9.608IcsFv.webp" alt="" class="direction-card__img">
	                </div>
	                <div class="direction-card__data">
	                    <p class="direction-card__name-location">Крым</p>
	                    <div class="direction-card__count">89 экскурсий</div>
	                </div>
	            </a>
	            <a href="" class="direction-card">
	                <div class="direction-card__img-wrapper">
	                    <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-10.BtDqMwOc.webp" alt="" class="direction-card__img">
	                </div>
	                <div class="direction-card__data">
	                    <p class="direction-card__name-location">Иордания</p>
	                    <div class="direction-card__count">124 экскурсий</div>
	                </div>
	            </a>
	            <a href="" class="direction-card">
	                <div class="direction-card__img-wrapper">
	                    <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-11.CPOJsd1X.jpg" alt="" class="direction-card__img">
	                </div>
	                <div class="direction-card__data">
	                    <p class="direction-card__name-location">Греция</p>
	                    <div class="direction-card__count">54 экскурсий</div>
	                </div>
	            </a>
	        </div>
	
	
	    </div>
	</section>
	
	<section class="home-tours-sec">
	    <div class="container">
	        <div class="sec-header">
	            <div class="sec-header__text">
	                <h2 class="sec-title">Многодневные туры</h2>
	                <p class="sec-header__subtitle">Путешествия в места, которые не посмотреть за день</p>
	            </div>
	
	            <a href="" class="sec-header__btn">Все туры</a>
	        </div>
	
	        <div class="home-tours-sec__wrapper">
	            <div class="tour-card">
	                <div class="tour-card__top">
	                    <div class="tour-card__img-wrapper">
	                        <div class="tour-card__img-top-row">
	                            <div class="tour-card__tags-row">
	                                <a href="" class="tour-card__tag">Авторский тур</a>
	                                <a href="" class="tour-card__tag">Мини-группы</a>
	                            </div>
	                            <div class="tour-card__rate">
	                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                    <path
	                                        d="M9.27414 6.88619C9.12325 7.03241 9.05392 7.24389 9.08829 7.4513L9.60621 10.3176C9.64991 10.5606 9.54737 10.8064 9.34405 10.9468C9.1448 11.0925 8.87973 11.1099 8.66242 10.9934L6.08214 9.64765C5.99242 9.59988 5.8928 9.57425 5.79085 9.57133H5.63297C5.5782 9.57949 5.52461 9.59697 5.47567 9.62376L2.89481 10.976C2.76722 11.04 2.62274 11.0628 2.48117 11.04C2.13628 10.9748 1.90615 10.6462 1.96267 10.2996L2.48117 7.43324C2.51554 7.22409 2.44621 7.01144 2.29532 6.86288L0.191599 4.82383C0.0156575 4.65313 -0.0455142 4.39679 0.0348829 4.1655C0.11295 3.9348 0.312195 3.76643 0.552803 3.72856L3.44826 3.30851C3.66848 3.28579 3.8619 3.1518 3.96094 2.95372L5.23681 0.337901C5.2671 0.279642 5.30614 0.226044 5.35332 0.180602L5.40576 0.139821C5.43314 0.109526 5.4646 0.0844752 5.49955 0.0640846L5.56306 0.0407811L5.6621 0H5.90737C6.12642 0.0227209 6.31925 0.153803 6.42004 0.349553L7.7128 2.95372C7.80602 3.14423 7.9872 3.27647 8.19635 3.30851L11.0918 3.72856C11.3365 3.76352 11.541 3.93247 11.622 4.1655C11.6983 4.39912 11.6325 4.65546 11.453 4.82383L9.27414 6.88619Z"
	                                        fill="#FDFFFE" />
	                                </svg>
	            
	                                <span class="tour-card__rate-num">4.8</span>
	                            </div>
	                        </div>
	                        <div class="tour-card__img-down-row">
	                            <div class="tour-card__period">2 дня</div>
	                        </div>
	                        <img src="<?php bloginfo('template_directory') ?>/assets/image/tour1.AuwWnMIk.jpg" alt="" class="tour-card__img">
	                    </div>
	            
	                    <div class="tour-card__body">
	                        <p class="tour-card__title">
	                            <a href="/tour.html" class="tour-card__title-link">Забыть о делах: беззаботный отпуск на Пхукете в мини-группе </a>
	                        </p>
	                        <ul class="tour-card__date-list">
	                            <li class="tour-card__date">11-12 янв</li>
	                            <li class="tour-card__date">28 янв - 03 мар</li>
	                        </ul>
	                        <p class="tour-card__description">Полюбоваться каскадами рисовых террас, подняться к Вратам рая и узнать, как живут хмонги</p>
	                    </div>
	                </div>
	            
	                <div class="tour-card__down">
	                    <div class="tour-card__reserve-row">
	                        <div class="tour-card__price">
	                            $139 / <span>человек</span>
	                        </div>
	            
	                        <a href="/tour.html" class="tour-card__btn">
	                            Забронирывать
	                            <span class="tour-card__btn-ar">
	                                <svg width="145" height="145" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                    <path
	                                        d="M73.9159 71.5561C74.5649 71.2681 74.6248 70.3704 74.0199 69.9991L43.5741 51.3349C43.4355 51.2499 43.2759 51.2051 43.1133 51.205L36.2692 51.2049C35.4461 51.2048 35.0718 52.2329 35.7022 52.7619L63.1592 75.7896C63.417 76.0058 63.7753 76.0571 64.0829 75.9208L73.9159 71.5561Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path
	                                        d="M48.1774 90.2826C48.7627 89.9272 48.7373 89.0692 48.1318 88.7494L32.761 80.6372C32.559 80.5307 32.3237 80.5066 32.1044 80.5702L19.9053 84.1119C19.1923 84.3189 19.0383 85.2612 19.6487 85.6838L36.0472 97.0362C36.3332 97.2342 36.7092 97.2457 37.0066 97.0652L48.1774 90.2826Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path
	                                        d="M122.323 41.536C124.724 44.6844 124.066 49.1917 120.867 51.5239L57.6126 97.623L41.6098 100.973L35.3365 96.4923L112.543 40.1152C115.647 37.8491 119.993 38.4804 122.323 41.536Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path d="M20 110.945H80" stroke="#5DB8A6" stroke-width="2" stroke-linecap="round" />
	                                </svg>
	            
	            
	            
	                            </span>
	                        </a>
	                    </div>
	            
	            
	                </div>
	            
	            
	            </div>
	            <div class="tour-card">
	                <div class="tour-card__top">
	                    <div class="tour-card__img-wrapper">
	                        <div class="tour-card__img-top-row">
	                            <div class="tour-card__tags-row">
	                                <a href="" class="tour-card__tag">Авторский тур</a>
	                                <a href="" class="tour-card__tag">Мини-группы</a>
	                            </div>
	                            <div class="tour-card__rate">
	                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                    <path
	                                        d="M9.27414 6.88619C9.12325 7.03241 9.05392 7.24389 9.08829 7.4513L9.60621 10.3176C9.64991 10.5606 9.54737 10.8064 9.34405 10.9468C9.1448 11.0925 8.87973 11.1099 8.66242 10.9934L6.08214 9.64765C5.99242 9.59988 5.8928 9.57425 5.79085 9.57133H5.63297C5.5782 9.57949 5.52461 9.59697 5.47567 9.62376L2.89481 10.976C2.76722 11.04 2.62274 11.0628 2.48117 11.04C2.13628 10.9748 1.90615 10.6462 1.96267 10.2996L2.48117 7.43324C2.51554 7.22409 2.44621 7.01144 2.29532 6.86288L0.191599 4.82383C0.0156575 4.65313 -0.0455142 4.39679 0.0348829 4.1655C0.11295 3.9348 0.312195 3.76643 0.552803 3.72856L3.44826 3.30851C3.66848 3.28579 3.8619 3.1518 3.96094 2.95372L5.23681 0.337901C5.2671 0.279642 5.30614 0.226044 5.35332 0.180602L5.40576 0.139821C5.43314 0.109526 5.4646 0.0844752 5.49955 0.0640846L5.56306 0.0407811L5.6621 0H5.90737C6.12642 0.0227209 6.31925 0.153803 6.42004 0.349553L7.7128 2.95372C7.80602 3.14423 7.9872 3.27647 8.19635 3.30851L11.0918 3.72856C11.3365 3.76352 11.541 3.93247 11.622 4.1655C11.6983 4.39912 11.6325 4.65546 11.453 4.82383L9.27414 6.88619Z"
	                                        fill="#FDFFFE" />
	                                </svg>
	            
	                                <span class="tour-card__rate-num">4.8</span>
	                            </div>
	                        </div>
	                        <div class="tour-card__img-down-row">
	                            <div class="tour-card__period">2 дня</div>
	                        </div>
	                        <img src="<?php bloginfo('template_directory') ?>/assets/image/tour2.BtoFcI4-.jpg" alt="" class="tour-card__img">
	                    </div>
	            
	                    <div class="tour-card__body">
	                        <p class="tour-card__title">
	                            <a href="/tour.html" class="tour-card__title-link">Под парусом от острова к острову: тайский круиз на катамаране</a>
	                        </p>
	                        <ul class="tour-card__date-list">
	                            <li class="tour-card__date">11-12 янв</li>
	                            <li class="tour-card__date">28 янв - 03 мар</li>
	                        </ul>
	                        <p class="tour-card__description">Оказаться в «Руках Бога», запуститьплавучий фонарик в местной Венеции прокатиться в лодке</p>
	                    </div>
	                </div>
	            
	                <div class="tour-card__down">
	                    <div class="tour-card__reserve-row">
	                        <div class="tour-card__price">
	                            $139 / <span>человек</span>
	                        </div>
	            
	                        <a href="/tour.html" class="tour-card__btn">
	                            Забронирывать
	                            <span class="tour-card__btn-ar">
	                                <svg width="145" height="145" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                    <path
	                                        d="M73.9159 71.5561C74.5649 71.2681 74.6248 70.3704 74.0199 69.9991L43.5741 51.3349C43.4355 51.2499 43.2759 51.2051 43.1133 51.205L36.2692 51.2049C35.4461 51.2048 35.0718 52.2329 35.7022 52.7619L63.1592 75.7896C63.417 76.0058 63.7753 76.0571 64.0829 75.9208L73.9159 71.5561Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path
	                                        d="M48.1774 90.2826C48.7627 89.9272 48.7373 89.0692 48.1318 88.7494L32.761 80.6372C32.559 80.5307 32.3237 80.5066 32.1044 80.5702L19.9053 84.1119C19.1923 84.3189 19.0383 85.2612 19.6487 85.6838L36.0472 97.0362C36.3332 97.2342 36.7092 97.2457 37.0066 97.0652L48.1774 90.2826Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path
	                                        d="M122.323 41.536C124.724 44.6844 124.066 49.1917 120.867 51.5239L57.6126 97.623L41.6098 100.973L35.3365 96.4923L112.543 40.1152C115.647 37.8491 119.993 38.4804 122.323 41.536Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path d="M20 110.945H80" stroke="#5DB8A6" stroke-width="2" stroke-linecap="round" />
	                                </svg>
	            
	            
	            
	                            </span>
	                        </a>
	                    </div>
	            
	            
	                </div>
	            
	            
	            </div>
	            <div class="tour-card">
	                <div class="tour-card__top">
	                    <div class="tour-card__img-wrapper">
	                        <div class="tour-card__img-top-row">
	                            <div class="tour-card__tags-row">
	                                <a href="" class="tour-card__tag">Авторский тур</a>
	                                <a href="" class="tour-card__tag">Мини-группы</a>
	                            </div>
	                            <div class="tour-card__rate">
	                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                    <path
	                                        d="M9.27414 6.88619C9.12325 7.03241 9.05392 7.24389 9.08829 7.4513L9.60621 10.3176C9.64991 10.5606 9.54737 10.8064 9.34405 10.9468C9.1448 11.0925 8.87973 11.1099 8.66242 10.9934L6.08214 9.64765C5.99242 9.59988 5.8928 9.57425 5.79085 9.57133H5.63297C5.5782 9.57949 5.52461 9.59697 5.47567 9.62376L2.89481 10.976C2.76722 11.04 2.62274 11.0628 2.48117 11.04C2.13628 10.9748 1.90615 10.6462 1.96267 10.2996L2.48117 7.43324C2.51554 7.22409 2.44621 7.01144 2.29532 6.86288L0.191599 4.82383C0.0156575 4.65313 -0.0455142 4.39679 0.0348829 4.1655C0.11295 3.9348 0.312195 3.76643 0.552803 3.72856L3.44826 3.30851C3.66848 3.28579 3.8619 3.1518 3.96094 2.95372L5.23681 0.337901C5.2671 0.279642 5.30614 0.226044 5.35332 0.180602L5.40576 0.139821C5.43314 0.109526 5.4646 0.0844752 5.49955 0.0640846L5.56306 0.0407811L5.6621 0H5.90737C6.12642 0.0227209 6.31925 0.153803 6.42004 0.349553L7.7128 2.95372C7.80602 3.14423 7.9872 3.27647 8.19635 3.30851L11.0918 3.72856C11.3365 3.76352 11.541 3.93247 11.622 4.1655C11.6983 4.39912 11.6325 4.65546 11.453 4.82383L9.27414 6.88619Z"
	                                        fill="#FDFFFE" />
	                                </svg>
	            
	                                <span class="tour-card__rate-num">4.8</span>
	                            </div>
	                        </div>
	                        <div class="tour-card__img-down-row">
	                            <div class="tour-card__period">2 дня</div>
	                        </div>
	                        <img src="<?php bloginfo('template_directory') ?>/assets/image/tour3.BEpAL6ki.jpg" alt="" class="tour-card__img">
	                    </div>
	            
	                    <div class="tour-card__body">
	                        <p class="tour-card__title">
	                            <a href="/tour.html" class="tour-card__title-link">Релакс-выходные на реке Квай: слоны, сплав на плоту и катание на лодках</a>
	                        </p>
	                        <ul class="tour-card__date-list">
	                            <li class="tour-card__date">11-12 янв</li>
	                            <li class="tour-card__date">28 янв - 03 мар</li>
	                        </ul>
	                        <p class="tour-card__description">Отдохнуть на лучших пляжах, расслабиться во время тайского массажа и посетить</p>
	                    </div>
	                </div>
	            
	                <div class="tour-card__down">
	                    <div class="tour-card__reserve-row">
	                        <div class="tour-card__price">
	                            $139 / <span>человек</span>
	                        </div>
	            
	                        <a href="/tour.html" class="tour-card__btn">
	                            Забронирывать
	                            <span class="tour-card__btn-ar">
	                                <svg width="145" height="145" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                    <path
	                                        d="M73.9159 71.5561C74.5649 71.2681 74.6248 70.3704 74.0199 69.9991L43.5741 51.3349C43.4355 51.2499 43.2759 51.2051 43.1133 51.205L36.2692 51.2049C35.4461 51.2048 35.0718 52.2329 35.7022 52.7619L63.1592 75.7896C63.417 76.0058 63.7753 76.0571 64.0829 75.9208L73.9159 71.5561Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path
	                                        d="M48.1774 90.2826C48.7627 89.9272 48.7373 89.0692 48.1318 88.7494L32.761 80.6372C32.559 80.5307 32.3237 80.5066 32.1044 80.5702L19.9053 84.1119C19.1923 84.3189 19.0383 85.2612 19.6487 85.6838L36.0472 97.0362C36.3332 97.2342 36.7092 97.2457 37.0066 97.0652L48.1774 90.2826Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path
	                                        d="M122.323 41.536C124.724 44.6844 124.066 49.1917 120.867 51.5239L57.6126 97.623L41.6098 100.973L35.3365 96.4923L112.543 40.1152C115.647 37.8491 119.993 38.4804 122.323 41.536Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path d="M20 110.945H80" stroke="#5DB8A6" stroke-width="2" stroke-linecap="round" />
	                                </svg>
	            
	            
	            
	                            </span>
	                        </a>
	                    </div>
	            
	            
	                </div>
	            
	            
	            </div>
	            <div class="tour-card">
	                <div class="tour-card__top">
	                    <div class="tour-card__img-wrapper">
	                        <div class="tour-card__img-top-row">
	                            <div class="tour-card__tags-row">
	                                <a href="" class="tour-card__tag">Авторский тур</a>
	                                <a href="" class="tour-card__tag">Мини-группы</a>
	                            </div>
	                            <div class="tour-card__rate">
	                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                    <path
	                                        d="M9.27414 6.88619C9.12325 7.03241 9.05392 7.24389 9.08829 7.4513L9.60621 10.3176C9.64991 10.5606 9.54737 10.8064 9.34405 10.9468C9.1448 11.0925 8.87973 11.1099 8.66242 10.9934L6.08214 9.64765C5.99242 9.59988 5.8928 9.57425 5.79085 9.57133H5.63297C5.5782 9.57949 5.52461 9.59697 5.47567 9.62376L2.89481 10.976C2.76722 11.04 2.62274 11.0628 2.48117 11.04C2.13628 10.9748 1.90615 10.6462 1.96267 10.2996L2.48117 7.43324C2.51554 7.22409 2.44621 7.01144 2.29532 6.86288L0.191599 4.82383C0.0156575 4.65313 -0.0455142 4.39679 0.0348829 4.1655C0.11295 3.9348 0.312195 3.76643 0.552803 3.72856L3.44826 3.30851C3.66848 3.28579 3.8619 3.1518 3.96094 2.95372L5.23681 0.337901C5.2671 0.279642 5.30614 0.226044 5.35332 0.180602L5.40576 0.139821C5.43314 0.109526 5.4646 0.0844752 5.49955 0.0640846L5.56306 0.0407811L5.6621 0H5.90737C6.12642 0.0227209 6.31925 0.153803 6.42004 0.349553L7.7128 2.95372C7.80602 3.14423 7.9872 3.27647 8.19635 3.30851L11.0918 3.72856C11.3365 3.76352 11.541 3.93247 11.622 4.1655C11.6983 4.39912 11.6325 4.65546 11.453 4.82383L9.27414 6.88619Z"
	                                        fill="#FDFFFE" />
	                                </svg>
	            
	                                <span class="tour-card__rate-num">4.8</span>
	                            </div>
	                        </div>
	                        <div class="tour-card__img-down-row">
	                            <div class="tour-card__period">2 дня</div>
	                        </div>
	                        <img src="<?php bloginfo('template_directory') ?>/assets/image/tour4.DXsWvHqY.webp" alt="" class="tour-card__img">
	                    </div>
	            
	                    <div class="tour-card__body">
	                        <p class="tour-card__title">
	                            <a href="/tour.html" class="tour-card__title-link">Забыть о делах: беззаботный отпуск на Пхукете в мини-группе </a>
	                        </p>
	                        <ul class="tour-card__date-list">
	                            <li class="tour-card__date">11-12 янв</li>
	                            <li class="tour-card__date">28 янв - 03 мар</li>
	                        </ul>
	                        <p class="tour-card__description">Полюбоваться каскадами рисовых террас, подняться к Вратам рая и узнать, как живут хмонги</p>
	                    </div>
	                </div>
	            
	                <div class="tour-card__down">
	                    <div class="tour-card__reserve-row">
	                        <div class="tour-card__price">
	                            $139 / <span>человек</span>
	                        </div>
	            
	                        <a href="/tour.html" class="tour-card__btn">
	                            Забронирывать
	                            <span class="tour-card__btn-ar">
	                                <svg width="145" height="145" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                    <path
	                                        d="M73.9159 71.5561C74.5649 71.2681 74.6248 70.3704 74.0199 69.9991L43.5741 51.3349C43.4355 51.2499 43.2759 51.2051 43.1133 51.205L36.2692 51.2049C35.4461 51.2048 35.0718 52.2329 35.7022 52.7619L63.1592 75.7896C63.417 76.0058 63.7753 76.0571 64.0829 75.9208L73.9159 71.5561Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path
	                                        d="M48.1774 90.2826C48.7627 89.9272 48.7373 89.0692 48.1318 88.7494L32.761 80.6372C32.559 80.5307 32.3237 80.5066 32.1044 80.5702L19.9053 84.1119C19.1923 84.3189 19.0383 85.2612 19.6487 85.6838L36.0472 97.0362C36.3332 97.2342 36.7092 97.2457 37.0066 97.0652L48.1774 90.2826Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path
	                                        d="M122.323 41.536C124.724 44.6844 124.066 49.1917 120.867 51.5239L57.6126 97.623L41.6098 100.973L35.3365 96.4923L112.543 40.1152C115.647 37.8491 119.993 38.4804 122.323 41.536Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path d="M20 110.945H80" stroke="#5DB8A6" stroke-width="2" stroke-linecap="round" />
	                                </svg>
	            
	            
	            
	                            </span>
	                        </a>
	                    </div>
	            
	            
	                </div>
	            
	            
	            </div>
	            <div class="tour-card">
	                <div class="tour-card__top">
	                    <div class="tour-card__img-wrapper">
	                        <div class="tour-card__img-top-row">
	                            <div class="tour-card__tags-row">
	                                <a href="" class="tour-card__tag">Авторский тур</a>
	                                <a href="" class="tour-card__tag">Мини-группы</a>
	                            </div>
	                            <div class="tour-card__rate">
	                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                    <path
	                                        d="M9.27414 6.88619C9.12325 7.03241 9.05392 7.24389 9.08829 7.4513L9.60621 10.3176C9.64991 10.5606 9.54737 10.8064 9.34405 10.9468C9.1448 11.0925 8.87973 11.1099 8.66242 10.9934L6.08214 9.64765C5.99242 9.59988 5.8928 9.57425 5.79085 9.57133H5.63297C5.5782 9.57949 5.52461 9.59697 5.47567 9.62376L2.89481 10.976C2.76722 11.04 2.62274 11.0628 2.48117 11.04C2.13628 10.9748 1.90615 10.6462 1.96267 10.2996L2.48117 7.43324C2.51554 7.22409 2.44621 7.01144 2.29532 6.86288L0.191599 4.82383C0.0156575 4.65313 -0.0455142 4.39679 0.0348829 4.1655C0.11295 3.9348 0.312195 3.76643 0.552803 3.72856L3.44826 3.30851C3.66848 3.28579 3.8619 3.1518 3.96094 2.95372L5.23681 0.337901C5.2671 0.279642 5.30614 0.226044 5.35332 0.180602L5.40576 0.139821C5.43314 0.109526 5.4646 0.0844752 5.49955 0.0640846L5.56306 0.0407811L5.6621 0H5.90737C6.12642 0.0227209 6.31925 0.153803 6.42004 0.349553L7.7128 2.95372C7.80602 3.14423 7.9872 3.27647 8.19635 3.30851L11.0918 3.72856C11.3365 3.76352 11.541 3.93247 11.622 4.1655C11.6983 4.39912 11.6325 4.65546 11.453 4.82383L9.27414 6.88619Z"
	                                        fill="#FDFFFE" />
	                                </svg>
	            
	                                <span class="tour-card__rate-num">4.8</span>
	                            </div>
	                        </div>
	                        <div class="tour-card__img-down-row">
	                            <div class="tour-card__period">2 дня</div>
	                        </div>
	                        <img src="<?php bloginfo('template_directory') ?>/assets/image/tour5.0G_G6fwW.jpg" alt="" class="tour-card__img">
	                    </div>
	            
	                    <div class="tour-card__body">
	                        <p class="tour-card__title">
	                            <a href="/tour.html" class="tour-card__title-link">Под парусом от острова к острову: тайский круиз на катамаране</a>
	                        </p>
	                        <ul class="tour-card__date-list">
	                            <li class="tour-card__date">11-12 янв</li>
	                            <li class="tour-card__date">28 янв - 03 мар</li>
	                        </ul>
	                        <p class="tour-card__description">Оказаться в «Руках Бога», запуститьплавучий фонарик в местной Венеции прокатиться в лодке</p>
	                    </div>
	                </div>
	            
	                <div class="tour-card__down">
	                    <div class="tour-card__reserve-row">
	                        <div class="tour-card__price">
	                            $139 / <span>человек</span>
	                        </div>
	            
	                        <a href="/tour.html" class="tour-card__btn">
	                            Забронирывать
	                            <span class="tour-card__btn-ar">
	                                <svg width="145" height="145" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                    <path
	                                        d="M73.9159 71.5561C74.5649 71.2681 74.6248 70.3704 74.0199 69.9991L43.5741 51.3349C43.4355 51.2499 43.2759 51.2051 43.1133 51.205L36.2692 51.2049C35.4461 51.2048 35.0718 52.2329 35.7022 52.7619L63.1592 75.7896C63.417 76.0058 63.7753 76.0571 64.0829 75.9208L73.9159 71.5561Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path
	                                        d="M48.1774 90.2826C48.7627 89.9272 48.7373 89.0692 48.1318 88.7494L32.761 80.6372C32.559 80.5307 32.3237 80.5066 32.1044 80.5702L19.9053 84.1119C19.1923 84.3189 19.0383 85.2612 19.6487 85.6838L36.0472 97.0362C36.3332 97.2342 36.7092 97.2457 37.0066 97.0652L48.1774 90.2826Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path
	                                        d="M122.323 41.536C124.724 44.6844 124.066 49.1917 120.867 51.5239L57.6126 97.623L41.6098 100.973L35.3365 96.4923L112.543 40.1152C115.647 37.8491 119.993 38.4804 122.323 41.536Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path d="M20 110.945H80" stroke="#5DB8A6" stroke-width="2" stroke-linecap="round" />
	                                </svg>
	            
	            
	            
	                            </span>
	                        </a>
	                    </div>
	            
	            
	                </div>
	            
	            
	            </div>
	            <div class="tour-card">
	                <div class="tour-card__top">
	                    <div class="tour-card__img-wrapper">
	                        <div class="tour-card__img-top-row">
	                            <div class="tour-card__tags-row">
	                                <a href="" class="tour-card__tag">Авторский тур</a>
	                                <a href="" class="tour-card__tag">Мини-группы</a>
	                            </div>
	                            <div class="tour-card__rate">
	                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                    <path
	                                        d="M9.27414 6.88619C9.12325 7.03241 9.05392 7.24389 9.08829 7.4513L9.60621 10.3176C9.64991 10.5606 9.54737 10.8064 9.34405 10.9468C9.1448 11.0925 8.87973 11.1099 8.66242 10.9934L6.08214 9.64765C5.99242 9.59988 5.8928 9.57425 5.79085 9.57133H5.63297C5.5782 9.57949 5.52461 9.59697 5.47567 9.62376L2.89481 10.976C2.76722 11.04 2.62274 11.0628 2.48117 11.04C2.13628 10.9748 1.90615 10.6462 1.96267 10.2996L2.48117 7.43324C2.51554 7.22409 2.44621 7.01144 2.29532 6.86288L0.191599 4.82383C0.0156575 4.65313 -0.0455142 4.39679 0.0348829 4.1655C0.11295 3.9348 0.312195 3.76643 0.552803 3.72856L3.44826 3.30851C3.66848 3.28579 3.8619 3.1518 3.96094 2.95372L5.23681 0.337901C5.2671 0.279642 5.30614 0.226044 5.35332 0.180602L5.40576 0.139821C5.43314 0.109526 5.4646 0.0844752 5.49955 0.0640846L5.56306 0.0407811L5.6621 0H5.90737C6.12642 0.0227209 6.31925 0.153803 6.42004 0.349553L7.7128 2.95372C7.80602 3.14423 7.9872 3.27647 8.19635 3.30851L11.0918 3.72856C11.3365 3.76352 11.541 3.93247 11.622 4.1655C11.6983 4.39912 11.6325 4.65546 11.453 4.82383L9.27414 6.88619Z"
	                                        fill="#FDFFFE" />
	                                </svg>
	            
	                                <span class="tour-card__rate-num">4.8</span>
	                            </div>
	                        </div>
	                        <div class="tour-card__img-down-row">
	                            <div class="tour-card__period">2 дня</div>
	                        </div>
	                        <img src="<?php bloginfo('template_directory') ?>/assets/image/tour6.CDOMkz2g.jpg" alt="" class="tour-card__img">
	                    </div>
	            
	                    <div class="tour-card__body">
	                        <p class="tour-card__title">
	                            <a href="/tour.html" class="tour-card__title-link">Релакс-выходные на реке Квай: слоны, сплав на плоту и катание на лодках</a>
	                        </p>
	                        <ul class="tour-card__date-list">
	                            <li class="tour-card__date">11-12 янв</li>
	                            <li class="tour-card__date">28 янв - 03 мар</li>
	                        </ul>
	                        <p class="tour-card__description">Отдохнуть на лучших пляжах, расслабиться во время тайского массажа и посетить</p>
	                    </div>
	                </div>
	            
	                <div class="tour-card__down">
	                    <div class="tour-card__reserve-row">
	                        <div class="tour-card__price">
	                            $139 / <span>человек</span>
	                        </div>
	            
	                        <a href="/tour.html" class="tour-card__btn">
	                            Забронирывать
	                            <span class="tour-card__btn-ar">
	                                <svg width="145" height="145" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                    <path
	                                        d="M73.9159 71.5561C74.5649 71.2681 74.6248 70.3704 74.0199 69.9991L43.5741 51.3349C43.4355 51.2499 43.2759 51.2051 43.1133 51.205L36.2692 51.2049C35.4461 51.2048 35.0718 52.2329 35.7022 52.7619L63.1592 75.7896C63.417 76.0058 63.7753 76.0571 64.0829 75.9208L73.9159 71.5561Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path
	                                        d="M48.1774 90.2826C48.7627 89.9272 48.7373 89.0692 48.1318 88.7494L32.761 80.6372C32.559 80.5307 32.3237 80.5066 32.1044 80.5702L19.9053 84.1119C19.1923 84.3189 19.0383 85.2612 19.6487 85.6838L36.0472 97.0362C36.3332 97.2342 36.7092 97.2457 37.0066 97.0652L48.1774 90.2826Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path
	                                        d="M122.323 41.536C124.724 44.6844 124.066 49.1917 120.867 51.5239L57.6126 97.623L41.6098 100.973L35.3365 96.4923L112.543 40.1152C115.647 37.8491 119.993 38.4804 122.323 41.536Z"
	                                        fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
	                                    <path d="M20 110.945H80" stroke="#5DB8A6" stroke-width="2" stroke-linecap="round" />
	                                </svg>
	            
	            
	            
	                            </span>
	                        </a>
	                    </div>
	            
	            
	                </div>
	            
	            
	            </div>        </div>
	    </div>
	</section>
	
	
	<section class="home-guide-sec">
	    <div class="container">
	        <div class="sec-header">
	            <div class="sec-header__text">
	                <h2 class="sec-title">Гиды по призванию</h2>
	                <p class="sec-header__subtitle">Встречи с интересными людьми, куда бы вы ни поехали</p>
	            </div>
	
	            <!-- <a href="" class="sec-header__btn">Все туры</a> -->
	
	        </div>
	        <div class="home-guide-sec__slider-wrapper">
	            <div class="swiper guide-slider-swiper">
	
	                <div class="swiper-wrapper">
	
	                    <div class="swiper-slide">
	                        <div class="guide-card-2">
	                            <div class="guide-card-2__top">
	                                <a href="/guide.html" class="guide-card-2__img-wrapper">
	                                    <img src="<?php bloginfo('template_directory') ?>/assets/image/guide5.D8m6Xiz9.png" alt="" class="guide-card-2__img">
	                                </a>
	                        
	                                <div class="guide-card-2__data">
	                                    <p class="guide-card-2__name">
	                                        <a href="" class="guide-card-2__name-link">Марина</a>
	                                    </p>
	                                    <p class="guide-card-2__subtitle">Журналист из Петербурга</p>
	                                    <p class="guide-card-2__desctiption">Я филолог, тележурналист и любитель рассказывать истории. Побродить
	                                        маршрутами литературных героев, заглянуть </p>
	                        
	                        
	                                </div>
	                            </div>
	                            <div class="guide-card-2__down">
	                                <div class="guide-card-2__rate-row">
	                                    <div class="guide-card__rate">
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                                        <span class="guide-card__rate-rate-count">5.0</span>
	                                    </div>
	                        
	                                    <div class="guide-card__reviews">
	                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M11.1982 4.09884C12.1086 4.09884 12.8534 3.34535 12.8534 2.42442C12.8534 1.50349 12.1086 0.75 11.1982 0.75C10.2879 0.75 9.54302 1.50349 9.54302 2.42442C9.54302 3.34535 10.2879 4.09884 11.1982 4.09884ZM14.9141 8.57031C14.3047 8.57031 14.0152 8.34323 13.7891 8.22471C13.1046 7.86601 12.5521 7.32976 12.1913 6.69419L11.3637 5.35465C11.0244 4.81046 10.4451 4.51744 9.84095 4.51744C9.19543 4.51744 8.52507 4.93605 8.36783 5.72302L6.02573 17.7119C5.91814 18.2477 6.32366 18.75 6.86988 18.75C7.2754 18.75 7.62299 18.4653 7.71403 18.0719L9.04646 12.0523L10.7844 13.7267V17.9128C10.7844 18.3733 11.1568 18.75 11.612 18.75C12.0672 18.75 12.4396 18.3733 12.4396 17.9128V13.1909C12.4396 12.7305 12.2575 12.2951 11.9265 11.977L10.7017 10.7965L11.1982 8.28488C11.7482 8.92468 12.448 9.45726 13.2417 9.82367C13.6425 10.0086 14.4961 10.2266 14.9141 10.2266C15.332 10.2266 15.75 9.90234 15.75 9.39844C15.75 8.89453 15.3242 8.57031 14.9141 8.57031ZM6.1747 10.4867L4.42019 10.1435C3.97329 10.0514 3.67535 9.61605 3.76639 9.16395L4.39536 5.87372C4.56916 4.96953 5.43813 4.37512 6.33194 4.55093L7.29195 4.74349L6.1747 10.4867Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                        
	                                        <span class="guide-card__reviews-counter">77 отзывов</span>
	                                    </div>
	                                </div>
	                        
	                                <a href="/guide.html" class="guide-card-2__btn">Посмотреть экскурсии гида</a>
	                            </div>
	                        
	                        </div>                    </div>
	
	                    <div class="swiper-slide">
	                        <div class="guide-card-2">
	                            <div class="guide-card-2__top">
	                                <a href="/guide.html" class="guide-card-2__img-wrapper">
	                                    <img src="<?php bloginfo('template_directory') ?>/assets/image/guide6.BJCprAf8.jpg" alt="" class="guide-card-2__img">
	                                </a>
	                        
	                                <div class="guide-card-2__data">
	                                    <p class="guide-card-2__name">
	                                        <a href="" class="guide-card-2__name-link">Марина</a>
	                                    </p>
	                                    <p class="guide-card-2__subtitle">Журналист из Петербурга</p>
	                                    <p class="guide-card-2__desctiption">Я филолог, тележурналист и любитель рассказывать истории. Побродить
	                                        маршрутами литературных героев, заглянуть </p>
	                        
	                        
	                                </div>
	                            </div>
	                            <div class="guide-card-2__down">
	                                <div class="guide-card-2__rate-row">
	                                    <div class="guide-card__rate">
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                                        <span class="guide-card__rate-rate-count">5.0</span>
	                                    </div>
	                        
	                                    <div class="guide-card__reviews">
	                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M11.1982 4.09884C12.1086 4.09884 12.8534 3.34535 12.8534 2.42442C12.8534 1.50349 12.1086 0.75 11.1982 0.75C10.2879 0.75 9.54302 1.50349 9.54302 2.42442C9.54302 3.34535 10.2879 4.09884 11.1982 4.09884ZM14.9141 8.57031C14.3047 8.57031 14.0152 8.34323 13.7891 8.22471C13.1046 7.86601 12.5521 7.32976 12.1913 6.69419L11.3637 5.35465C11.0244 4.81046 10.4451 4.51744 9.84095 4.51744C9.19543 4.51744 8.52507 4.93605 8.36783 5.72302L6.02573 17.7119C5.91814 18.2477 6.32366 18.75 6.86988 18.75C7.2754 18.75 7.62299 18.4653 7.71403 18.0719L9.04646 12.0523L10.7844 13.7267V17.9128C10.7844 18.3733 11.1568 18.75 11.612 18.75C12.0672 18.75 12.4396 18.3733 12.4396 17.9128V13.1909C12.4396 12.7305 12.2575 12.2951 11.9265 11.977L10.7017 10.7965L11.1982 8.28488C11.7482 8.92468 12.448 9.45726 13.2417 9.82367C13.6425 10.0086 14.4961 10.2266 14.9141 10.2266C15.332 10.2266 15.75 9.90234 15.75 9.39844C15.75 8.89453 15.3242 8.57031 14.9141 8.57031ZM6.1747 10.4867L4.42019 10.1435C3.97329 10.0514 3.67535 9.61605 3.76639 9.16395L4.39536 5.87372C4.56916 4.96953 5.43813 4.37512 6.33194 4.55093L7.29195 4.74349L6.1747 10.4867Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                        
	                                        <span class="guide-card__reviews-counter">77 отзывов</span>
	                                    </div>
	                                </div>
	                        
	                                <a href="/guide.html" class="guide-card-2__btn">Посмотреть экскурсии гида</a>
	                            </div>
	                        
	                        </div>                    </div>
	
	                    <div class="swiper-slide">
	                        <div class="guide-card-2">
	                            <div class="guide-card-2__top">
	                                <a href="/guide.html" class="guide-card-2__img-wrapper">
	                                    <img src="<?php bloginfo('template_directory') ?>/assets/image/guide7.CelNsuD5.jpg" alt="" class="guide-card-2__img">
	                                </a>
	                        
	                                <div class="guide-card-2__data">
	                                    <p class="guide-card-2__name">
	                                        <a href="" class="guide-card-2__name-link">Марина</a>
	                                    </p>
	                                    <p class="guide-card-2__subtitle">Журналист из Петербурга</p>
	                                    <p class="guide-card-2__desctiption">Я филолог, тележурналист и любитель рассказывать истории. Побродить
	                                        маршрутами литературных героев, заглянуть </p>
	                        
	                        
	                                </div>
	                            </div>
	                            <div class="guide-card-2__down">
	                                <div class="guide-card-2__rate-row">
	                                    <div class="guide-card__rate">
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                                        <span class="guide-card__rate-rate-count">5.0</span>
	                                    </div>
	                        
	                                    <div class="guide-card__reviews">
	                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M11.1982 4.09884C12.1086 4.09884 12.8534 3.34535 12.8534 2.42442C12.8534 1.50349 12.1086 0.75 11.1982 0.75C10.2879 0.75 9.54302 1.50349 9.54302 2.42442C9.54302 3.34535 10.2879 4.09884 11.1982 4.09884ZM14.9141 8.57031C14.3047 8.57031 14.0152 8.34323 13.7891 8.22471C13.1046 7.86601 12.5521 7.32976 12.1913 6.69419L11.3637 5.35465C11.0244 4.81046 10.4451 4.51744 9.84095 4.51744C9.19543 4.51744 8.52507 4.93605 8.36783 5.72302L6.02573 17.7119C5.91814 18.2477 6.32366 18.75 6.86988 18.75C7.2754 18.75 7.62299 18.4653 7.71403 18.0719L9.04646 12.0523L10.7844 13.7267V17.9128C10.7844 18.3733 11.1568 18.75 11.612 18.75C12.0672 18.75 12.4396 18.3733 12.4396 17.9128V13.1909C12.4396 12.7305 12.2575 12.2951 11.9265 11.977L10.7017 10.7965L11.1982 8.28488C11.7482 8.92468 12.448 9.45726 13.2417 9.82367C13.6425 10.0086 14.4961 10.2266 14.9141 10.2266C15.332 10.2266 15.75 9.90234 15.75 9.39844C15.75 8.89453 15.3242 8.57031 14.9141 8.57031ZM6.1747 10.4867L4.42019 10.1435C3.97329 10.0514 3.67535 9.61605 3.76639 9.16395L4.39536 5.87372C4.56916 4.96953 5.43813 4.37512 6.33194 4.55093L7.29195 4.74349L6.1747 10.4867Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                        
	                                        <span class="guide-card__reviews-counter">77 отзывов</span>
	                                    </div>
	                                </div>
	                        
	                                <a href="/guide.html" class="guide-card-2__btn">Посмотреть экскурсии гида</a>
	                            </div>
	                        
	                        </div>                    </div>
	
	                    <div class="swiper-slide">
	                        <div class="guide-card-2">
	                            <div class="guide-card-2__top">
	                                <a href="/guide.html" class="guide-card-2__img-wrapper">
	                                    <img src="<?php bloginfo('template_directory') ?>/assets/image/guide8.IVOPhPtP.png" alt="" class="guide-card-2__img">
	                                </a>
	                        
	                                <div class="guide-card-2__data">
	                                    <p class="guide-card-2__name">
	                                        <a href="" class="guide-card-2__name-link">Марина</a>
	                                    </p>
	                                    <p class="guide-card-2__subtitle">Журналист из Петербурга</p>
	                                    <p class="guide-card-2__desctiption">Я филолог, тележурналист и любитель рассказывать истории. Побродить
	                                        маршрутами литературных героев, заглянуть </p>
	                        
	                        
	                                </div>
	                            </div>
	                            <div class="guide-card-2__down">
	                                <div class="guide-card-2__rate-row">
	                                    <div class="guide-card__rate">
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                                        <span class="guide-card__rate-rate-count">5.0</span>
	                                    </div>
	                        
	                                    <div class="guide-card__reviews">
	                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M11.1982 4.09884C12.1086 4.09884 12.8534 3.34535 12.8534 2.42442C12.8534 1.50349 12.1086 0.75 11.1982 0.75C10.2879 0.75 9.54302 1.50349 9.54302 2.42442C9.54302 3.34535 10.2879 4.09884 11.1982 4.09884ZM14.9141 8.57031C14.3047 8.57031 14.0152 8.34323 13.7891 8.22471C13.1046 7.86601 12.5521 7.32976 12.1913 6.69419L11.3637 5.35465C11.0244 4.81046 10.4451 4.51744 9.84095 4.51744C9.19543 4.51744 8.52507 4.93605 8.36783 5.72302L6.02573 17.7119C5.91814 18.2477 6.32366 18.75 6.86988 18.75C7.2754 18.75 7.62299 18.4653 7.71403 18.0719L9.04646 12.0523L10.7844 13.7267V17.9128C10.7844 18.3733 11.1568 18.75 11.612 18.75C12.0672 18.75 12.4396 18.3733 12.4396 17.9128V13.1909C12.4396 12.7305 12.2575 12.2951 11.9265 11.977L10.7017 10.7965L11.1982 8.28488C11.7482 8.92468 12.448 9.45726 13.2417 9.82367C13.6425 10.0086 14.4961 10.2266 14.9141 10.2266C15.332 10.2266 15.75 9.90234 15.75 9.39844C15.75 8.89453 15.3242 8.57031 14.9141 8.57031ZM6.1747 10.4867L4.42019 10.1435C3.97329 10.0514 3.67535 9.61605 3.76639 9.16395L4.39536 5.87372C4.56916 4.96953 5.43813 4.37512 6.33194 4.55093L7.29195 4.74349L6.1747 10.4867Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                        
	                                        <span class="guide-card__reviews-counter">77 отзывов</span>
	                                    </div>
	                                </div>
	                        
	                                <a href="/guide.html" class="guide-card-2__btn">Посмотреть экскурсии гида</a>
	                            </div>
	                        
	                        </div>                    </div>
	
	                    <div class="swiper-slide">
	                        <div class="guide-card-2">
	                            <div class="guide-card-2__top">
	                                <a href="/guide.html" class="guide-card-2__img-wrapper">
	                                    <img src="<?php bloginfo('template_directory') ?>/assets/image/guide2.D0mjxsXS.jpg" alt="" class="guide-card-2__img">
	                                </a>
	                        
	                                <div class="guide-card-2__data">
	                                    <p class="guide-card-2__name">
	                                        <a href="" class="guide-card-2__name-link">Марина</a>
	                                    </p>
	                                    <p class="guide-card-2__subtitle">Журналист из Петербурга</p>
	                                    <p class="guide-card-2__desctiption">Я филолог, тележурналист и любитель рассказывать истории. Побродить
	                                        маршрутами литературных героев, заглянуть </p>
	                        
	                        
	                                </div>
	                            </div>
	                            <div class="guide-card-2__down">
	                                <div class="guide-card-2__rate-row">
	                                    <div class="guide-card__rate">
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                                        <span class="guide-card__rate-rate-count">5.0</span>
	                                    </div>
	                        
	                                    <div class="guide-card__reviews">
	                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M11.1982 4.09884C12.1086 4.09884 12.8534 3.34535 12.8534 2.42442C12.8534 1.50349 12.1086 0.75 11.1982 0.75C10.2879 0.75 9.54302 1.50349 9.54302 2.42442C9.54302 3.34535 10.2879 4.09884 11.1982 4.09884ZM14.9141 8.57031C14.3047 8.57031 14.0152 8.34323 13.7891 8.22471C13.1046 7.86601 12.5521 7.32976 12.1913 6.69419L11.3637 5.35465C11.0244 4.81046 10.4451 4.51744 9.84095 4.51744C9.19543 4.51744 8.52507 4.93605 8.36783 5.72302L6.02573 17.7119C5.91814 18.2477 6.32366 18.75 6.86988 18.75C7.2754 18.75 7.62299 18.4653 7.71403 18.0719L9.04646 12.0523L10.7844 13.7267V17.9128C10.7844 18.3733 11.1568 18.75 11.612 18.75C12.0672 18.75 12.4396 18.3733 12.4396 17.9128V13.1909C12.4396 12.7305 12.2575 12.2951 11.9265 11.977L10.7017 10.7965L11.1982 8.28488C11.7482 8.92468 12.448 9.45726 13.2417 9.82367C13.6425 10.0086 14.4961 10.2266 14.9141 10.2266C15.332 10.2266 15.75 9.90234 15.75 9.39844C15.75 8.89453 15.3242 8.57031 14.9141 8.57031ZM6.1747 10.4867L4.42019 10.1435C3.97329 10.0514 3.67535 9.61605 3.76639 9.16395L4.39536 5.87372C4.56916 4.96953 5.43813 4.37512 6.33194 4.55093L7.29195 4.74349L6.1747 10.4867Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                        
	                                        <span class="guide-card__reviews-counter">77 отзывов</span>
	                                    </div>
	                                </div>
	                        
	                                <a href="/guide.html" class="guide-card-2__btn">Посмотреть экскурсии гида</a>
	                            </div>
	                        
	                        </div>                    </div>
	
	                </div>
	
	            </div>
	
	            <div class="swiper-button-blog guide-swiper-button-prev">
	                <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
	                    <path
	                        d="M8.15429 13.7071C8.53841 13.3166 8.53841 12.6834 8.15429 12.2929L2.94817 7L8.15429 1.70711C8.53841 1.31658 8.53841 0.683417 8.15429 0.292893C7.77017 -0.0976315 7.14738 -0.0976315 6.76326 0.292893L0.861622 6.29289C0.4775 6.68342 0.4775 7.31658 0.861622 7.70711L6.76326 13.7071C7.14738 14.0976 7.77017 14.0976 8.15429 13.7071Z"
	                        fill="#5D736E" />
	                </svg>
	            </div>
	            <div class="swiper-button-blog guide-swiper-button-next">
	                <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
	                    <path
	                        d="M0.845709 13.7071C0.461587 13.3166 0.461587 12.6834 0.845709 12.2929L6.05183 7L0.845708 1.70711C0.461586 1.31658 0.461586 0.683417 0.845708 0.292893C1.22983 -0.0976315 1.85262 -0.0976315 2.23674 0.292893L8.13838 6.29289C8.5225 6.68342 8.5225 7.31658 8.13838 7.70711L2.23674 13.7071C1.85262 14.0976 1.22983 14.0976 0.845709 13.7071Z"
	                        fill="#5D736E" />
	                </svg>
	            </div>
	        </div>
	    </div>
	</section>
	
	<section class="home-reviews-sec">
	    <div class="container">
	        <div class="sec-header">
	            <div class="sec-header__text">
	                <h2 class="sec-title">Отзывы</h2>
	                <p class="sec-header__subtitle">Что говорят путешественники о наших турах и гидах</p>
	            </div>
	        </div>
	        <div class="home-reviews-sec__slider-wrapper">
	            <div class="reviews-slider-wrapper">
	                <div class="swiper reviews-slider-swiper">
	                    <div class="swiper-wrapper">
	                        <div class="swiper-slide">
	                            <div class="review-card">
	                                <div class="review-card__head">
	                                    <img src="<?php bloginfo('template_directory') ?>/assets/image/user1.CDEjALZz.webp" alt="MAN" class="review-card__avatar">
	                                    <div class="review-card__user">
	                                        <div class="review-card__user-name">MAN</div>
	                                        <div class="review-card__user-experience">Опыт: 3 экскурсии</div>
	                                    </div>
	                                </div>
	                                <div class="review-card__rating-row">
	                                    <div class="review-card__rating-left">
	                                        <div class="review-card__stars" aria-label="Рейтинг: 4.9 из 5">
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                                        </div>
	                                        <span class="review-card__rating-value">4.9</span>
	                                    </div>
	                                    <time class="review-card__date" datetime="2026-02-04">4 февраля 2026</time>
	                                </div>
	                                <h3 class="review-card__title">Киты, тюлени и невероятная Териберка</h3>
	                                <div class="review-card__text-wrap">
	                                    <p class="review-card__text" data-full-text="Отличная экскурсия! Артём — прекрасный гид, рассказал много интересного, маршрут построен логично. Погода в тот день была не самая удачная, но это не испортило впечатления. Териберка покорила суровой красотой, удалось увидеть китов вдали. Рекомендую всем, кто хочет увидеть настоящий Север.">Отличная экскурсия! Артём — прекрасный гид, рассказал много интересного, маршрут построен логично. Погода в тот день была не самая удачная, но это не испортило впечатления. Териберка покорила суровой красотой, удалось увидеть китов вдали. Рекомендую всем, кто хочет увидеть настоящий Север.</p>
	                                    <button type="button" class="review-card__more" aria-label="Читать полностью" hidden>Ещё</button>
	                                </div>
	                                <div class="review-card__gallery">
	                                    <a href="/src/img/tour1.jpg" class="review-card__gallery-link" data-fancybox="review-gallery-1">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/tour1.AuwWnMIk.jpg" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/tour2.jpg" class="review-card__gallery-link" data-fancybox="review-gallery-1">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/tour2.BtoFcI4-.jpg" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/tour3.jpg" class="review-card__gallery-link" data-fancybox="review-gallery-1">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/tour3.BEpAL6ki.jpg" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/tour4.webp" class="review-card__gallery-link review-card__gallery-link--more" data-fancybox="review-gallery-1">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/tour4.DXsWvHqY.webp" alt="" class="review-card__gallery-img">
	                                        <span class="review-card__gallery-more">+5</span>
	                                    </a>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="swiper-slide">
	                            <div class="review-card">
	                                <div class="review-card__head">
	                                    <img src="<?php bloginfo('template_directory') ?>/assets/image/user1.CDEjALZz.webp" alt="Анна" class="review-card__avatar">
	                                    <div class="review-card__user">
	                                        <div class="review-card__user-name">Анна</div>
	                                        <div class="review-card__user-experience">Опыт: 7 экскурсий</div>
	                                    </div>
	                                </div>
	                                <div class="review-card__rating-row">
	                                    <div class="review-card__rating-left">
	                                        <div class="review-card__stars" aria-label="Рейтинг: 5 из 5">
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                                        </div>
	                                        <span class="review-card__rating-value">5</span>
	                                    </div>
	                                    <time class="review-card__date" datetime="2026-01-28">28 января 2026</time>
	                                </div>
	                                <h3 class="review-card__title">Северные провинции и тысячи островов</h3>
	                                <div class="review-card__text-wrap">
	                                    <p class="review-card__text" data-full-text="Была в туре по Юго-Восточной Азии. Впечатления на всю жизнь — просто фантастически крутое путешествие у нас получилось! Выражаю огромную благодарность агентству и гиду Алёне за то, что подарили мне возможность познакомиться с такими разными, но по-своему чудесными дальними странами!">Была в туре по Юго-Восточной Азии. Впечатления на всю жизнь — просто фантастически крутое путешествие у нас получилось! Выражаю огромную благодарность агентству и гиду Алёне за то, что подарили мне возможность познакомиться с такими разными, но по-своему чудесными дальними странами!</p>
	                                    <button type="button" class="review-card__more" aria-label="Читать полностью" hidden>Ещё</button>
	                                </div>
	                                <div class="review-card__gallery">
	                                    <a href="/src/img/post1.jpg" class="review-card__gallery-link" data-fancybox="review-gallery-2">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/post1.DmBlYCEk.jpg" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/post2.jpg" class="review-card__gallery-link" data-fancybox="review-gallery-2">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/post2.BKyHK2t0.jpg" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/post3.jpg" class="review-card__gallery-link" data-fancybox="review-gallery-2">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/post3.MtZbYBS-.jpg" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/tour5.jpg" class="review-card__gallery-link review-card__gallery-link--more" data-fancybox="review-gallery-2">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/tour5.0G_G6fwW.jpg" alt="" class="review-card__gallery-img">
	                                        <span class="review-card__gallery-more">+2</span>
	                                    </a>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="swiper-slide">
	                            <div class="review-card">
	                                <div class="review-card__head">
	                                    <img src="<?php bloginfo('template_directory') ?>/assets/image/user1.CDEjALZz.webp" alt="Дмитрий" class="review-card__avatar">
	                                    <div class="review-card__user">
	                                        <div class="review-card__user-name">Дмитрий</div>
	                                        <div class="review-card__user-experience">Опыт: 1 экскурсия</div>
	                                    </div>
	                                </div>
	                                <div class="review-card__rating-row">
	                                    <div class="review-card__rating-left">
	                                        <div class="review-card__stars" aria-label="Рейтинг: 4.2 из 5">
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                                        </div>
	                                        <span class="review-card__rating-value">4.2</span>
	                                    </div>
	                                    <time class="review-card__date" datetime="2026-01-15">15 января 2026</time>
	                                </div>
	                                <h3 class="review-card__title">Забыть о делах: отпуск на Пхукете</h3>
	                                <div class="review-card__text-wrap">
	                                    <p class="review-card__text" data-full-text="Поехали с женой в мини-группе. Всё было организовано на высшем уровне: трансферы, отели, экскурсии. Гид Марина знает каждый уголок острова. Полюбовались каскадами рисовых террас, поднялись к Вратам рая. Обязательно вернёмся.">Поехали с женой в мини-группе. Всё было организовано на высшем уровне: трансферы, отели, экскурсии. Гид Марина знает каждый уголок острова. Полюбовались каскадами рисовых террас, поднялись к Вратам рая. Обязательно вернёмся.</p>
	                                    <button type="button" class="review-card__more" aria-label="Читать полностью" hidden>Ещё</button>
	                                </div>
	                                <div class="review-card__gallery">
	                                    <a href="/src/img/tour6.jpg" class="review-card__gallery-link" data-fancybox="review-gallery-3">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/tour6.CDOMkz2g.jpg" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/dir-1.jpg" class="review-card__gallery-link" data-fancybox="review-gallery-3">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-1.C1Ozobgs.jpg" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/dir-2.webp" class="review-card__gallery-link" data-fancybox="review-gallery-3">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-2.CAw743nH.webp" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/dir-3.jpg" class="review-card__gallery-link review-card__gallery-link--more" data-fancybox="review-gallery-3">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-3.BZml2eiK.jpg" alt="" class="review-card__gallery-img">
	                                        <span class="review-card__gallery-more">+0</span>
	                                    </a>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="swiper-slide">
	                            <div class="review-card">
	                                <div class="review-card__head">
	                                    <img src="<?php bloginfo('template_directory') ?>/assets/image/user1.CDEjALZz.webp" alt="Елена" class="review-card__avatar">
	                                    <div class="review-card__user">
	                                        <div class="review-card__user-name">Елена</div>
	                                        <div class="review-card__user-experience">Опыт: 12 экскурсий</div>
	                                    </div>
	                                </div>
	                                <div class="review-card__rating-row">
	                                    <div class="review-card__rating-left">
	                                        <div class="review-card__stars" aria-label="Рейтинг: 4.7 из 5">
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                                        </div>
	                                        <span class="review-card__rating-value">4.7</span>
	                                    </div>
	                                    <time class="review-card__date" datetime="2026-02-02">2 февраля 2026</time>
	                                </div>
	                                <h3 class="review-card__title">Под парусом от острова к острову</h3>
	                                <div class="review-card__text-wrap">
	                                    <p class="review-card__text" data-full-text="Тайский круиз на катамаране превзошёл все ожидания. Оказались в «Руках Бога», запустили плавучий фонарик в местной Венеции, прокатились на лодке по мангровым зарослям. Команда профессиональная, питание отличное. Спасибо за незабываемую неделю!">Тайский круиз на катамаране превзошёл все ожидания. Оказались в «Руках Бога», запустили плавучий фонарик в местной Венеции, прокатились на лодке по мангровым зарослям. Команда профессиональная, питание отличное. Спасибо за незабываемую неделю!</p>
	                                    <button type="button" class="review-card__more" aria-label="Читать полностью" hidden>Ещё</button>
	                                </div>
	                                <div class="review-card__gallery">
	                                    <a href="/src/img/dir-5.jpg" class="review-card__gallery-link" data-fancybox="review-gallery-4">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-5.DJ8SjQhy.jpg" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/dir-6.jpg" class="review-card__gallery-link" data-fancybox="review-gallery-4">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-6.Cjz7bpZz.jpg" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/dir-7.jpg" class="review-card__gallery-link" data-fancybox="review-gallery-4">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-7.yJJ5feKL.jpg" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/dir-8.webp" class="review-card__gallery-link review-card__gallery-link--more" data-fancybox="review-gallery-4">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/dir-8.D4eW1C_4.webp" alt="" class="review-card__gallery-img">
	                                        <span class="review-card__gallery-more">+3</span>
	                                    </a>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="swiper-slide">
	                            <div class="review-card">
	                                <div class="review-card__head">
	                                    <img src="<?php bloginfo('template_directory') ?>/assets/image/user1.CDEjALZz.webp" alt="Игорь" class="review-card__avatar">
	                                    <div class="review-card__user">
	                                        <div class="review-card__user-name">Игорь</div>
	                                        <div class="review-card__user-experience">Опыт: 5 экскурсий</div>
	                                    </div>
	                                </div>
	                                <div class="review-card__rating-row">
	                                    <div class="review-card__rating-left">
	                                        <div class="review-card__stars" aria-label="Рейтинг: 4.5 из 5">
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                            
	                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
	                                                fill="#5DB8A6" />
	                                        </svg>
	                                        </div>
	                                        <span class="review-card__rating-value">4.5</span>
	                                    </div>
	                                    <time class="review-card__date" datetime="2025-12-11">11 декабря 2025</time>
	                                </div>
	                                <h3 class="review-card__title">Релакс-выходные на реке Квай</h3>
	                                <div class="review-card__text-wrap">
	                                    <p class="review-card__text" data-full-text="Слоны, сплав на плоту и катание на лодках — всё в одном туре. Отдохнули на лучших пляжах, расслабились во время тайского массажа. Погода благоволила, гиды весёлые и внимательные. Рекомендую для семейного отдыха.">Слоны, сплав на плоту и катание на лодках — всё в одном туре. Отдохнули на лучших пляжах, расслабились во время тайского массажа. Погода благоволила, гиды весёлые и внимательные. Рекомендую для семейного отдыха.</p>
	                                    <button type="button" class="review-card__more" aria-label="Читать полностью" hidden>Ещё</button>
	                                </div>
	                                <div class="review-card__gallery">
	                                    <a href="/src/img/hotel1.jpg" class="review-card__gallery-link" data-fancybox="review-gallery-5">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/hotel1.1TImfrsa.jpg" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/hotel2.jpg" class="review-card__gallery-link" data-fancybox="review-gallery-5">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/hotel2.C8P72vg9.jpg" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/hotel3.jpg" class="review-card__gallery-link" data-fancybox="review-gallery-5">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/hotel3.BMgFYz7C.jpg" alt="" class="review-card__gallery-img">
	                                    </a>
	                                    <a href="/src/img/hotel4.jpg" class="review-card__gallery-link review-card__gallery-link--more" data-fancybox="review-gallery-5">
	                                        <img src="<?php bloginfo('template_directory') ?>/assets/image/hotel4.CKM21oRd.jpg" alt="" class="review-card__gallery-img">
	                                        <span class="review-card__gallery-more">+1</span>
	                                    </a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="swiper-button-blog reviews-swiper-button-prev">
	                    <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
	                        <path d="M8.15429 13.7071C8.53841 13.3166 8.53841 12.6834 8.15429 12.2929L2.94817 7L8.15429 1.70711C8.53841 1.31658 8.53841 0.683417 8.15429 0.292893C7.77017 -0.0976315 7.14738 -0.0976315 6.76326 0.292893L0.861622 6.29289C0.4775 6.68342 0.4775 7.31658 0.861622 7.70711L6.76326 13.7071C7.14738 14.0976 7.77017 14.0976 8.15429 13.7071Z" fill="#5D736E" />
	                    </svg>
	                </div>
	                <div class="swiper-button-blog reviews-swiper-button-next">
	                    <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
	                        <path d="M0.845709 13.7071C0.461587 13.3166 0.461587 12.6834 0.845709 12.2929L6.05183 7L0.845708 1.70711C0.461586 1.31658 0.461586 0.683417 0.845708 0.292893C1.22983 -0.0976315 1.85262 -0.0976315 2.23674 0.292893L8.13838 6.29289C8.5225 6.68342 8.5225 7.31658 8.13838 7.70711L2.23674 13.7071C1.85262 14.0976 1.22983 14.0976 0.845709 13.7071Z" fill="#5D736E" />
	                    </svg>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	
	<section class="home-faq-sec">
	    <div class="container">
	        <h2 class="sec-title home-faq-sec__title">Частые вопросы путешественников</h2>
	        <div class="faq-accordion">
	            <div class="faq-item">
	                <button type="button" class="faq-item__header" aria-expanded="false" aria-controls="faq-body-1" id="faq-header-1" data-faq-toggle>
	                    <span class="faq-item__question">Можно ли оплатить российской картой за рубежом?</span>
	                    <span class="faq-item__chevron" aria-hidden="true">
	                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
	                            <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	                        </svg>
	                    </span>
	                </button>
	                <div class="faq-item__body" id="faq-body-1" role="region" aria-labelledby="faq-header-1" hidden>
	                    <div class="faq-item__content">
	                        Да, многие туры и экскурсии можно оплатить российской картой. Оплата проходит через платёжную систему на нашем сайте. Рекомендуем уточнить возможность оплаты картой вашего банка при бронировании.
	                    </div>
	                </div>
	            </div>
	            <div class="faq-item">
	                <button type="button" class="faq-item__header" aria-expanded="false" aria-controls="faq-body-2" id="faq-header-2" data-faq-toggle>
	                    <span class="faq-item__question">Как задать вопросы гиду?</span>
	                    <span class="faq-item__chevron" aria-hidden="true">
	                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
	                            <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	                        </svg>
	                    </span>
	                </button>
	                <div class="faq-item__body" id="faq-body-2" role="region" aria-labelledby="faq-header-2" hidden>
	                    <div class="faq-item__content">
	                        После бронирования вы получите контакты гида по e-mail и в личном кабинете. С гидом можно связаться по указанному телефону или в мессенджере. Гиды обычно отвечают в течение нескольких часов в рабочее время.
	                    </div>
	                </div>
	            </div>
	            <div class="faq-item">
	                <button type="button" class="faq-item__header" aria-expanded="false" aria-controls="faq-body-3" id="faq-header-3" data-faq-toggle>
	                    <span class="faq-item__question">Как оплатить экскурсию?</span>
	                    <span class="faq-item__chevron" aria-hidden="true">
	                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
	                            <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	                        </svg>
	                    </span>
	                </button>
	                <div class="faq-item__body" id="faq-body-3" role="region" aria-labelledby="faq-header-3" hidden>
	                    <div class="faq-item__content">
	                        Оплатить экскурсию можно на сайте банковской картой при бронировании или в личном кабинете до начала тура. Для некоторых туров доступна оплата на месте — это указано в описании экскурсии.
	                    </div>
	                </div>
	            </div>
	            <div class="faq-item">
	                <button type="button" class="faq-item__header" aria-expanded="false" aria-controls="faq-body-4" id="faq-header-4" data-faq-toggle>
	                    <span class="faq-item__question">Что делать, если экскурсия не состоится?</span>
	                    <span class="faq-item__chevron" aria-hidden="true">
	                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
	                            <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	                        </svg>
	                    </span>
	                </button>
	                <div class="faq-item__body" id="faq-body-4" role="region" aria-labelledby="faq-header-4" hidden>
	                    <div class="faq-item__content">
	                        Если экскурсия отменена организатором (погода, форс-мажор), мы вернём полную стоимость на карту в течение 5–10 рабочих дней или предложим перенос на другую дату. С вами свяжется менеджер или гид.
	                    </div>
	                </div>
	            </div>
	            <div class="faq-item">
	                <button type="button" class="faq-item__header" aria-expanded="false" aria-controls="faq-body-5" id="faq-header-5" data-faq-toggle>
	                    <span class="faq-item__question">Как вернуть деньги, если планы поменялись?</span>
	                    <span class="faq-item__chevron" aria-hidden="true">
	                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
	                            <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	                        </svg>
	                    </span>
	                </button>
	                <div class="faq-item__body" id="faq-body-5" role="region" aria-labelledby="faq-header-5" hidden>
	                    <div class="faq-item__content">
	                        Возврат возможен по правилам, указанным при бронировании. Обычно при отмене за 24–48 часов до начала возвращается полная сумма; при более поздней отмене — по согласованию. Оформить возврат можно в личном кабинете или через поддержку.
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	
	<section class="home-blog-sec">
	
	    <div class="container">
	        <div class="sec-header">
	            <div class="sec-header__text">
	                <h2 class="sec-title">Полезные статьи</h2>
	                <!-- <p class="sec-header__subtitle">Путешествия в места, которые не посмотреть за день</p> -->
	            </div>
	
	            <a href="" class="sec-header__btn">Все статьи</a>
	        </div>
	    </div>
	
	    <div class="blog-slider-wrapper">
	        <div class="swiper post-slider-swiper">
	    
	            <div class="swiper-wrapper">
	    
	                <div class="swiper-slide">
	                    <div class=" blog-post">
	                        <a href="post.html" class="blog-post__image-wrapper">
	                            <img src="<?php bloginfo('template_directory') ?>/assets/image/post1.DmBlYCEk.jpg" alt="" class="blog-post__image">
	                        </a>
	                        <div class="blog-post__data">
	                            <p class="blog-post__date">21 июня 2025</p>
	                            <div class="blog-post__header">
	                                <p class="blog-post__title">
	                                    Где отдыхать во Вьетнаме
	                                </p>
	                                <a href="post.html" class="blog-post__link-ar">
	                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                        <path
	                                            d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
	                                            fill="#85D2A9" />
	                                    </svg>
	                    
	                                </a>
	                            </div>
	                    
	                            <p class="blog-post__subtitle">В данной статье мы расскажем Вам, про самые
	                                выдающие новостройки Москвы. Рассмотрим отзывы покупателей, ценовую
	                                политику,
	                                расположение, благоустройство...</p>
	                    
	                            <div class="blog-post__teg-row">
	                                <a href="" class="blog-post__teg">Кредитование</a>
	                    
	                                <a href="" class="blog-post__teg">Иновации</a>
	                    
	                                <a href="" class="blog-post__teg">Строительство</a>
	                            </div>
	                        </div>
	                    
	                    </div>            </div>
	    
	                <div class="swiper-slide">
	                    <div class=" blog-post">
	                        <a href="post.html" class="blog-post__image-wrapper">
	                            <img src="<?php bloginfo('template_directory') ?>/assets/image/post2.BKyHK2t0.jpg" alt="" class="blog-post__image">
	                        </a>
	                        <div class="blog-post__data">
	                            <p class="blog-post__date">21 июня 2025</p>
	                            <div class="blog-post__header">
	                                <p class="blog-post__title">
	                                    Фукуок — изумрудный остров в Сиамском заливе
	                                </p>
	                                <a href="post.html" class="blog-post__link-ar">
	                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                        <path
	                                            d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
	                                            fill="#85D2A9" />
	                                    </svg>
	                    
	                                </a>
	                            </div>
	                    
	                            <p class="blog-post__subtitle">В данной статье мы расскажем Вам, про самые
	                                выдающие новостройки Москвы. Рассмотрим отзывы покупателей, ценовую
	                                политику,
	                                расположение, благоустройство...</p>
	                    
	                            <div class="blog-post__teg-row">
	                                <a href="" class="blog-post__teg">Кредитование</a>
	                    
	                                <a href="" class="blog-post__teg">Иновации</a>
	                    
	                                <a href="" class="blog-post__teg">Строительство</a>
	                            </div>
	                        </div>
	                    
	                    </div>            </div>
	    
	    
	                <div class="swiper-slide">
	                    <div class=" blog-post">
	                        <a href="post.html" class="blog-post__image-wrapper">
	                            <img src="<?php bloginfo('template_directory') ?>/assets/image/post3.MtZbYBS-.jpg" alt="" class="blog-post__image">
	                        </a>
	                        <div class="blog-post__data">
	                            <p class="blog-post__date">21 июня 2025</p>
	                            <div class="blog-post__header">
	                                <p class="blog-post__title">
	                                    Вьетнамская кухня: 10 блюд, которые стоит попробовать
	                                </p>
	                                <a href="post.html" class="blog-post__link-ar">
	                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                        <path
	                                            d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
	                                            fill="#85D2A9" />
	                                    </svg>
	                    
	                                </a>
	                            </div>
	                    
	                            <p class="blog-post__subtitle">В данной статье мы расскажем Вам, про самые
	                                выдающие новостройки Москвы. Рассмотрим отзывы покупателей, ценовую
	                                политику,
	                                расположение, благоустройство...</p>
	                    
	                            <div class="blog-post__teg-row">
	                                <a href="" class="blog-post__teg">Кредитование</a>
	                    
	                                <a href="" class="blog-post__teg">Иновации</a>
	                    
	                                <a href="" class="blog-post__teg">Строительство</a>
	                            </div>
	                        </div>
	                    
	                    </div>            </div>
	    
	                <div class="swiper-slide">
	                    <div class=" blog-post">
	                        <a href="post.html" class="blog-post__image-wrapper">
	                            <img src="<?php bloginfo('template_directory') ?>/assets/image/post2.BKyHK2t0.jpg" alt="" class="blog-post__image">
	                        </a>
	                        <div class="blog-post__data">
	                            <p class="blog-post__date">21 июня 2025</p>
	                            <div class="blog-post__header">
	                                <p class="blog-post__title">
	                                    Фукуок — изумрудный остров в Сиамском заливе
	                                </p>
	                                <a href="post.html" class="blog-post__link-ar">
	                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                        <path
	                                            d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
	                                            fill="#85D2A9" />
	                                    </svg>
	                    
	                                </a>
	                            </div>
	                    
	                            <p class="blog-post__subtitle">В данной статье мы расскажем Вам, про самые
	                                выдающие новостройки Москвы. Рассмотрим отзывы покупателей, ценовую
	                                политику,
	                                расположение, благоустройство...</p>
	                    
	                            <div class="blog-post__teg-row">
	                                <a href="" class="blog-post__teg">Кредитование</a>
	                    
	                                <a href="" class="blog-post__teg">Иновации</a>
	                    
	                                <a href="" class="blog-post__teg">Строительство</a>
	                            </div>
	                        </div>
	                    
	                    </div>            </div>
	    
	                <div class="swiper-slide">
	                    <div class=" blog-post">
	                        <a href="post.html" class="blog-post__image-wrapper">
	                            <img src="<?php bloginfo('template_directory') ?>/assets/image/post1.DmBlYCEk.jpg" alt="" class="blog-post__image">
	                        </a>
	                        <div class="blog-post__data">
	                            <p class="blog-post__date">21 июня 2025</p>
	                            <div class="blog-post__header">
	                                <p class="blog-post__title">
	                                    Где отдыхать во Вьетнаме
	                                </p>
	                                <a href="post.html" class="blog-post__link-ar">
	                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                        <path
	                                            d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
	                                            fill="#85D2A9" />
	                                    </svg>
	                    
	                                </a>
	                            </div>
	                    
	                            <p class="blog-post__subtitle">В данной статье мы расскажем Вам, про самые
	                                выдающие новостройки Москвы. Рассмотрим отзывы покупателей, ценовую
	                                политику,
	                                расположение, благоустройство...</p>
	                    
	                            <div class="blog-post__teg-row">
	                                <a href="" class="blog-post__teg">Кредитование</a>
	                    
	                                <a href="" class="blog-post__teg">Иновации</a>
	                    
	                                <a href="" class="blog-post__teg">Строительство</a>
	                            </div>
	                        </div>
	                    
	                    </div>            </div>
	    
	                <div class="swiper-slide">
	                    <div class=" blog-post">
	                        <a href="post.html" class="blog-post__image-wrapper">
	                            <img src="<?php bloginfo('template_directory') ?>/assets/image/post2.BKyHK2t0.jpg" alt="" class="blog-post__image">
	                        </a>
	                        <div class="blog-post__data">
	                            <p class="blog-post__date">21 июня 2025</p>
	                            <div class="blog-post__header">
	                                <p class="blog-post__title">
	                                    Фукуок — изумрудный остров в Сиамском заливе
	                                </p>
	                                <a href="post.html" class="blog-post__link-ar">
	                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                        <path
	                                            d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
	                                            fill="#85D2A9" />
	                                    </svg>
	                    
	                                </a>
	                            </div>
	                    
	                            <p class="blog-post__subtitle">В данной статье мы расскажем Вам, про самые
	                                выдающие новостройки Москвы. Рассмотрим отзывы покупателей, ценовую
	                                политику,
	                                расположение, благоустройство...</p>
	                    
	                            <div class="blog-post__teg-row">
	                                <a href="" class="blog-post__teg">Кредитование</a>
	                    
	                                <a href="" class="blog-post__teg">Иновации</a>
	                    
	                                <a href="" class="blog-post__teg">Строительство</a>
	                            </div>
	                        </div>
	                    
	                    </div>            </div>
	    
	    
	                <div class="swiper-slide">
	                    <div class=" blog-post">
	                        <a href="post.html" class="blog-post__image-wrapper">
	                            <img src="<?php bloginfo('template_directory') ?>/assets/image/post3.MtZbYBS-.jpg" alt="" class="blog-post__image">
	                        </a>
	                        <div class="blog-post__data">
	                            <p class="blog-post__date">21 июня 2025</p>
	                            <div class="blog-post__header">
	                                <p class="blog-post__title">
	                                    Вьетнамская кухня: 10 блюд, которые стоит попробовать
	                                </p>
	                                <a href="post.html" class="blog-post__link-ar">
	                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                        <path
	                                            d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
	                                            fill="#85D2A9" />
	                                    </svg>
	                    
	                                </a>
	                            </div>
	                    
	                            <p class="blog-post__subtitle">В данной статье мы расскажем Вам, про самые
	                                выдающие новостройки Москвы. Рассмотрим отзывы покупателей, ценовую
	                                политику,
	                                расположение, благоустройство...</p>
	                    
	                            <div class="blog-post__teg-row">
	                                <a href="" class="blog-post__teg">Кредитование</a>
	                    
	                                <a href="" class="blog-post__teg">Иновации</a>
	                    
	                                <a href="" class="blog-post__teg">Строительство</a>
	                            </div>
	                        </div>
	                    
	                    </div>            </div>
	    
	    
	    
	            </div>
	    
	    
	        </div>
	    
	        <div class="swiper-button-blog blog-swiper-button-prev">
	            <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
	                <path
	                    d="M8.15429 13.7071C8.53841 13.3166 8.53841 12.6834 8.15429 12.2929L2.94817 7L8.15429 1.70711C8.53841 1.31658 8.53841 0.683417 8.15429 0.292893C7.77017 -0.0976315 7.14738 -0.0976315 6.76326 0.292893L0.861622 6.29289C0.4775 6.68342 0.4775 7.31658 0.861622 7.70711L6.76326 13.7071C7.14738 14.0976 7.77017 14.0976 8.15429 13.7071Z"
	                    fill="#5D736E" />
	            </svg>
	        </div>
	        <div class="swiper-button-blog blog-swiper-button-next">
	            <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
	                <path
	                    d="M0.845709 13.7071C0.461587 13.3166 0.461587 12.6834 0.845709 12.2929L6.05183 7L0.845708 1.70711C0.461586 1.31658 0.461586 0.683417 0.845708 0.292893C1.22983 -0.0976315 1.85262 -0.0976315 2.23674 0.292893L8.13838 6.29289C8.5225 6.68342 8.5225 7.31658 8.13838 7.70711L2.23674 13.7071C1.85262 14.0976 1.22983 14.0976 0.845709 13.7071Z"
	                    fill="#5D736E" />
	            </svg>
	        </div>
	    </div></section>
</main>


<?php get_footer() ?>