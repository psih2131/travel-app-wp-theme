/**
 * Vue 3: иерархические таксономии (направление).
 * 1 родитель + опционально 1 ребёнок. Снятие родителя — снимает ребёнка.
 */
(function () {
    'use strict';

    if (typeof Vue === 'undefined') {
        console.error('Vue.js не загружен');
        return;
    }

    function mountTaxApp(el) {
        var taxonomy = el.getAttribute('data-taxonomy');
        var termsJson = el.getAttribute('data-terms');
        var selectedParent = parseInt(el.getAttribute('data-selected-parent') || '0', 10);
        var selectedChild = parseInt(el.getAttribute('data-selected-child') || '0', 10);

        var tree = [];
        try {
            tree = termsJson ? JSON.parse(termsJson) : [];
        } catch (e) {
            console.error('Ошибка парсинга terms:', e);
        }

        var app = Vue.createApp({
            data: function () {
                return {
                    taxonomy: taxonomy,
                    parents: tree,
                    selectedParentId: selectedParent,
                    selectedChildId: selectedChild
                };
            },
            methods: {
                onParentChange: function (parentId, checked) {
                    if (checked) {
                        this.selectedParentId = parentId;
                        this.selectedChildId = 0;
                    } else {
                        var p = this.parents.find(function (x) { return x.id === parentId; });
                        if (p && p.children) {
                            p.children.forEach(function (c) {
                                if (c.id === this.selectedChildId) {
                                    this.selectedChildId = 0;
                                }
                            }.bind(this));
                        }
                        this.selectedParentId = 0;
                        this.selectedChildId = 0;
                    }
                },
                onChildChange: function (childId, parentId, checked) {
                    if (checked) {
                        this.selectedChildId = childId;
                        this.selectedParentId = parentId;
                    } else {
                        this.selectedChildId = 0;
                    }
                },
                isParentChecked: function (parentId) {
                    return this.selectedParentId === parentId || (this.selectedChildId > 0 && this.getParentOfChild(this.selectedChildId) === parentId);
                },
                isChildChecked: function (childId, parentId) {
                    return this.selectedChildId === childId && this.selectedParentId === parentId;
                },
                isChildrenVisible: function (parentId) {
                    return this.selectedParentId === parentId;
                },
                getParentOfChild: function (childId) {
                    for (var i = 0; i < this.parents.length; i++) {
                        var p = this.parents[i];
                        if (p.children && p.children.some(function (c) { return c.id === childId; })) {
                            return p.id;
                        }
                    }
                    return 0;
                }
            },
            template: [
                '<div class="travel-tax-vue">',
                '  <div v-for="parent in parents" :key="parent.id" class="travel-tax-parent">',
                '    <label class="travel-tax-parent-label">',
                '      <input type="checkbox" :checked="isParentChecked(parent.id)" @change="onParentChange(parent.id, $event.target.checked)">',
                '      {{ parent.name }}',
                '    </label>',
                '    <div v-show="isChildrenVisible(parent.id)" v-if="parent.children && parent.children.length" class="travel-tax-children">',
                '      <label v-for="child in parent.children" :key="child.id" class="travel-tax-child-label">',
                '        <input type="checkbox" :checked="isChildChecked(child.id, parent.id)" @change="onChildChange(child.id, parent.id, $event.target.checked)">',
                '        {{ child.name }}',
                '      </label>',
                '    </div>',
                '  </div>',
                '  <input type="hidden" :name="\'travel_\' + taxonomy + \'_parent\'" :value="selectedParentId">',
                '  <input type="hidden" :name="\'travel_\' + taxonomy + \'_child\'" :value="selectedChildId">',
                '</div>'
            ].join('')
        });

        app.mount(el);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    function init() {
        document.querySelectorAll('.travel-hierarchical-tax').forEach(mountTaxApp);
    }
})();
