<template>
    <div class="form-group">
        <div class="row">
            <div class="form-group col-md-6">
                <input-container-component title="Nome" id="novoNome" id-help="novoNomeHelp" text-help="">
                    <input type="text" class="form-control" id="novoNome" aria-describedby="novoNomeHelp" placeholder="Nome">
                </input-container-component>
            </div>
            <div class="form-group col-md-6">
                <input-container-component title="E-mail" id="novoEmail" id-help="novoEmailHelp" text-help="">
                    <input type="text" class="form-control" id="novoEmail" aria-describedby="novoEmailHelp" placeholder="E-mail">
                </input-container-component>
            </div>
            <div class="form-group col-md-6">
                <input-container-component title="Senha" id="novoSenha" id-help="novoSenhaHelp" text-help="">
                    <input type="password" class="form-control" id="novoSenha" aria-describedby="novoSenhaHelp" placeholder="Senha">
                </input-container-component>
            </div>
            <div class="form-group col-md-6">
                <input-container-component title="Confirmar Senha" id="confirmaSenha" id-help="confirmaSenhaHelp" text-help="">
                    <input type="password" class="form-control" id="confirmaSenha" aria-describedby="confirmaSenhaHelp" placeholder="Confirmar Senha">
                </input-container-component>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Cadastrar</button>
</template>

<script>
    export default {}
</script>
