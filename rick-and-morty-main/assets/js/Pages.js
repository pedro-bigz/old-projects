const Pages = (function() { 'use strict'
    const BaseSelector = 'page';

    const API = {
        URLS: {
            MAIN:       'https://rickandmortyapi.com/api',
            CHARACTER:  'https://rickandmortyapi.com/api/characters',
            LOCATIONS:  'https://rickandmortyapi.com/api/locations',
            EPISODES:   'https://rickandmortyapi.com/api/episodes',
        }
    }

    const Events = {
        MOUSE_OVER:     'mouseover',
        MOUSE_LEAVE:    'mouseleave',
        MOUSE_OUT:      'mouseout',
        CLICK:          'click',
        TOUCH:          'touchstart',
        SCROLL:         'scroll',
        LOAD:           'load',
        DESTROY:        'destroy',
        INIT:           'init',
    };

    const ClassName = {
        PAGE_CONTAINER: 'main',
        PAGES:          BaseSelector,
        ACTIVE:         'active',
    };
    
    const Selector = {
        PAGE_CONTAINER: '.main',
        PAGES:          '.' + BaseSelector,
        ACTIVE:         '.active',
    };
        
    class Pages {
        constructor() {
            this._container = this._getElem(Selector.PAGE_CONTAINER);
            this._pages = this._container.querySelectorAll(Selector.PAGES);
        }

        _getElem(cssSelector) {
            return document.querySelector(cssSelector);
        }

        _openPage(pageSelector) {
            var _this = this;

            _this._hidePages();
            _this._getElem(pageSelector).classList.add(ClassName.ACTIVE);
            _this.renderPage(pageSelector);
        }

        _hidePages() {
            var _this = this;
            _this._pages.forEach(page => {
                if (page.classList.contains(ClassName.ACTIVE)) {
                    page.classList.remove(ClassName.ACTIVE);
                }
            });
        }

        _getApiUrl(index) {
            return API.URLS[index];
        }

        renderPage(pageSelector) {
            var url, page, _this = this;
            
            page = pageSelector.replace(".page-", "").toUpperCase();
            url = _this._getApiUrl(index)


        }
    }
    
    return Pages;
})();

export default Pages;