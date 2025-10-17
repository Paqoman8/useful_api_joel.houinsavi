<script setup>
import Register from '@/components/connexion/Register.vue';
import { RouterLink } from 'vue-router';
</script>

<template>
    <div class=" h-[90vh] flex justify-center items-center">
        <div
            class="flex flex-col justify-center items-center w-[30%] p-10 space-y-2 border-t-5 border-[#00BD7E]  shadow-xl rounded-3xl">
            <div class="flex flex-col items-center space-y-5">
                <img src="/src/assets/logo.svg" class="w-10" alt="">
                <h1 class="text-xl">Welcome to U-API</h1>
                <span class="text-[#00BD7E]/50">
                    Sign-in to continue
                </span>
            </div>
            <Register />
            <p>
                Do you have an account ?
                <RouterLink to="login" class="hover:text-[#00BD7E] underline">
                    Signin now!
                </RouterLink>
            </p>
        </div>
    </div>
</template>
