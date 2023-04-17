import Pages from "./Pages";

const Sidebar = (function() { 'use strict'
    const BaseSelector = 'sidebar';

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
        SIDEBAR:        BaseSelector,
        NAV_ITEM:       BaseSelector + '-item',
        NAV_OPENED:     BaseSelector + '-opened',
        ACTIVE:         'active',
    };
    
    const Selector = {
        SIDEBAR_ID:     '#' + BaseSelector,
        SIDEBAR:        '.' + BaseSelector,
        TOGGLE_BUTTON:  '.' + BaseSelector + '-toggle',
        NAV_ITEM:       '.' + BaseSelector + '-item',
        NAV_OPENED:     '.' + BaseSelector + '-opened',
        NAV_BUTTON:     '.' + BaseSelector + '-button',
        NAV_BADGE:      '.' + BaseSelector + '-badge',
        NAV_DIVISOR:    '.' + BaseSelector + '-divisor',
        NAV_SVG:        '.sidebar .sidebar-item svg', 
        MAIN:           '.main',
        PAGES:          '.main .page',
    };
        
    class Sidebar {
        constructor() {
            this._element = this._getElem(Selector.SIDEBAR_ID);
            this._sidebaritens = this._element.querySelectorAll(Selector.NAV_ITEM);
            this._pages = new Pages();
            this._toggleBtn = this._getElem(Selector.TOGGLE_BUTTON);
            this.appSidebarContainer = this._getElem(Selector.APP_SIDEBAR_CONTAINER);

            this.perfectScrollbar(Events.INIT);
            this._openPage();
            this._addEventListener();
        }

        _getElem(cssSelector) {
            return document.querySelector(cssSelector);
        }

        _addEventListener() {
            var _this = this;
            _this._toggleBtn.addEventListener(Events.CLICK, (e) => {
                if (_this._element.classList.contains(ClassName.NAV_OPENED)) {
                    _this._element.classList.remove(ClassName.NAV_OPENED);
                } else {
                    _this._element.classList.add(ClassName.NAV_OPENED);
                }
            });

            _this._element.addEventListener(Events.MOUSE_OVER, (e) => {
                e.stopPropagation();
                e.preventDefault();

                if (!_this._element.classList.contains(ClassName.NAV_OPENED)) {
                    _this._element.classList.add(ClassName.NAV_OPENED);
                }
            });
            
            _this._element.addEventListener(Events.MOUSE_LEAVE, (e) => {
                e.stopPropagation();
                e.preventDefault();

                if (_this._element.classList.contains(ClassName.NAV_OPENED)) {
                    _this._element.classList.remove(ClassName.NAV_OPENED);
                }
            })

            _this._sidebaritens.forEach(item => {
                item.addEventListener(Events.CLICK, (e) => {
                    _this._openPage(item.id);
                })
            })
        }

        _openPage(linkId) {
            var _this = this;

            _this._closeItens();  

            _this._pages._openPage('.page-' + linkId);              
            _this._getElem('#' + linkId).classList.add(ClassName.ACTIVE);
        }

        _closeItens() {
            var _this = this;

            _this._sidebaritens.forEach(item => {
                if (item.classList.contains(ClassName.ACTIVE)) {
                    item.classList.remove(ClassName.ACTIVE);
                }
            });
        }
    }
    
    return Sidebar;
})();


export default Sidebar;