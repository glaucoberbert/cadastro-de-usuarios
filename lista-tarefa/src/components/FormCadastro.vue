<script setup>
    import { ref } from 'vue';
    import { useRouter } from 'vue-router';
    import { useAuthStore } from '@/stores/auth';

    // router = "controle remoto" para trocar de página
    const router = useRouter();
    // store = onde fica a função register que fala com a API
    const authStore = useAuthStore();

    // Os campos digitados no formulário (v-model liga o input a esta variável)
    const item = ref({
        name: "",
        email: "",
        password: "",
        password_confirmation: ""
    });

    // Texto de erro que aparece em vermelho na tela (vazio = sem erro)
    const erro = ref("");

    async function cadastrar(){
        erro.value = "";

        // Conferência rápida ANTES de chamar a API
        if(!item.value.name || !item.value.email || !item.value.password){
            erro.value = "Preencha todos os campos.";
            return;
        }
        if(item.value.password !== item.value.password_confirmation){
            erro.value = "As senhas não são iguais.";
            return;
        }

        try{
            await authStore.register(item.value.name, item.value.email,
                item.value.password, item.value.password_confirmation);
            alert("Cadastro realizado com sucesso! Faça o login.");
            router.push('/');   // volta para a tela de login
        }catch(error){
            // A API manda os erros em error.response.data.errors
            // Ex.: { email: ["Este e-mail já está cadastrado."] }
            const dados = error.response?.data;
            if(dados?.errors){
                erro.value = Object.values(dados.errors).flat().join(" ");
            }else{
                erro.value = "Erro ao realizar o cadastro. Tente novamente.";
            }
        }
    }
</script>

<template>
    <div>
        <h1>Criar conta</h1>
        <form @submit.prevent="cadastrar">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" 
                v-model="item.name"><br>
            <label for="email">E-mail:</label>
            <input type="email" id="email" 
                v-model="item.email"><br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha"
                v-model="item.password"><br>
            <label for="confirma">Confirmar senha:</label>
            <input type="password" id="confirma"
                v-model="item.password_confirmation"><br>
            <input type="submit" value="Cadastrar">
        </form>

        <!-- Só aparece se existir algum erro -->
        <p v-if="erro" class="erro">{{ erro }}</p>

        <!-- Link para voltar ao login -->
        <p>Já tem conta? <RouterLink to="/">Entrar</RouterLink></p>
    </div>
</template>

<style scoped>
    .erro{
        color: red;
    }
</style>