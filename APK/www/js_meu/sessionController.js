class sessionControllerClass {

    constructor() {
        this.session = localStorage.getItem('session');
    }

    getAltura = () => {
        let session = JSON.parse(this.session);
        return session.altura;
    }

    getData_nascimento = () => {
        let session = JSON.parse(this.session);
        return session.data_nascimento;
    }

    getData_cadastro = () => {
        let session = JSON.parse(this.session);
        return session.data_cadastro;
    }

    getEmail = () => {
        let session = JSON.parse(this.session);
        return session.email;
    }

    getNome = () => {
        let session = JSON.parse(this.session);
        return session.nome_completo;
    }

    getID = () => {
        let session = JSON.parse(this.session);
        return session.id;
    }

    set = (dados) => {
        localStorage.setItem('session', JSON.stringify(dados));
    }

    destroy = () => {
        localStorage.removeItem('session');
    }

    has = () => {

        if (!(this.session)) {
            return false;
        }

        let session = JSON.parse(this.session);

        if (!(session.id)) {
            return false;
        }

        return true;

    }

}

let session = new sessionControllerClass();