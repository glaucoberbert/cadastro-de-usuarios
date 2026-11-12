import { defineStore } from "pinia"
import { ref, computed } from "vue"
import api from "@/plugin/axios"

export const useAuthStore = defineStore("auth", ()=>{
    const user = ref({
        user: null,
        token: null
    });

    const isAuthenticated = computed(() => !!user.value.token);

    const login = async (email, password) => {
        try{
            const response = await api.post("/login", {email, password});
            user.value.user = response.data.user;
            user.value.token = response.data.token;
            localStorage.setItem("token", response.data.token);
            localStorage.setItem("idusuario", response.data.user.id);
        }catch(error){
            console.log("Erro ao logar", error);
            throw error;
        }
    }

    //aqui no cadastro ele vai mandar os dados pra api, aí se der
    //certo ele devolve o usuário criado, se n, ele joga o erro pro
    //formulário mostrar
    const register = async (name, email, password, password_confirmation) => {
        try{
            const response = await api.post("/register", 
                {name, email, password, password_confirmation});
            return response.data.user;
        }catch(error){
            console.log("Erro ao cadastrar", error);
            throw error;
        }
    }

    const logout = () => {
        user.value.user = null;
        user.value.token = null;
        localStorage.removeItem("token");
    }

    return { user, isAuthenticated, login, register, logout }
});