<template>
    <v-footer
        color="primary"
        padless
    >
        <v-row
            justify="center"
            no-gutters
        >
            <v-col
                class="lighten-2 py-4 text-center white--text"
                cols="12"
            >
                {{ new Date().getFullYear() }} — <strong>Vuetify</strong>
            </v-col>
        </v-row>
    </v-footer>
</template>

<script>
    export default {
        name: "FooterComponent"
    }
</script>

<style scoped>

</style>
