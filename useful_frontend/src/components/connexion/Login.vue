<script setup>

import { useStoreUsers } from '@/stores/users';
import { Button, InputText, ProgressSpinner, Toast } from 'primevue';
import { useToast } from "primevue/usetoast";

import Password from 'primevue/password';

import { ref } from 'vue';

const storeUsers = useStoreUsers()
const toast = useToast();

const user = ref({
    email : '',
    password : ''
})

const login = async () => {
    await storeUsers.login(user.value)
    if(storeUsers.loading){
        toast.add({ severity: 'info', summary: 'Info', detail: 'Message Content', life: 3000 }); 
    }
}

// const show = () => {
//     toast.add({ severity: 'info', summary: 'Info', detail: 'Message Content', life: 3000 });
// }
</script>

<template>
    <!-- <div class="card flex justify-center">
        <Toast />
        <Button label="Show" @click="show()" />
    </div> -->
    <ProgressSpinner v-if="storeUsers.loading" />
    <form v-else class="w-[75%] space-y-2">
        <InputText class="w-[100%]" type="email" v-model="user.email" placeholder="email address" />
        <Password class="w-[100%]" v-model="user.password" placeholder="your password" toggleMask />
        <Button @click.prevent="login" class="w-[100%]" type="submit" severity="secondary" label="Submit" />
    </form>
</template>