<script>

import  {store} from './store/store.js';
import axios from 'axios';

export default {
    name: 'home',

    data(){
        return{
            works:[],
        }
    },

    methods:{
        getApi(){
            axios.get(store.apiUrl + 'works')
            .then(results => {
                this.works = results.data;
                console.log('WORKS',this.works);
            })
        }
    },

    mounted(){
        this.getApi();
    }

}
</script>

<template>
    <h1>Elenco Works</h1>

</template>

<style>

</style>
