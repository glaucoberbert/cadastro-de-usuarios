<script setup>
    import { ref } from 'vue';
    import { useAuthStore } from '@/stores/auth';
import router from '@/router';

    const authStore = useAuthStore();

    const item = ref({
        email:"",
        password:""
    });

    async function login(){
        try{
            await authStore.login(item.value.email, item.value.password);
            router.push('/tarefa');
        }catch(error){
            console.log(error);
            alert("Erro ao realizar o login");
        }
    }
</script>

<template>
    <div>
        <form @submit.prevent="login">
            <label for="email">E-mail:</label>
            <input type="email" id="email" 
                v-model="item.email"><br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha"
                v-model="item.password"><br>
            <input type="submit" value="Entrar">
        </form>

        <!-- link pra tela de cadastro -->
        <p>Não tem conta? <RouterLink to="/cadastro">Criar conta</RouterLink></p>
    </div>
</template>