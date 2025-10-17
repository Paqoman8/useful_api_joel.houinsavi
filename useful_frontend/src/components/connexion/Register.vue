<script setup>

import { Button, InputText } from 'primevue';
import Password from 'primevue/password';

import { ref } from 'vue';


const username = ref('')
const email = ref('')
const password = ref('')
// const confirm_password = ref('')


</script>

<template>
    <form class="w-[75%] space-y-2">
        <InputText class="w-[100%]" type="text" v-model="username" placeholder="username" />
        <InputText class="w-[100%]" type="email" v-model="email" placeholder="email address" />
        <Password class="w-[100%]" v-model="password" placeholder="your password" toggleMask />
        <!-- <Password class="w-[100%]" v-model="confirm_password" placeholder="confirm your password" toggleMask /> -->
        <Button class="w-[100%]" type="submit" severity="secondary" label="Submit" />
    </form>
</template>