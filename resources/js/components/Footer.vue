<script>
export default {
    name:'Footer'

}
</script>

<template>
    <footer>
        <div class="container-fluid d-flex justify-content-center align-items-center h-100">
        <strong>Made by Niccolò</strong>

        </div>
    </footer>

</template>

<style lang="scss" scoped>
@use '../../scss/app.scss' as *;

footer{
    height: 80px;
    background-color: brown;
    border-top: 3px solid black;
}

</style>
