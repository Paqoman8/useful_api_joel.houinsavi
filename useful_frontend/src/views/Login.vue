<script setup>
import Login from '@/components/connexion/Login.vue';
import { RouterLink } from 'vue-router';

</script>

<template>
    <div class=" h-[90vh] flex justify-center items-center">
        <div
            class="flex flex-col justify-center items-center w-100 h-100 p-5 space-y-2 border-t-5 border-[#00BD7E]  shadow-xl rounded-3xl">
            <div class="flex flex-col items-center space-y-5">
                <img src="/src/assets/logo.svg" class="w-10" alt="">
                <h1 class="text-xl">Welcome to U-API</h1>
                <span class="text-[#00BD7E]/50">
                    Sign-in to continue
                </span>
            </div>
            <Login />
            <p>
                You don't have account ?
                <RouterLink to="register" class="hover:text-[#00BD7E] underline">
                    Signup here
                </RouterLink>
            </p>
        </div>
    </div>
</template>
