import { request } from "@/services/api";
import { defineStore } from "pinia";

export const useStoreUsers = defineStore('user',{
    state:()=>({
        users : [],
        user : null,
        currentUser : null,

        loading : false
    }),
    getters:{

    },
    actions:{

        async getUsers (){
            const response = await request('get', 'users')
            this.users = response
        },
        async login (data){
            this.loading = false
            // console.log(data)
            try {
                this.loading = true
                const response = await request('post', 'login',data)
                // console.log(response)
            } catch (error) {
                console.log(error)
            } finally{
                this.loading = false
            }
        },

        async register (data){
            console.log(data)
            const response = await request('post', 'register',data)
            console.log(response)
        }
    }
    
},{
    persist : true,
},)