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
                    <h4 class="font-weight-bolder">Login</h4>
                    <p class="mb-0">Digite seu e-mail e senha para entrar</p>
                </div>
                <div class="card-body">
                    <slot/>

                    <div class="form-group">
                        <p class="pt-2 text-start">
                            <a :href="addResetPassword">Esqueci minha senha</a>
                        </p>
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
        props: {
            errors: {
                type: Object,
                default: () => [],
            }
        },
        data() {
            return {
                email: '',
                password: '',
                status: false,
                details: {},
                title: '',
                statusSuccess: false,
            }   
        },
        mounted() {
            this.message();
            this.computedErrors();
        },
        methods: {
            message(){
                let message = sessionStorage.getItem('message');
                if (message != undefined) {
                    this.title = message;
                    this.statusSuccess = true;
                }
                sessionStorage.removeItem('message');
            },
            computedErrors()
            {
                if (this.errors.length > 0) {
                    this.status = true;
                    this.statusSuccess = false;
                    this.details = {
                        message: this.errors[0]
                    }
                }
            }
        },
        computed: {
            addNewClientUrl() {
                return route('users.create');
            },
            addResetPassword(){
                return route('password.reset');
            }
        }
    }
</script>
