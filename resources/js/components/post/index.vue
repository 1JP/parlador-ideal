<template>
    <div class="col-md-8">
        <alert-component type="success d-flex align-items-center" :details="details" :title="title" v-if="statusSuccess"></alert-component>
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
                <button type="button" class="btn btn-primary float-right" @click="save()">Adicionar</button>
            </div>
        </template>
    </modal-component>

    <modal-component id="modalEditPost" title="Editar Post" @onClose="closeModal">
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
                <button type="button" class="btn btn-primary float-right" @click="update()">Editar</button>
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
                statusSuccess: false,
                posts: {},
                details: {},
                postId: '',
                title: 'Post cadastrado com sucesso',
            }
        },
        methods: {
            listPosts(){
                axios.get(route('api.posts.index'))
                    .then(response => {
                        this.posts = response.data;
                    })
                    .catch(errors => {
                        this.status = true;
                        this.statusSuccess = false;
                        this.details = {
                            data: errors.response.data.errors
                        }
                    })
            },

            save(){
                axios.post(route('api.posts.store'), { post : this.post })
                    .then(response => {
                        this.listPosts();
                        this.status = false;
                        this.statusSuccess = true;
                        this.details = {};
                        this.post = '';
                        this.number = 280;
                        this.title = 'Post cadastrado com sucesso';
                        $("#modalNewPost").modal('hide');
                    })
                    .catch(errors => {
                        this.status = true;
                        this.statusSuccess = false;
                        this.details = {
                            data: errors.response.data.errors
                        }
                    });
            },

            edit(data){
                this.status = false;
                this.post = data.post;
                this.postId = data.id;
                this.handleInput();
            },

            update(){
                axios.put(route('api.posts.update', this.postId), { post : this.post, })
                    .then(response => {
                        this.status = false;
                        this.listPosts();
                        this.statusSuccess = true;
                        this.details = {};
                        this.title = 'Post atualizado com sucesso';
                        this.post = '';
                        this.number = 280;
                        $("#modalEditPost").modal('hide');
                    })
                    .catch(errors => {
                        this.status = true;
                        this.statusSuccess = false;
                        this.details = {
                            data: errors.response.data.errors
                        }
                    });
            },

            remove(data){
                this.postId = data.id;
            },

            destroy(){
                axios.delete(route('api.posts.destroy', this.postId))
                    .then(response => {
                        this.status = false;
                        this.listPosts();
                        this.statusSuccess = true;
                        this.details = {};
                        this.title = 'Post excluido com sucesso';
                        $("#modalRemovePost").modal('hide');
                    })
                    .catch(errors => {
                        this.status = true;
                        this.statusSuccess = false;
                        this.details = {
                            data: errors.response.data.errors
                        }
                    });
            },

            handleInput() {
                this.number = this.max - this.post.length;
            },

            closeModal(){
                this.post = '';
            }
        },
        mounted() {
            this.listPosts()
        }
    }
</script>
