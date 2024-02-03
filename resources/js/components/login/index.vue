<template>
    <div class="form-group">
        <input-container-component title="E-mail" id="novoEmail" id-help="novoEmailHelp" text-help="">
            <input type="email" class="form-control" id="novoEmail" aria-describedby="novoEmailHelp" placeholder="E-mail">
        </input-container-component>
    </div>
    <div class="form-group">
        <input-container-component title="Senha" id="novoSenha" id-help="novoSenhaHelp" text-help="">
            <input type="password" class="form-control" id="novoSenha" aria-describedby="novoSenhaHelp" placeholder="senha">
        </input-container-component>
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Logar</button>
    </div>
</template>

<script>
    export default {}
</script>
