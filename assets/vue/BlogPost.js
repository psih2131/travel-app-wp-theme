/**
 * Карточка поста блога.
 */
(function () {
    'use strict';

    function formatDate(iso) {
        if (!iso) return '';
        var d = new Date(iso);
        var months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
        return d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear();
    }

    window.TravelBlogPost = {
        name: 'BlogPost',
        props: {
            post: { type: Object, required: true }
        },
        computed: {
            imgUrl: function () {
                var acf = this.post.acf || {};
                var img = acf.izobrazhenie_posta;
                if (img && typeof img === 'object' && img.url) return img.url;
                if (img && typeof img === 'string') return img;
                return '';
            },
            imgAlt: function () {
                var acf = this.post.acf || {};
                var img = acf.izobrazhenie_posta;
                if (img && typeof img === 'object' && img.alt) return img.alt;
                return this.post.title && this.post.title.rendered ? this.post.title.rendered : '';
            },
            subtitle: function () {
                var acf = this.post.acf || {};
                return acf.kratkoe_soderzhanie || (this.post.excerpt && this.post.excerpt.rendered ? this.post.excerpt.rendered.replace(/<[^>]+>/g, '') : '');
            },
            dateStr: function () {
                return formatDate(this.post.date);
            },
            categories: function () {
                var emb = this.post._embedded || {};
                var terms = emb['wp:term'] || [];
                var out = [];
                for (var i = 0; i < terms.length; i++) {
                    if (Array.isArray(terms[i])) {
                        for (var j = 0; j < terms[i].length; j++) {
                            if (terms[i][j] && terms[i][j].name) out.push(terms[i][j]);
                        }
                    }
                }
                return out;
            }
        },
        template: [
            '<div class="blog-post swiper-slide">',
            '  <a :href="post.link" class="blog-post__image-wrapper">',
            '    <img v-if="imgUrl" :src="imgUrl" :alt="imgAlt" class="blog-post__image">',
            '  </a>',
            '  <div class="blog-post__data">',
            '    <p class="blog-post__date">{{ dateStr }}</p>',
            '    <div class="blog-post__header">',
            '      <p class="blog-post__title">{{ post.title && post.title.rendered ? post.title.rendered : "" }}</p>',
            '      <a :href="post.link" class="blog-post__link-ar">',
            '        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z" fill="#85D2A9"/></svg>',
            '      </a>',
            '    </div>',
            '    <p v-if="subtitle" class="blog-post__subtitle">{{ subtitle }}</p>',
            '    <div v-if="categories.length" class="blog-post__teg-row">',
            '      <a v-for="c in categories" :key="c.id" :href="c.link || \'#\'" class="blog-post__teg">{{ c.name }}</a>',
            '    </div>',
            '  </div>',
            '</div>'
        ].join('')
    };
})();
