/**
 * Страница «Гиды»: REST (список + фильтры по direction), Vue.
 */
(function () {
    'use strict';

    if (typeof Vue === 'undefined') {
        console.error('Vue.js не загружен');
        return;
    }
    if (typeof window.TravelGuidesFilters === 'undefined') {
        console.error('GuidesFilters не загружен.');
        return;
    }

    var PER_PAGE = 12;

    var appEl = document.getElementById('travel-guides-app');
    if (!appEl) {
        return;
    }

    var config = window.travelGuidesPageConfig || {};
    var guidesApi = config.guidesApi || '';
    var filtersApi = config.guidesFiltersApi || '';

    Vue.createApp({
        components: {
            GuidesFilters: window.TravelGuidesFilters
        },
        data: function () {
            return {
                guides: [],
                directions: [],
                directionsTotal: 0,
                activeDirectionId: null,
                totalCount: 0,
                currentPage: 1,
                loading: false,
                loadMoreAvailable: false
            };
        },
        methods: {
            loadFiltersMeta: async function () {
                if (!filtersApi) {
                    return;
                }
                try {
                    var res = await fetch(filtersApi);
                    var data = await res.json();
                    this.directions = Array.isArray(data.directions) ? data.directions : [];
                    this.directionsTotal = typeof data.total === 'number' ? data.total : 0;
                } catch (e) {
                    console.error('Ошибка загрузки фильтров гидов:', e);
                }
            },
            buildGuidesUrl: function (pageNum, reset) {
                var p = reset ? 1 : pageNum;
                var dir = this.activeDirectionId ? this.activeDirectionId : 0;
                return guidesApi + '?per_page=' + PER_PAGE + '&page=' + p + '&direction=' + dir;
            },
            loadGuides: async function (reset) {
                if (!guidesApi) {
                    console.warn('guidesApi не задан в travelGuidesPageConfig.');
                    return;
                }
                if (this.loading) {
                    return;
                }

                if (reset) {
                    this.guides = [];
                    this.currentPage = 1;
                    this.loadMoreAvailable = false;
                }

                this.loading = true;
                try {
                    var url = this.buildGuidesUrl(this.currentPage, reset);
                    var res = await fetch(url);
                    var data = await res.json();

                    this.totalCount = data && typeof data.total === 'number' ? data.total : 0;
                    var items = data && Array.isArray(data.items) ? data.items : [];

                    if (reset) {
                        this.guides = items;
                    } else {
                        this.guides = this.guides.concat(items);
                    }

                    var got = items.length;
                    this.loadMoreAvailable = got === PER_PAGE && this.guides.length < this.totalCount;
                    this.currentPage = reset ? 2 : this.currentPage + 1;
                } catch (e) {
                    console.error('Ошибка загрузки гидов:', e);
                    this.loadMoreAvailable = false;
                } finally {
                    this.loading = false;
                }
            },
            setDirection: function (id) {
                if (id === null || id === undefined) {
                    this.activeDirectionId = null;
                } else {
                    this.activeDirectionId = id === this.activeDirectionId ? null : id;
                }
                this.loadGuides(true);
            },
            loadMore: function () {
                this.loadGuides(false);
            }
        },
        mounted: function () {
            this.loadFiltersMeta();
            this.loadGuides(true);
        },
        template: [
            '<GuidesFilters',
            '  :guides="guides"',
            '  :directions="directions"',
            '  :active-direction-id="activeDirectionId"',
            '  :directions-total="directionsTotal"',
            '  :total-count="totalCount"',
            '  :loading="loading"',
            '  :load-more-available="loadMoreAvailable"',
            '  @set-direction="setDirection"',
            '  @load-more="loadMore"',
            '/>'
        ].join(' ')
    }).mount('#travel-guides-app');
})();
