<script>
export default {
    name:'Header',
}
</script>

<template>
    <div class="container-fluid">
        <header>
        <ul>
            <li>
            <router-link :to="{name:'home'}">home</router-link>
            </li>
            <li>
            <router-link :to="{name:'contacts'}">contatti</router-link>
            </li>
            <li>
            <router-link :to="{name:'works'}">works</router-link>
            </li>
            <li>
            <router-link :to="{name:'about'}">chi siamo</router-link>
            </li>
        </ul>
        </header>

    </div>


</template>

<style lang="scss" scoped>
@use '../../scss/app.scss' as *;

.container-fluid{
    background-color: lightgray;
    border-bottom: 2px solid black;
    header{
        ul{
        list-style: none;
        display: flex;
        justify-content: center;
        padding: 20px 0;
        margin: 0;
        li{
            margin: 0 10px;
            border-bottom: 2px solid lightgray;
            &:hover, &.active{
                border-bottom: 2px solid rgb(90, 195, 243);
            }
            a{
            text-transform: uppercase;
            text-decoration: none;
            color: black;
            font-size: 18px;
            font-weight: bold;
            &:hover, &.active{
                color: rgb(90, 195, 243);
            }
            }
        }
        }
    }
}



</style>
