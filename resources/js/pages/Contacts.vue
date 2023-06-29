<script>
import ContactForm from '../components/ContactForm.vue';
export default {
    name: 'Contacts',
    components:{
        ContactForm
    }

}
</script>

<template>
    <div class="container nv_height">
        <h1 class="pb-2">Contatti</h1>

        <ContactForm/>

    </div>
</template>

<style lang="scss" scoped>
@use '../../scss/style.scss' as *;
.nv_height{
    height: calc(100vh - 203px);
}
</style>
