<template>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <info-logo-component :class="'img-fluid rounded-start'"/>
            </div>
            <div class="col-md-8">
                <alert-component type="danger" :details="details" title="Erro ao tentar logar" v-if="status"></alert-component>
                <div class="card-header pb-0 text-start">
                    <h4 class="font-weight-bolder">Login</h4>
                    <p class="mb-0">Digite seu e-mail e senha para entrar</p>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input-container-component title="E-mail" id="email" id-help="emailHelp" text-help="">
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="E-mail" v-model="email">
                        </input-container-component>
                    </div>
                    <div class="form-group">
                        <input-container-component title="Senha" id="password" id-help="passwordHelp" text-help="">
                            <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Senha" v-model="password">
                        </input-container-component>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" @click="login()">Logar</button>
                    </div>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-4 text-sm mx-auto">
                        Não tenho uma conta?
                        <a :href="addNewClientUrl" class="text-primary text-gradient font-weight-bold">Inscrever-se</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email: '',
                password: '',
                status: false,
                details: {},
            }   
        },
        methods: {
            login(){

                if (this.email == "" || this.password == "") {
                    this.status = true;
                    this.details = {
                        message: 'E-mail ou senha incorreta!'
                    }
                    return;
                }
                
                axios.post(route('login'), {
                    email : this.email,
                    password : this.password,
                })
                    .then(response => {
                        this.status = false;
                        location.reload();
                    })
                    .catch(errors => {
                        this.status = true;
                        this.details = {
                            data: errors.response.data.errors
                        }
                    })
            }
        },
        computed: {
            addNewClientUrl() {
                return route('users.create');
            },
        }
    }
</script>
