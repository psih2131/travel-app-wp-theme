/**
 * Страница направления (дочерний терм): туры по направлению.
 * Отдельный скрипт и запросы от archive-tours.
 */
(function () {
    'use strict';

    if (typeof Vue === 'undefined') {
        console.error('Vue.js не загружен');
        return;
    }
    if (typeof window.TravelDirectionToursFilters === 'undefined') {
        console.error('DirectionToursFilters не загружен.');
        return;
    }
    if (typeof window.TravelGuideSec === 'undefined' || typeof window.TravelReviewsSec === 'undefined') {
        console.error('GuideSec или ReviewsSec не загружены.');
        return;
    }

    var PER_PAGE = 12;

    var appEl = document.getElementById('travel-direction-tours-app');
    if (!appEl) return;

    var config = window.travelDirectionToursConfig || {};
    var apiRoot = config.apiRoot || (config.siteUrl ? config.siteUrl + '/wp-json/wp/v2' : '');
    var tplUri = config.tplUri || '';
    var siteUrl = config.siteUrl || '';
    var toursUrl = config.toursUrl || (siteUrl + 'tours/');
    var guidesUrl = config.guidesUrl || (siteUrl + 'guides/');
    var guidesApi = config.guidesApi || (siteUrl + 'wp-json/custom-endpoints/v1/guides');
    var directionId = config.directionId || 0;
    var heroTitle = config.heroTitle || '';
    var heroSub = config.heroSub || '';
    var breadcrumbCurrent = config.breadcrumbCurrent || heroTitle;

    var app = Vue.createApp({
        components: {
            DirectionToursFilters: window.TravelDirectionToursFilters,
            GuideSec: window.TravelGuideSec,
            ReviewsSec: window.TravelReviewsSec
        },
        data: function () {
            return {
                tours: [],
                rubrics: [],
                rubricCounts: {},
                activeRubricId: null,
                totalCount: 0,
                currentPage: 1,
                loading: false,
                loadMoreAvailable: true,
                apiRoot: apiRoot,
                tplUri: tplUri,
                siteUrl: siteUrl,
                toursUrl: toursUrl,
                guidesUrl: guidesUrl,
                guidesApi: guidesApi,
                directionId: directionId,
                heroTitle: heroTitle,
                heroSub: heroSub,
                breadcrumbCurrent: breadcrumbCurrent
            };
        },
        methods: {
            buildToursUrl: function (page, reset) {
                var pageNum = reset ? 1 : (page || this.currentPage);
                var url = this.apiRoot + '/tours?per_page=' + PER_PAGE + '&page=' + pageNum + '&_embed&direction=' + this.directionId;
                if (this.activeRubricId) {
                    url += '&tour-rubric=' + this.activeRubricId;
                }
                return url;
            },
            loadRubrics: async function () {
                if (!this.apiRoot) return;
                try {
                    var res = await fetch(this.apiRoot + '/tour-rubric?per_page=100');
                    var data = await res.json();
                    this.rubrics = Array.isArray(data) ? data : [];
                } catch (e) {
                    console.error('Ошибка загрузки рубрик:', e);
                }
            },
            loadRubricCounts: async function () {
                if (!this.apiRoot || !this.directionId) return;
                try {
                    var url = this.apiRoot + '/tours?direction=' + this.directionId + '&per_page=100&_embed';
                    var res = await fetch(url);
                    var data = await res.json();
                    var tours = Array.isArray(data) ? data : [];
                    var counts = {};
                    tours.forEach(function (t) {
                        var embedded = t._embedded && t._embedded['wp:term'];
                        if (!embedded || !Array.isArray(embedded)) return;
                        embedded.forEach(function (group) {
                            if (group && group[0] && group[0].taxonomy === 'tour-rubric') {
                                group.forEach(function (term) {
                                    if (term && term.id) counts[term.id] = (counts[term.id] || 0) + 1;
                                });
                            }
                        });
                    });
                    this.rubricCounts = counts;
                } catch (e) {
                    console.error('Ошибка загрузки счётчиков рубрик:', e);
                }
            },
            loadTours: async function (reset) {
                if (!this.apiRoot) return;
                if (this.loading) return;

                if (reset) {
                    this.tours = [];
                    this.currentPage = 1;
                    this.loadMoreAvailable = true;
                }

                this.loading = true;
                try {
                    var url = this.buildToursUrl(this.currentPage, reset);
                    var res = await fetch(url);
                    var data = await res.json();

                    var total = res.headers.get('X-WP-Total');
                    this.totalCount = total ? parseInt(total, 10) : 0;

                    if (reset) {
                        this.tours = Array.isArray(data) ? data : [];
                    } else {
                        this.tours = this.tours.concat(Array.isArray(data) ? data : []);
                    }

                    var got = Array.isArray(data) ? data.length : 0;
                    this.loadMoreAvailable = got === PER_PAGE && this.tours.length < this.totalCount;
                    this.currentPage = reset ? 2 : this.currentPage + 1;
                } catch (e) {
                    console.error('Ошибка загрузки туров:', e);
                    this.loadMoreAvailable = false;
                } finally {
                    this.loading = false;
                }
            },
            setRubric: function (id) {
                this.activeRubricId = id === this.activeRubricId ? null : id;
                this.loadTours(true);
            },
            loadMore: function () {
                this.loadTours(false);
            }
        },
        mounted: function () {
            this.loadRubrics();
            this.loadRubricCounts();
            this.loadTours(true);
        },
        template: [
            '<section class="tours-hero-sec"><div class="container">',
            '  <div class="bread-crumbs">',
            '    <a :href="siteUrl" class="bread-crumbs__link">Главная <svg width="6" height="8" viewBox="0 0 6 8" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.4394 3.99908L0.969727 1.52941L2.03039 0.46875L5.56072 3.99908L2.03039 7.52941L0.969727 6.46875L3.4394 3.99908Z" fill="#202020"/></svg></a>',
            '    <p class="bread-crumbs__current">{{ breadcrumbCurrent }}</p>',
            '  </div>',
            '  <h1 class="tours-hero-sec__title">{{ heroTitle }}</h1>',
            '  <p v-if="heroSub" class="tours-hero-sec__subtitle">{{ heroSub }}</p>',
            '  <DirectionToursFilters :tours="tours" :rubrics="rubrics" :rubric-counts="rubricCounts" :active-rubric-id="activeRubricId" :total-count="totalCount" :loading="loading" :load-more-available="loadMoreAvailable" :tpl-uri="tplUri" @set-rubric="setRubric" @load-more="loadMore" />',
            '</div></section>',
            '<GuideSec :guides-api="guidesApi" :guides-url="guidesUrl" />',
            '<ReviewsSec :tpl-uri="tplUri" :tours-url="toursUrl" />'
        ].join('')
    });

    app.mount('#travel-direction-tours-app');
})();
