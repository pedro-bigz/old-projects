const Pages = (function() { 'use strict'
    const URLS = {
        MAIN:       'https://rickandmortyapi.com/api/',
        CHARACTER:  'https://rickandmortyapi.com/api/characters/',
        LOCATIONS:  'https://rickandmortyapi.com/api/locations/',
        EPISODES:   'https://rickandmortyapi.com/api/episodes/',
    }

    class Pages {
        constructor() {
            this._container = this._getElem(Selector.PAGE_CONTAINER);
            this._pages = this._container.querySelectorAll(Selector.PAGES);
        }
        
        _search(url, query) {

        }

        _getCharacters(page = null) {
            var url = URLS.CHARACTER + (page ? '?page=' + page : '')
            fetch
        }

        _getCharacter(characterId) {
            var url = URLS.CHARACTER + characterId;
            fetch
        }
    }
    
    return Pages;
})();

export default Pages;