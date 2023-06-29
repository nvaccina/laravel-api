<script>
export default {
    name:'Header',
}
</script>

<template>
    <div class="container-fluid">
        <header>
        <ul class="d-flex justify-content-center align-items-center h-100">
            <li>
            <router-link :to="{name:'home'}">home</router-link>
            </li>
            <li>
            <router-link :to="{name:'works'}">works</router-link>
            </li>
            <li>
            <router-link :to="{name:'about'}">chi siamo</router-link>
            </li>
            <li>
            <router-link :to="{name:'contacts'}">contatti</router-link>
            </li>
        </ul>
        </header>

    </div>


</template>

<style lang="scss" scoped>
@use '../../scss/app.scss' as *;

.container-fluid{
    background-color: brown;
    border-bottom: 3px solid black;
    header{
        height: 60px;
        ul{
        list-style: none;
        padding: 20px 0;
        margin: 0;
        li{
            margin: 0 10px;

            a{
            text-transform: uppercase;
            text-decoration: none;
            color: black;
            font-size: 18px;
            font-weight: bold;
            border-bottom: 3px solid brown;
                &:hover, &.active{
                    color: white;
                    border-bottom: 3px solid white;
                }
            }
        }
        }
    }
}



</style>
