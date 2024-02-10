<template>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <info-logo-component :class="'img-fluid rounded-start'"/>
            </div>
            <div class="col-md-8">
                <alert-component type="success d-flex align-items-center" :details="details" :title="title" v-if="statusSuccess"></alert-component>
                <alert-component type="danger" :details="details" title="Erro ao tentar logar" v-if="status"></alert-component>
                <div class="card-header pb-0 text-start">
                    <h4 class="font-weight-bolder">Esqueci minha senha</h4>
                    <p class="mb-0">Digite a sua nova senha</p>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input-container-component title="E-mail" id="email" id-help="emailHelp" text-help="">
                            <input type="email" class="form-control" id="email" required aria-describedby="emailHelp" placeholder="E-mail" v-model="email">
                        </input-container-component>
                    </div>

                    <div class="form-group">
                        <input-container-component title="Senha" id="password" id-help="passwordHelp" text-help="">
                            <input type="password" class="form-control" id="password" required aria-describedby="passwordHelp" placeholder="Senha" v-model="password">
                        </input-container-component>
                    </div>

                    <div class="form-group">
                        <input-container-component title="Confirmar Senha" id="confirmedPassword" id-help="confirmedPasswordHelp" text-help="">
                            <input type="password" class="form-control" id="confirmedPassword" required aria-describedby="confirmedPasswordHelp" placeholder="Senha" v-model="confirmed">
                        </input-container-component>
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" @click="redefir()">Redefir Senha</button>
                    </div>
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
                confirmed: '',
                status: false,
                details: {},
                title: '',
                statusSuccess: false,
            }   
        },
        methods: {
            redefir(){
                if (this.password.length < 8) {
                    this.status = true;
                    this.details = {
                        message: 'A senha precisa ter no mínimo 8 caracteres!'
                    }
                    return;
                }

                if (this.password != this.confirmed) {
                    this.status = true;
                    this.details = {
                        message: 'Senha não são iguais!'
                    }
                    return;
                }

                axios.post(route('password.update'), {
                    email : this.email,
                    password : this.password,
                })
                    .then(response => {
                        this.status = false;
                        sessionStorage.setItem('message', 'Senha alterada com sucesso');
                        location.href = route('auth.login');
                    })
                    .catch(errors => {
                        this.status = true;
                        this.details = {
                            data: errors.response.data.errors
                        }
                    })
            }
        },
    }
</script>
