<template>
    <div class="form-group">
        <div class="row">
            <alert-component type="danger" :details="details" title="Erro no cadastro" v-if="status"></alert-component>
            <div class="form-group col-md-6">
                <input-container-component title="Nome*" id="name" id-help="nameHelp" text-help="">
                    <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Nome" v-model="name">
                </input-container-component>
            </div>
            <div class="form-group col-md-6">
                <input-container-component title="E-mail*" id="email" id-help="emailHelp" text-help="">
                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="E-mail" v-model="email">
                </input-container-component>
            </div>
            <div class="form-group col-md-6">
                <input-container-component title="Senha*" id="password" id-help="passwordHelp" text-help="">
                    <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Senha" v-model="password">
                </input-container-component>
            </div>
            <div class="form-group col-md-6">
                <input-container-component title="Confirmar Senha*" id="confirmPassword" id-help="confirmPasswordHelp" text-help="">
                    <input type="password" class="form-control" id="confirmPassword" aria-describedby="confirmPasswordHelp" placeholder="Confirmar Senha" v-model="confirm_password">
                </input-container-component>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" @click="create()">Cadastrar</button>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                email: '',
                password: '',
                confirm_password: '',
                status: false,
                details: {},
            }
        },
        methods: {
            create(){
                if (this.password.length < 8) {
                    this.status = true;
                    this.details = {
                        message: 'A senha precisa ter no mínimo 8 caracteres!'
                    }
                    return;
                }

                if (this.password != this.confirm_password) {
                    this.status = true;
                    this.details = {
                        message: 'Senha não são iguais!'
                    }
                    return;
                }
                
                axios.post(route('api.users.store'), {
                    name : this.name,
                    email : this.email,
                    password : this.password,
                })
                    .then(response => {
                        this.status = false;
                        sessionStorage.setItem('message', 'Cliente cadastrado com sucesso!');
                        location.href = route('auth.login');
                    })
                    .catch(errors => {
                        this.status = true;
                        this.details = {
                            data: errors.response.data.errors
                        }
                    })
            },
        }
    }
</script>
