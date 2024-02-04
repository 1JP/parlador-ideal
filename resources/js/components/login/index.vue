<template>
    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
        <div class="card card-plain">
            <alert-component type="danger" :details="details" title="Erro ao tentar logar" v-if="status"></alert-component>
            <div class="card-header pb-0 text-start">
                <h4 class="font-weight-bolder">Login</h4>
                <p class="mb-0">Digite seu e-mail e senha para entrar</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input-container-component title="E-mail" id="novoEmail" id-help="novoEmailHelp" text-help="">
                        <input type="email" class="form-control" id="novoEmail" aria-describedby="novoEmailHelp" placeholder="E-mail" v-model="email">
                    </input-container-component>
                </div>
                <div class="form-group">
                    <input-container-component title="Senha" id="novoSenha" id-help="novoSenhaHelp" text-help="">
                        <input type="password" class="form-control" id="novoSenha" aria-describedby="novoSenhaHelp" placeholder="Senha" v-model="password">
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
    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
        <info-logo-component>
            <h4 class="mt-5 text-white font-weight-bolder position-relative">"Parlador Ideal"</h4>
            <p class="text-white position-relative">Visa facilitar a troca de ideias libertárias do grupo colaboradores.</p>
        </info-logo-component>
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
                let vm = this;
                let data = {};

                if (vm.email == "" || vm.password == "") {
                    vm.status = true;
                    vm.details = {
                        message: 'E-mail ou senha incorreta!'
                    }
                    return;
                }
                data = {
                    email : vm.email,
                    password : vm.password,
                };
                
                axios.post(route('login'), data)
                    .then(response => {
                        vm.status = false;
                        location.reload();
                    })
                    .catch(errors => {
                        vm.status = true;
                        vm.details = {
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
