<template>
    <div>
        <v-card
            class="mx-auto"

        >
            <v-img
                class="white--text align-end"
                height="200px"
                src="https://images.wallpaperscraft.ru/image/kub_temnyj_tekstura_formy_119956_2560x1440.jpg"
            >
                <v-card-title>Информация за день</v-card-title>
            </v-img>

            <v-card-text class="text--primary">

                <v-expansion-panels>
<!--                    v-model="panel"-->
<!--                    :disabled="disabled"-->
<!--                    multiple-->
<!--                >-->
                    <v-expansion-panel>

                        <v-expansion-panel-header v-if="nutritionDesserts.calories > desserts.without_changing_the_weight " color="red" >Калорий: {{nutritionDesserts.calories}}</v-expansion-panel-header>
                        <v-expansion-panel-header v-else color="green" >Калорий: {{nutritionDesserts.calories}}</v-expansion-panel-header>
                        <v-expansion-panel-content>
                            <v-simple-table>
                                <template v-slot:default>
                                    <thead>
                                    <tr>
                                        <th class="text-left">Название</th>
                                        <th class="text-left">Калории</th>
                                        <th class="text-left">Белки</th>
                                        <th class="text-left">Жиры</th>
                                        <th class="text-left">Углеводы</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in nutritionOfDay" :key="item.name">
                                        <td>{{ item.name }}</td>
                                        <td>{{ item.calories }}</td>
                                        <td>{{ item.proteins }}</td>
                                        <td>{{ item.fats }}</td>
                                        <td>{{ item.carbohydrates }}</td>
                                    </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>
                        </v-expansion-panel-content>
                    </v-expansion-panel>

                    <v-expansion-panel>
                        <v-expansion-panel-header>Выпито воды: {{totalAmountOfWater}} </v-expansion-panel-header>
                        <v-expansion-panel-content>
                            <v-simple-table>
                                <template v-slot:default>
                                    <thead>
                                    <tr>
                                        <th class="text-left">Миллилиты</th>
                                        <th class="text-left">Время</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in waterInfo" :key="item.name">
                                        <td>{{ item.amount_of_water }}</td>
                                        <td>{{ item.time }}</td>
                                    </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                </v-expansion-panels>
            </v-card-text>
        </v-card>
        <v-toolbar

            class="mb-2 mt-2"
            color="amber darken-3"
            dark
            flat
        >
            <v-toolbar-title>Мои параметры</v-toolbar-title>
        </v-toolbar>
        <v-simple-table>
            <template v-slot:default>
                <thead>
                <tr>
                    <th class="text-left">Возраст</th>
                    <th class="text-left">Рост</th>
                    <th class="text-left">Начальный вес</th>
                    <th class="text-left">Текущий вес</th>
                    <th class="text-left">Вес не меняется</th>
                    <th class="text-left">Похудение</th>
                    <th class="text-left">быстрое похудение</th>
                    <th class="text-left">Как часто занимаюсь</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ desserts.age }}</td>
                    <td>{{ desserts.growth }}</td>
                    <td>{{ desserts.starting_weight }}</td>
                    <td>{{ desserts.current_weight }}</td>
                    <td>{{ desserts.without_changing_the_weight }}</td>
                    <td>{{ desserts.weight_loss }}</td>
                    <td>{{ desserts.rapid_weight_loss }}</td>
                    <td>{{ desserts.exercise_stress }}</td>
                </tr>
                </tbody>
            </template>
        </v-simple-table>

        <v-container fluid>
            <v-data-iterator
                :items="items"
                :items-per-page.sync="itemsPerPage"
                hide-default-footer
            >
                <template v-slot:header>
                    <v-toolbar
                        class="mb-2"
                        color="indigo darken-5"
                        dark
                        flat
                    >
                        <v-toolbar-title>Таблица сжигания каллорий</v-toolbar-title>
                    </v-toolbar>
                </template>

                <template v-slot:default="props">
                    <v-row>
                        <v-col
                            v-for="item in props.items"
                            :key="item.name"
                            cols="12"
                            sm="6"
                            md="4"
                            lg="4"
                        >
                            <v-card>
                                <v-card-title class="subheading font-weight-bold">{{ item.name }}</v-card-title>

                                <v-divider></v-divider>

                                <v-list dense>
                                    <v-list-item>
                                        <v-list-item-content>Калории:</v-list-item-content>
                                        <v-list-item-content class="align-end">{{ item.calories }}</v-list-item-content>
                                    </v-list-item>

                                    <v-list-item>
                                        <v-list-item-content>Белки:</v-list-item-content>
                                        <v-list-item-content class="align-end">{{ item.proteins }}</v-list-item-content>
                                    </v-list-item>

                                    <v-list-item>
                                        <v-list-item-content>Жиры:</v-list-item-content>
                                        <v-list-item-content class="align-end">{{ item.fats }}</v-list-item-content>
                                    </v-list-item>

                                    <v-list-item>
                                        <v-list-item-content>Углеводы:</v-list-item-content>
                                        <v-list-item-content class="align-end">{{ item.carbohydrates }}
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-list>
                            </v-card>
                        </v-col>
                    </v-row>
                </template>
            </v-data-iterator>
        </v-container>
    </div>
</template>
<script>
    export default {
        name: "FitnessProfileShowComponent",
        props: ['user'],
        data() {
            return {
                nutritionOfDay: '',
                waterInfo: '',
                totalAmountOfWater: '',
                water_info: '',
                nutritionDesserts: '',
                responseStatus: '',
                responseMessage: '',
                userData: '',
                desserts: '',
                itemsPerPage: 3,
                items: [],

            }
        },
        mounted() {
            this.$root.$on('myEvent',(waterInfo)=> {
                console.log(waterInfo)
                this.totalAmountOfWater = waterInfo.total_amount_of_water;
            });
            console.log(this.user);
            axios.post('/api/get-user-fitness-info/'+this.user).then((response) => {
               // + console.log(response.data)
                this.desserts = response.data;
                this.items = Object.values(response.data.PFC);
              // +  console.log(this.desserts);
              // +  console.log(response.data.PFC);
            }).catch((error) => {
                this.responseErrors = error.response.data.errors;
                console.log(this.responseErrors)
            });
            axios.post('/api/get-water-info/'+this.user).then((response) => {
                this.totalAmountOfWater = response.data.total_amount_of_water;
                this.waterInfo = response.data.water_info;
                //+ console.log(this.totalAmountOfWater)
                //+ console.log(this.waterInfo);
            }).catch((error) => {
                this.responseErrors = error.response.data.errors;
                console.log(this.responseErrors)
            });
            this.getNutritionData()
        },
        methods: {
            getNutritionData(){
                axios.post('/api/get-nutrition-data/'+this.user).then((response) => {
                    this.nutritionOfDay = response.data.products;
                    this.nutritionOfDay.push(response.data.total)
                    this.nutritionDesserts = response.data.total;
                    //+ console.log(this.nutritionDesserts);
                }).catch((error) => {
                    this.responseErrors = error.response.data.errors;
                    console.log(this.responseErrors)
                });
            },
        },

    }
</script>

<style scoped>

</style>
