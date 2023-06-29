<script>
export default {
    name:'Footer'

}
</script>

<template>
    <footer class="mt-5">
        <div class="container-fluid d-flex justify-content-center align-items-center h-100">
        <strong>Made by Niccolò</strong>

        </div>
    </footer>

</template>

<style lang="scss" scoped>
@use '../../scss/app.scss' as *;

footer{
    height: 100px;
    background-color: lightgray;
    border-top: 2px solid black;
}

</style>
