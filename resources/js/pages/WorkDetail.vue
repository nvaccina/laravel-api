
<script>
import  {store} from '../store/store';
import axios from 'axios';
import Loader from '../components/Loader.vue'

export default {
    name: 'WorkDetail',
    components:{
        Loader
    },
    data(){
        return{
        work: null,
        loaded: false
        }

    },

    methods:{
        getApi(){
        this.loaded = false;
        axios.get(store.apiUrl + 'works/' + this.$route.params.slug)
        .then(result =>{
            this.work = result.data;
            console.log(this.work.title);
            this.loaded = true;
        })

        }
    },

    computed:{
        formattedData(){
            const d = new Date(this.work.creation_date);
            const options = {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
            };
            function getUserLocale(){
                const userLocale = navigator.languages && navigator.languages.length
                ? navigator.languages[0]
                : navigator.language;

                return userLocale;
            }

            return d.toLocaleString(getUserLocale(), options);
        }
    },

    mounted(){
        this.getApi();
    }


}
</script>

<template>
    <Loader v-if="!loaded" />
    <div v-else class="nv_small_container">
        <h3> <strong>{{ work.title }}</strong></h3>

        <div class="py-3" style=" height: 300px; width: 300px;">
            <img :src="work.image" :alt="work.image_original_name" style=" height: 100%; width: 100%;">
            <p>Original name: {{ work.image_original_name }}</p>
        </div>

        <p class="my-2">Creato: {{ formattedData }}</p>
        <div class="my-1">
            <span class="badge text-bg-primary">{{ work.type.name }}</span>
        </div>

        <div>
            <div v-if="work.technologies">
            <span
                v-for="technology in work.technologies"
                :key="technology.id"
                class="badge text-bg-warning my-1 me-1"
            >
                {{ technology.name }}
            </span>
            </div>
            <div v-else>
            <span>Tecnologia non presente</span>
            </div>
        </div>
        <p v-html="work.text"></p>
    </div>

</template>

<style lang="scss" scoped>

@use '../../scss/app.scss' as *;

.nv_small_container{
  width: 60%;
  max-width: 800px;
  margin: 30px auto;
}


</style>
