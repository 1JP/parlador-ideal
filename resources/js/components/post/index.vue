<template>
    
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header bg-dark py-2 text-white">
                <div class="d-flex">
                    <div class="p-2 w-100">
                        João Pedro
                    </div>
                    <div class="p-2 flex-shrink-1">
                        <dropdown-component>
                            <template v-slot:button>
                                <i class="bi bi-three-dots-vertical"></i>
                            </template>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item text-light border-bottom bg-dark" href="#" data-bs-target="#editar-ciclo" data-bs-toggle="modal"><i class="bi bi-pencil mr-2"></i>Editar</a></li>
                                <li><a class="dropdown-item text-light border-bottom bg-dark" href="#" data-bs-target="#remover-ciclo" data-bs-toggle="modal"><i class="bi bi-trash3 mr-2"></i>Remover</a></li>
                            </ul>
                        </dropdown-component>
                    </div>
                </div>
            </div>

            <div class="card-body">
                O incentivo ao avanço tecnológico, assim como a consulta aos diversos militantes estimula a padronização das condições financeiras e administrativas exigidas.
                Ainda assim, existem dúvidas a respeito de como o consenso sobre a necessidade de qualificação faz parte de um processo de gerenciamento da gestão inovadora da qual fazemos parte.
            </div>

            <div class="card-footer py-2 bg-dark text-white">
                2 days ago
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-dark py-2 text-white">
                <div class="d-flex">
                    <div class="p-2 w-100">
                        João Pedro
                    </div>
                    <div class="p-2 flex-shrink-1">
                    </div>
                </div>
            </div>

            <div class="card-body">
                O incentivo ao avanço tecnológico, assim como a consulta aos diversos militantes estimula a padronização das condições financeiras e administrativas exigidas.
                Ainda assim, existem dúvidas a respeito de como o consenso sobre a necessidade de qualificação faz parte de um processo de gerenciamento da gestão inovadora da qual fazemos parte.
            </div>

            <div class="card-footer py-2 bg-dark text-white">
                2 days ago
            </div>
        </div>
    </div>
    
    <modal-component id="modalNewPost" title="Novo Post">
        <template v-slot:body>
            <input-container-component title="Post" id="novoPost" id-help="novoPostHelp" text-help="280 caracteres">
                <textarea class="form-control" id="" cols="30" rows="10"></textarea>
            </input-container-component>
        </template>
        <template v-slot:footer>
            <div class="row">
                <div class="col-10"></div>

                <div class="col">
                    <button type="button" class="btn btn-primary float-right">Adicionar</button>
                </div>
            </div>
        </template>
    </modal-component>

</template>

<script>
    export default {}
</script>
