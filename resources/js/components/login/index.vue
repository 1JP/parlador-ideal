<template>
    <div class="form-group">
        <input-container-component titulo="E-mail" id="novoEmail" id-help="novoEmailHelp" texto-ajuda="Informe o E-mail">
            <input type="text" class="form-control" id="novoEmail" aria-describedby="novoEmailHelp" placeholder="E-mail">
        </input-container-component>
    </div>
    <div class="form-group">
        <input-container-component titulo="Senha" id="novoSenha" id-help="novoSenhaHelp" texto-ajuda="Informe o senha">
            <input type="text" class="form-control" id="novoSenha" aria-describedby="novoSenhaHelp" placeholder="senha">
        </input-container-component>
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Logar</button>
    </div>
</template>

<script>
    export default {}
</script>
