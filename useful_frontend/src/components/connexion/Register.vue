<script setup>

import { useStoreUsers } from '@/stores/users';
import { Button, InputText } from 'primevue';
import Password from 'primevue/password';

import { ref } from 'vue';

const storeUsers = useStoreUsers()

const newUser = ref({
    name : '',
    email : '',
    password : '',
})
// const confirm_password = ref('')

const register = async () => {
    if(newUser.value.name.trim() && newUser.value.email.trim() && newUser.value.password.trim()){
        await storeUsers.register(newUser.value)
        newUser.value.name = ''
        newUser.value.email = ''
        newUser.value.password = ''
    }
}

</script>

<template>
    <form class="w-[75%] space-y-2">
        
        <InputText class="w-[100%]" type="text" v-model="newUser.name" placeholder="username" />
        <InputText class="w-[100%]" type="email" v-model="newUser.email" placeholder="email address" />
        <Password class="w-[100%]" v-model="newUser.password" placeholder="your password" toggleMask />
        <!-- <Password class="w-[100%]" v-model="confirm_password" placeholder="confirm your password" toggleMask /> -->
        <Button @click.prevent="register" class="w-[100%]" type="submit" severity="secondary" label="Submit" />
    </form>
</template>