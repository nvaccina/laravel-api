<script>
import  {store} from '../store/store';
import axios from 'axios';

export default {
    name:'ContactForm',
    data(){
        return{
        name:'',
        email:'',
        message:'',
        errors: {},
        sending: false,
        success: false
        }
    },
    methods:{
        sendForm(){
        this.sending = true;
        const data = {
            name: this.name,
            email: this.email,
            message: this.message,
        }
        axios.post(`${store.apiUrl}contacts`, data)
            .then(result => {
            this.sending = false;
            this.success = result.data.success;
            if(!this.success){
                this.errors = result.data.errors;
            }else{
                this.errors = {};
            }
            console.log(result.data);
            })

        }
    }

}
</script>

<template>

    <form v-if="!success" @submit.prevent="sendForm()">
        <div>
        <input v-model.trim="name" type="text" name="name" placeholder="Nome" :class="{'error-form' : errors.name}" class="w-100 py-1 px-2">
        <p class="error-msg" v-for="(error, index) in errors.name" :key="index">{{ error }}</p>
        </div>
        <div>
        <input v-model.trim="email" type="email" name="email" placeholder="Email" :class="{'error-form' : errors.email}" class="w-100 py-1 px-2 my-2">
        <p class="error-msg" v-for="(error, index) in errors.email" :key="index">{{ error }}</p>
        </div>
        <div>
        <textarea  v-model.trim="message" name="text" placeholder="Messaggio" cols="40" rows="10" :class="{'error-form' : errors.message}" class="w-100 py-1 px-2"></textarea>
        <p class="error-msg" v-for="(error, index) in errors.message" :key="index">{{ error }}</p>
        </div>
        <div class="text-center">
        <button class="btn btn-success nv_success mt-3" type="submit" :disabled="sending">{{sending ? 'Invio in corso...' : 'Invia'}}</button>
        </div>

    </form>

    <div v-else class="text-center pt-5">
        <h3 class="success-msg">Richiesta inviata con successo. Ti contatteremo il prima possibile!</h3>
    </div>


</template>

<style lang="scss" scoped>
@use '../../scss/style.scss' as *;

form{
    width: 500px;
    margin: 0 auto;
    input, textarea{
        border: 1px solid grey;
        border-radius: 5px;
    }
    button{
        font-weight: bold;
        text-transform: uppercase;
        width: 200px;
    }
}
.error-form{
    border: 1px solid red;
}
.error-msg{
    color: red;
}
.success-msg{
    color: green;
}
.nv_success{
    border: 3px solid white;
    &:hover{
        background-color: white;
        color: #198754;
        border: 3px solid #198754;
    }
}


</style>
