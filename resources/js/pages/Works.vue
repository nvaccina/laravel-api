<script>
import  {store} from '../store/store';
import axios from 'axios';
import WorkCard from '../components/WorkCard.vue'
import Loader from '../components/Loader.vue'
import FormSearch from '../components/FormSearch.vue'

export default {
  name: 'Works',
  components:{
    WorkCard,
    Loader,
    FormSearch
  },
  data(){
    return{
      links:[],
      first_page_url: null,
      last_page_url: null,
      current_page: null,
      last_page: null,    
      types:[],        
      technologies:[],   
      loaded: false,
      store
    }
  },

  methods:{
      getApi(endpoint = store.apiUrl + 'works'){
          this.loaded = true;
          axios.get(endpoint)
          .then(results => {
            store.works = results.data.data;
            store.links = results.data.links;
            store.first_page_url = results.data.first_page_url;
            store.last_page_url = results.data.last_page_url;
            store.current_page = results.data.current_page;
            store.last_page = results.data.last_page;
            this.loaded = false;
          })
      },
      
      getTypes(){
        axios.get(store.apiUrl + 'works/types')
        .then(result =>{
          this.types = result.data;
        })
      },

      getTechnologies(){
        axios.get(store.apiUrl + 'works/technologies')
        .then(result =>{
          this.technologies = result.data;
        })
      },

      getWorkType(id){
        this.getApi(store.apiUrl + 'works/work-type/'+id)
      },

      getWorksTechnology(id){
        this.getApi(store.apiUrl + 'works/work-technology/'+id)
      }

  },
  mounted(){
      this.getApi();
      this.getTypes();
      this.getTechnologies();
  }

}
</script>

<template>

  <Loader v-if="loaded" />
  
  <div v-else class=" container">
    
    <FormSearch/>

    <div class="d-flex">
        
      <div class="left w-100">
        <h1 class="pt-5 pb-3 bold">Elenco Works</h1>
        <div class="d-flex flex-wrap justify-content-center">
          <WorkCard
            v-for="(work, index) in store.works"
            :key="index"
            :work="work"
          />
        </div>

        <div class="d-flex justify-content-center">
          <button 
            @click="getApi(store.first_page_url)" 
            :disabled="store.current_page === 1"
          >   
            <i class="fa-solid fa-backward-step"></i> 
          </button>

          <button 
            v-for="(link, index) in store.links" 
            :key="index" 
            @click="getApi(link.url)" 
            :disabled="link.active || !link.url"
            v-html="link.label"
          ></button>

          <button 
            @click="getApi(store.last_page_url)" 
            :disabled="store.current_page === store.last_page"
          > 
            <i class="fa-solid fa-forward-step"></i> 
          </button>

        </div>

      </div>

      <div class="right pt-5">
        <div class="tipi pb-3">
          <h3>Tipi</h3>
          <button 
            v-for="type in types" 
            :key="type.id" 
            class="nv_button btn-type"
            @click="getWorkType(type.id)"
          >
            {{ type.name }}
          </button>
        </div>

        <div class="pt-3">
          <h3>Tecnologie</h3>
          <button 
            v-for="technology in technologies" 
            :key="technology.id" 
            class="nv_button btn-tech" 
            @click="getWorksTechnology(technology.id)"
            >{{ technology.name }}
          </button>
        </div>      
        <div class="pt-2">
          <button 
            class="nv_button btn-reset" 
            @click="getApi()"
            >RESET</button>
        </div>      
        
      </div>  

    </div>


  </div> 
  
</template>

<style lang="scss" scoped>
@use '../scss/style.scss' as *;

.left{
  button{
    padding: 5px 10px;
    border: 1px solid lightgray;
    border-radius: 5px;
    margin: 0 5px;
  }
}
.right{
  width: 250px;
  border-left: 1px solid lightgray;
  padding: 0 10px;
  .tipi{
    border-bottom: 1px solid lightgray;
  }
  .nv_button{
    border: 2px solid black;
    border-radius: 5px;
    padding: 5px 7px;
    font-weight: bold;
    margin-right: 5px;
    margin-bottom: 5px;
  }
  .btn-type{
      background-color: #0D6EFD;
      color: white;
      &:hover, &.active{
        background-color: white;
        color: #0D6EFD;
      }
    }
    .btn-tech{
      background-color: #FFC107;
      color: black;
      &:hover, &.active{
        background-color: black;
        color: #FFC107;
      }
    }
    .btn-reset{
      background-color: red;
      color: white;
      margin-top: 15px;
      &:hover, &.active{
        background-color: white;
        color: red;
      }
    }
}

</style>