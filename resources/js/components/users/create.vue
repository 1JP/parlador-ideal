<template>
    <div class="form-group">
        <div class="row">
            <alert-component type="danger" :details="details" title="Erro no cadastro" v-if="status"></alert-component>
            <div class="form-group col-md-6">
                <input-container-component title="Nome" id="novoNome" id-help="novoNomeHelp" text-help="">
                    <input type="text" class="form-control" id="novoNome" aria-describedby="novoNomeHelp" placeholder="Nome" v-model="name">
                </input-container-component>
            </div>
            <div class="form-group col-md-6">
                <input-container-component title="E-mail" id="novoEmail" id-help="novoEmailHelp" text-help="">
                    <input type="text" class="form-control" id="novoEmail" aria-describedby="novoEmailHelp" placeholder="E-mail" v-model="email">
                </input-container-component>
            </div>
            <div class="form-group col-md-6">
                <input-container-component title="Senha" id="novoSenha" id-help="novoSenhaHelp" text-help="">
                    <input type="password" class="form-control" id="novoSenha" aria-describedby="novoSenhaHelp" placeholder="Senha" v-model="password">
                </input-container-component>
            </div>
            <div class="form-group col-md-6">
                <input-container-component title="Confirmar Senha" id="confirmaSenha" id-help="confirmaSenhaHelp" text-help="">
                    <input type="password" class="form-control" id="confirmaSenha" aria-describedby="confirmaSenhaHelp" placeholder="Confirmar Senha" v-model="confirm_password">
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
                let vm = this;
                let data = {};

                if (vm.password != vm.confirm_password) {
                    vm.status = true;
                    vm.details = {
                        message: 'Senha não são iguais!'
                    }
                    return;
                }

                data = {
                    name : vm.name,
                    email : vm.email,
                    password : vm.password,
                };
                
                axios.post(route('api.users.store'), data)
                    .then(response => {
                        vm.status = false;
                        console.log(response);
                    })
                    .catch(errors => {
                        vm.status = true;
                        vm.details = {
                            data: errors.response.data.errors
                        }
                    })
            }
        }
    }
</script>
