<template>
            <v-navigation-drawer
                v-model="drawer"
                :color="color"
                dark
                app
                height="100%"
            >
                <v-list
                    dense
                    nav
                    class="py-0"
                >
                    <v-list-item >
                        <v-list-item-avatar>
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcST9eq4T1M2-CJLZQBu0e65lAvQ4I_PENb3-A&usqp=CAU">
                        </v-list-item-avatar>

                        <v-list-item-content>
                            <v-list-item-title>Привет,</v-list-item-title>
                            <v-list-item-subtitle v-if="user_name">{{user_name}}</v-list-item-subtitle>
                            <v-list-item-subtitle v-else> зарегистрируйся </v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>

                    <v-divider></v-divider>

                    <v-list-item v-if="user_name">

                        <v-list-item-content>
                            <a href="/fitness"><v-btn text small>Мой профиль</v-btn></a>
                            <a href="/product"><v-btn text small>Список продуктов</v-btn></a>
                                <a href="/nutrition"><v-btn text small>Мое питание</v-btn></a>
                            <v-card
                                class="mx-auto"

                            >
                                <v-form>
                                <v-card-text>
                                    <h3 class="text-center">Наполнить бутылку воды</h3>

                                    <v-text-field
                                        v-model="amountOfWater"
                                        :rules="waterRules"
                                        label="Сколько воды выпил (мл)"
                                        required
                                    ></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn
                                        text
                                        color="white"
                                        @click="sendWaterInfo()"
                                    >
                                        Наполнить
                                    </v-btn>

                                </v-card-actions>
                                </v-form>
                            </v-card>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>

                <template v-if="user_name">   <!-- v-slot:append-->
                    <div class="pa-2">
                        <a href="/logout"><v-btn block>Выйти</v-btn></a>
                    </div>
                </template>
                <template v-else >   <!-- v-slot:append-->
                    <div class="pa-2">
                        <a href="/login"><v-btn block>Войти</v-btn></a>
                        <a href="/register"><v-btn block class="mt-2">Зарегистрироваться</v-btn></a>
                    </div>
                </template>

            </v-navigation-drawer>

</template>

<script>
    export default {
        name: "NavigationDrawersComponent",
        props:['user_name','user_id'],
        mounted() {

        },
        data () {
            return {
                amountOfWater: '',
                waterRules: [
                    v => !!v || 'Это поле обязательное',
                    v => !isNaN(parseFloat(v)) && isFinite(v)  || 'Должны быть только цифры',  ///^[0-9]+$/.test(v) - только для целых чисел
                ],
                drawer: true,
                items: [
                    { title: 'Dashboard', icon: 'mdi-view-dashboard' },
                    { title: 'Photos', icon: 'mdi-image' },
                    { title: 'About', icon: 'mdi-help-box' },
                ],
                color: 'primary',
            }
        },
        computed: {
            bg () {
                return this.background ? 'https://cdn.vuetifyjs.com/images/backgrounds/bg-2.jpg' : undefined
            },
        },

        methods: {
            sendWaterInfo() {
                axios.post('/api/send-water-info/'+this.user_id+'/'+this.amountOfWater).then((response)=> {
                    this.responseStatus = response.data.status
                    this.responseMessage = response.data.message
                    this.amountOfWater = '';
                    console.log(response.data);
                }).catch((error) => {
                    this.responseErrors = error.response.data.errors;
                    console.log(this.responseErrors)
                });
                axios.post('/api/get-water-info/'+this.user_id).then((response) => {
                    // this.water = response.data;
                    // console.log(response.data);
                    // console.log(this.water);
                    this.$root.$emit('myEvent',response.data);
                }).catch((error) => {
                    this.responseErrors = error.response.data.errors;
                    console.log(this.responseErrors)
                });
            },
        }
    }
</script>

<style scoped>

</style>
