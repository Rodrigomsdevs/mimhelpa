class loginClass {

    _submit = (btn) => {
        let email = $("#email").val();
        let senha = $("#senha").val();
        let self = this;

        if (!senha || !email || this.logando) {
            return;
        }

        this.logando = true;
        $(btn).html('Entrando....');
        $(btn).attr('disabled', true);


        fetch(config.endPoint + `validar_login?email=${email}&senha=${senha}`).then(function (response) {
            return response.json();
        }).then(function (json) {

            let error = json.error && !json.sucesso;

            Swal.fire({
                icon: (error ? 'error' : 'success'),
                title: (error ? 'AVISO' : 'SUCESSO'),
                text: (error ? json.msg : 'Logado com sucesso!'),
            });


            $(btn).html('Entrar');
            $(btn).removeAttr('disabled');
            self.logando = false;

            if (json.sucesso) {
                session.set(json.retorno[0]);
                $("#gohome").trigger('click');
                window.location.href = '/';
            }

        }).catch((err) => {
            console.log(err);
            $(btn).html('Entrar');
            $(btn).removeAttr('disabled');
            this.logando = false;
        });
    }

}

let login = new loginClass();