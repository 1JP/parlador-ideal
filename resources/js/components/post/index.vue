<template>
    
    <div class="col-md-8">
        <div class="card mb-3" v-for="post in posts" :key="post.id">
            <div class="card-header bg-dark py-2 text-white">
                <div class="d-flex">
                    <div class="p-2 w-100">
                        {{ post.user }}
                    </div>
                    <div class="p-2 flex-shrink-1">
                        <dropdown-component v-if="user.id == post.user_id">
                            <template v-slot:button>
                                <i class="bi bi-three-dots-vertical"></i>
                            </template>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item text-light border-bottom bg-dark" href="#" data-bs-target="#modalEditPost" data-bs-toggle="modal" @click="edit(post)"><i class="bi bi-pencil mr-2"></i>Editar</a></li>
                                <li><a class="dropdown-item text-light border-bottom bg-dark" href="#" data-bs-target="#modalRemovePost" data-bs-toggle="modal" @click="remove(post)"><i class="bi bi-trash3 mr-2"></i>Remover</a></li>
                            </ul>
                        </dropdown-component>
                    </div>
                </div>
            </div>

            <div class="card-body">
                {{ post.post }}
            </div>

            <div class="card-footer py-2 bg-dark text-white">
                {{ post.created_at }}
            </div>
        </div>
    </div>
    
    <modal-component id="modalNewPost" title="Novo Post">
        <template v-slot:alert>
            <alert-component type="danger" :details="details" title="Erro ao cadastrar o post" v-if="status"></alert-component>
        </template>

        <template v-slot:body>
            <input-container-component title="Post" id="novoPost" id-help="novoPostHelp" :textHelp="number+' caracteres'">
                <textarea class="form-control" v-model="post" cols="30" rows="10" maxlength="280" @input="handleInput"></textarea>
            </input-container-component>
        </template>
        <template v-slot:footer>
            <div class="row">
                <div class="col-10"></div>

                <div class="col">
                    <button type="button" class="btn btn-primary float-right" @click="save()">Adicionar</button>
                </div>
            </div>
        </template>
    </modal-component>

    <modal-component id="modalEditPost" title="Editar Post">
        <template v-slot:alert>
            <alert-component type="danger" :details="details" title="Erro ao cadastrar o post" v-if="status"></alert-component>
        </template>

        <template v-slot:body>
            <input-container-component title="Post" id="novoPost" id-help="novoPostHelp" :textHelp="number+' caracteres'">
                <textarea class="form-control" v-model="post" cols="30" rows="10" maxlength="280" @input="handleInput"></textarea>
            </input-container-component>
        </template>
        <template v-slot:footer>
            <div class="row">
                <div class="col-10"></div>

                <div class="col">
                    <button type="button" class="btn btn-primary float-right" @click="update()">Adicionar</button>
                </div>
            </div>
        </template>
    </modal-component>

    <modal-component id="modalRemovePost" title="Deletar Post">
        <template v-slot:body>
            Deseja excluir esse post?
        </template>
        <template v-slot:footer>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-danger" @click="destroy()">Remover</button>
        </template>
    </modal-component>
</template>

<script>
    export default {
        props: [
            'user'
        ],
        data(){
            return {
                post: '',
                number: 280,
                max: 280,
                status: false,
                posts: {},
                postId: '',
            }
        },
        methods: {
            listPosts(){
                axios.get(route('api.posts.index'))
                    .then(response => {
                        this.posts = response.data;
                    })
                    .catch(errors => {
                        //
                    })
            },

            save(){
                let vm = this;
                let data = {};

                data = {
                    post : vm.post,
                };
                
                axios.post(route('api.posts.store'), data)
                    .then(response => {
                        vm.status = false;
                        this.listPosts();
                    })
                    .catch(errors => {
                        vm.status = true;
                        vm.details = {
                            data: errors.response.data.errors
                        }
                    });
            },

            edit(data){
                this.post = data.post;
                this.postId = data.id;
            },

            update(){
                let vm = this;
                let data = {};

                data = {
                    post : vm.post,
                };
                
                axios.put(route('api.posts.update', vm.postId), data)
                    .then(response => {
                        vm.status = false;
                        this.listPosts();
                    })
                    .catch(errors => {
                        vm.status = true;
                        vm.details = {
                            data: errors.response.data.errors
                        }
                    });
            },

            remove(data){
                this.postId = data.id;
            },

            destroy()
            {
                let vm = this;

                axios.delete(route('api.posts.destroy', vm.postId))
                    .then(response => {
                        vm.status = false;
                        this.listPosts();
                    })
                    .catch(errors => {
                        vm.status = true;
                        vm.details = {
                            data: errors.response.data.errors
                        }
                    });
            },

            handleInput() {
                this.number = this.number + (this.post.length > this.number ? 1 : -1);
                if (this.post.length == 0) {
                    this.number = this.max;
                }

                if (this.post.length == this.max) {
                    this.number = 0;
                }
            }
        },
        mounted() {
            this.listPosts()
        }
    }
</script>
