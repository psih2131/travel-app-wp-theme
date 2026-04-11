/**
 * Секция «Полезные статьи». Загрузка 10 последних постов блога.
 */
(function () {
    'use strict';

    window.TravelBlogSec = {
        name: 'BlogSec',
        components: { BlogPost: window.TravelBlogPost },
        props: {
            apiRoot: { type: String, default: '' },
            blogUrl: { type: String, default: '#' }
        },
        data: function () {
            return {
                posts: [],
                loading: false
            };
        },
        mounted: function () {
            this.loadPosts();
        },
        methods: {
            loadPosts: async function () {
                if (!this.apiRoot) return;
                this.loading = true;
                try {
                    var url = this.apiRoot + '/blog?per_page=10&orderby=date&order=desc&_embed';
                    var res = await fetch(url);
                    var data = await res.json();
                    this.posts = Array.isArray(data) ? data : [];
                } catch (e) {
                    console.error('Ошибка загрузки постов:', e);
                    this.posts = [];
                } finally {
                    this.loading = false;
                }
            }
        },
        template: [
            '<section class="home-blog-sec directions-blog-sec">',
            '  <div class="container">',
            '    <div class="sec-header">',
            '      <div class="sec-header__text"><h2 class="sec-title">Полезные статьи</h2></div>',
            '      <a :href="blogUrl" class="sec-header__btn">Все статьи</a>',
            '    </div>',
            '  </div>',
            '  <div class="blog-slider-wrapper">',
            '    <div class="swiper post-slider-swiper">',
            '      <div class="swiper-wrapper">',
            '        <BlogPost v-for="p in posts" :key="p.id" :post="p" />',
            '      </div>',
            '    </div>',
            '    <p v-if="loading" class="guide-sec__loading">Загрузка...</p>',
            '    <div class="swiper-button-blog blog-swiper-button-prev">',
            '      <svg width="9" height="14" viewBox="0 0 9 14" fill="none"><path d="M8.15429 13.7071C8.53841 13.3166 8.53841 12.6834 8.15429 12.2929L2.94817 7L8.15429 1.70711C8.53841 1.31658 8.53841 0.683417 8.15429 0.292893C7.77017 -0.0976315 7.14738 -0.0976315 6.76326 0.292893L0.861622 6.29289C0.4775 6.68342 0.4775 7.31658 0.861622 7.70711L6.76326 13.7071C7.14738 14.0976 7.77017 14.0976 8.15429 13.7071Z" fill="#5D736E"/></svg>',
            '    </div>',
            '    <div class="swiper-button-blog blog-swiper-button-next">',
            '      <svg width="9" height="14" viewBox="0 0 9 14" fill="none"><path d="M0.845709 13.7071C0.461587 13.3166 0.461587 12.6834 0.845709 12.2929L6.05183 7L0.845708 1.70711C0.461586 1.31658 0.461586 0.683417 0.845708 0.292893C1.22983 -0.0976315 1.85262 -0.0976315 2.23674 0.292893L8.13838 6.29289C8.5225 6.68342 8.5225 7.31658 8.13838 7.70711L2.23674 13.7071C1.85262 14.0976 1.22983 14.0976 0.845709 13.7071Z" fill="#5D736E"/></svg>',
            '    </div>',
            '  </div>',
            '</section>'
        ].join('')
    };
})();
