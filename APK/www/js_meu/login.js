class loginClass {

    _submit = () => {
        let email = $("#email").val();
        let senha = $("#senha").val();

        if (!senha || !email || this.logando) {
            return;
        }
        
        this.logando = true;

    }

}

let login = new loginClass();