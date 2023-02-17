class backButtonClass {

    constructor() {
        document.addEventListener("backbutton", this._onBackKeyDown, false);
        this.thiss = this;
    }

    async _onBackKeyDown(e) {
        e.preventDefault();
        var path = window.location.pathname;
        var paginaAtual = path.split("/").pop();
        var paginas = backButton._getSessionLocation();
        var totalPaginas = paginas.length;

        paginas.splice(paginas.length - 1, 1);
        localStorage.setItem('locations', JSON.stringify(paginas));
        localStorage.removeItem('conferencia_atual');

        window.history.back();

    }

    _cancelBack() { }

    _getSessionLocation() {
        return (localStorage.getItem('locations') ? JSON.parse(localStorage.getItem('locations')) : []);
    }

    _openPage(page) {
        var locations = this._getSessionLocation();
        if (!(locations.indexOf(page) > -1)) {
            locations.push(page);
            localStorage.setItem('locations', JSON.stringify(locations));
        }

        window.location.href = page;
    }

    _getPage() {
        var path = window.location.pathname.split('/');
        return path[path.length - 1];
    }

}


let backButton = new backButtonClass();


