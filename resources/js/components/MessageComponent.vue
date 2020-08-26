<template>
<!--    <div v-if="responseErrors" v-for="category in responseErrors" >-->
<!--        <v-alert-->
<!--            border="right"-->
<!--            colored-border-->
<!--            type="error"-->
<!--            elevation="2"-->
<!--            v-for="error in category" v-bind:key="error.id">-->
<!--            {{ error }}-->
<!--        </v-alert>-->

<!--    </div>-->
    <div>
        <div v-if="prp" v-for="error in prp" >
            ПРИВЕТИКИ
            {{ err }}

        </div>
    </div>
</template>

<script>
    export default {
        name: "MessageComponent",
        data() {
            return {
                responseErrors: '',
                responseStatus: '',
                responseMessage: '',
            }
        },
        props: ['prp'],
        mounted() {
            console.log('biba',this.prp);
        },

    }
</script>

<style scoped>

</style>
