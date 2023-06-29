<script>
import  {store} from '../store/store';
import axios from 'axios';

export default {
    name: 'FormSearch',

    data(){
        return{
        tosearch: '',
        loaded: false,
        }
    },
    methods:{
        getApi(){
        store.loaded = true;
        axios.get(store.apiUrl + 'works/search/' + this.tosearch)
        .then(result=>{
            store.works = result.data.data;
            console.log(store.works);
            store.links = result.data.links;
            store.first_page_url = result.data.first_page_url;
            store.last_page_url = result.data.last_page_url;
            store.current_page = result.data.current_page;
            store.last_page = result.data.last_page;
            store.loaded = false;


            this.tosearch = '';
        })

        }
    }

}
</script>

<template>
    <div class="text-center">

        <input
        type="text"
        placeholder="Cerca per titolo"
        v-model.trim="tosearch"
        @keyup.enter="getApi"
        >
        <button @click="getApi">Cerca</button>
    </div>


</template>

<style lang="scss" scoped>
input{
    padding: 5px;
    width: 300px;
    margin-right: 10px;
    border-radius: 5px;
    border: 2px solid lightgray;
}
button{
    padding: 5px;
    cursor: pointer;
    border-radius: 5px;
    border: 2px solid lightgray;
    &:hover{
        background-color: green;
        color: white;
    }
}

</style>
