/**
 * Фильтры рубрик для страницы направления (терма).
 * Использует rubricCounts — количество туров в каждой рубрике для текущего направления.
 */
(function () {
    'use strict';

    if (typeof window.TravelTourCard === 'undefined') return;

    window.TravelDirectionToursFilters = {
        name: 'DirectionToursFilters',
        components: { TourCard: window.TravelTourCard },
        props: {
            tours: { type: Array, default: function () { return []; } },
            rubrics: { type: Array, default: function () { return []; } },
            rubricCounts: { type: Object, default: function () { return {}; } },
            activeRubricId: { default: null },
            totalCount: { type: Number, default: 0 },
            loading: { type: Boolean, default: false },
            loadMoreAvailable: { type: Boolean, default: false },
            tplUri: { type: String, default: '' }
        },
        template: `
            <div class="travel-tours-filters">
                <div class="tours-hero-sec__tegs-wrapper"><h2 class="tours-hero-sec__tegs-title">Рубрики</h2>
                <div class="tours-hero-sec__tegs-row">
                  <button type="button" class="tours-hero-sec__teg tour-teg" :class="{ active: !activeRubricId }" @click="$emit('set-rubric', null)">Все <span class="tour-teg__counter">{{ totalCount }}</span></button>
                  <button type="button" v-for="r in rubrics" :key="r.id" class="tours-hero-sec__teg tour-teg" :class="{ active: activeRubricId === r.id }" @click="$emit('set-rubric', r.id)">{{ r.name }} <span class="tour-teg__counter">{{ rubricCounts[r.id] !== undefined ? rubricCounts[r.id] : 0 }}</span></button>
                </div></div>
              <div class="tours-hero-sec__all-tours-cluster">
                <h3 class="tours-hero-sec__all-tours-title">Все туры</h3>
                <p class="tours-hero-sec__all-tours-subtitle">{{ totalCount }} предложений</p>
                <div class="tours-hero-sec__all-tours-wrapper">
                  <TourCard v-for="t in tours" :key="t.id" :tour="t" :tpl-uri="tplUri" />
                </div>
                <p v-if="loading" class="tours-hero-sec__loading">Загрузка...</p>
                <button v-else-if="loadMoreAvailable && tours.length" type="button" class="tours-hero-sec__load-more" @click="$emit('load-more')">Загрузить ещё</button>
                <p v-else-if="!tours.length && !loading" class="tours-hero-sec__empty">Туры не найдены</p>
              </div>
            </div>
        `
    };
})();
