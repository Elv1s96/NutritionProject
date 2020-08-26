<template>
    <div>
    <v-app-bar
        color="primary"
        dense
        dark
        app

    >
        <v-app-bar-nav-icon></v-app-bar-nav-icon>

        <v-toolbar-title ><a href="/" style="color:white;">Nutrition management</a></v-toolbar-title>

        <v-spacer></v-spacer>
       <div class="my-2" v-if="user">
        <a href="/redis-example"><v-btn text small>Общий чат(Redis)</v-btn></a>
        <a href="/echo-chat"><v-btn text small>Эхо чат</v-btn></a>
        </div>
        <v-btn icon>
            <v-icon>mdi-heart</v-icon>
        </v-btn>

        <v-btn icon>
            <v-icon>mdi-magnify</v-icon>
        </v-btn>

        <v-menu
            left
            bottom
        >
            <template v-slot:activator="{ on, attrs }">

                <v-btn
                    icon
                    v-bind="attrs"
                    v-on="on"
                >
                    <v-icon>mdi-dots-vertical</v-icon>
                </v-btn>
            </template>

            <v-list>
                <v-list-item
                    v-for="n in 5"
                    :key="n"
                    @click="() => {}"
                >
                    <v-list-item-title><div class="my-2" v-if="user">
                        <v-btn text small>{{user}}</v-btn>
                    </div></v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </v-app-bar>
    </div>
</template>

<script>
    export default {
        name: "HeaderComponent",
        props:['user'],
    }
</script>

<style scoped>

</style>
