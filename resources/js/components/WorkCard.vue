
<script>
export default {
    name: 'WorkCard',
    props:{
        work: Object,
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
    }

}
</script>

<template>

    <div class="card" style="width: 15rem;">
        <div>
            <div v-if="work.image"  style=" height: 200px; width: 100%;">
            <img :src="work.image" :alt="work.title" style=" height: 100%; width: 100%;">
            </div>
            <div v-else  style=" height: 200px; width: 100%;">
            <img src="/img/noimage.jpg" alt="" style=" height: 100%; width: 100%;">
            </div>

        </div>
        <div class="card-body">
            <h5 class="card-title"><router-link :to="{ name:'workDetail', params:{slug: work.slug }}">{{ work.title }}</router-link></h5>
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

        </div>
    </div>

</template>

<style lang="scss" scoped>

@use '../../scss/app.scss' as *;

.card{
    margin: 20px 10px;
    border: 2px solid black !important;
    transition: all 0.5s;
    &:hover{
        cursor: pointer;
        transform: scale(1.05);
    }
    a{
        text-decoration: none;
        &:hover{
        text-decoration: underline;
        color: blue;
        }
    }
    .card-body{
        padding: 5px;
        p{
        font-size: 13px;
        }
    }
}

</style>
