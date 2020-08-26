<template>
    <div>
        <v-row justify="center">
            <v-dialog v-model="confirmDialog" persistent max-width="20%">
                <v-card>
                    <v-card-title class="headline">Подтверждение</v-card-title>
                    <v-card-text>Удалить продукт из сегодняшнего меню?</v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="red darken-1" text @click="confirmDialog = false">Нет</v-btn>
                        <v-btn color="green darken-1" text @click="checkAndDelete(1,'confirm')">Да</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>
        <div v-if="responseErrors" v-for="category in responseErrors">
            <v-alert
                border="right"
                colored-border
                type="error"
                elevation="2"
                v-for="error in category" v-bind:key="error.id">
                {{ error }}
            </v-alert>

        </div>
        <div v-if="responseStatus==='success'">
            <v-alert
                outlined
                type="success"
                text
            >
                {{ responseMessage }}
            </v-alert>
        </div>
        <v-toolbar
            @click ="waterPerDay = !waterPerDay"
            style="cursor: pointer"
            class="mb-2"
            color="blue darken-3"
            dark
            flat
        >
            <v-toolbar-title>Вода за день</v-toolbar-title>
        </v-toolbar>
        <v-form v-model="valid" v-show="waterPerDay">
            <v-container>
                <v-row>

                    <v-col
                        cols="12"
                        md="4"
                    >
                        <v-text-field
                            v-model="amountOfWater"
                            :rules="waterRules"
                            label="Сколько воды выпил (мл)"
                            required
                        ></v-text-field>
                    </v-col>
                </v-row>
                <div class="my-2">
                    <v-btn color="primary" @click="sendWaterInfo()">Добавить</v-btn>
                </div>
            </v-container>
        </v-form>

        <div class="text-center">
            <v-dialog
                v-model="weightDialog"
                width="500"
            >
                <template v-slot:activator="{ on, attrs }">
                </template>

                <v-card>
                    <v-card-title class="headline primary">
                        Сколько грамм?
                    </v-card-title>

                    <v-col
                        cols="12"
                        md="12"
                    >
                        <v-text-field
                            v-model="myMenuWeight"
                            :rules="weightRules"
                            label="Сколько грамм съел"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-divider></v-divider>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                            color="primary"
                            text
                            @click="sendDataToMyMenu()"
                        >
                            Принять
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </div>
        <v-toolbar
            @click="addProductToTodaysMenu = !addProductToTodaysMenu"
            style="cursor: pointer"
            class="mb-2"
            color="blue darken-3"
            dark
            flat
        >
            <v-toolbar-title>Добавить продукт в сегодняшнее меню</v-toolbar-title>
        </v-toolbar>
        <v-form v-model="valid" v-show="addProductToTodaysMenu">
            <v-container>
                <v-row>
                    <v-col
                        cols="12"
                        md="8"
                    >
                        <v-text-field
                            v-model="productName"
                            :rules="productNameRules"
                            label="Название продукта"
                            required
                        ></v-text-field>
                    </v-col>
                    <v-col
                        cols="12"
                        md="4"
                    >
                        <v-text-field
                            v-model="weight"
                            :rules="weightRules"
                            label="Сколько грамм съел"
                            required
                        ></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col
                        cols="12"
                        md="3"
                    >
                        <v-text-field
                            v-model="calories"
                            :rules="caloriesRules"
                            label="Калории"
                            required
                        ></v-text-field>
                    </v-col>
                    <v-col
                        cols="12"
                        md="3"
                    >
                        <v-text-field
                            v-model="proteins"
                            :rules="proteinsRules"
                            label="Белки"
                            required
                        ></v-text-field>
                    </v-col>
                    <v-col
                        cols="12"
                        md="3"
                    >
                        <v-text-field
                            v-model="fats"
                            :rules="fatsRules"
                            label="Жиры"
                            required
                        ></v-text-field>
                    </v-col>
                    <v-col
                        cols="12"
                        md="3"
                    >
                        <v-text-field
                            v-model="carbohydrates"
                            :rules="carbohydratesRules"
                            label="Углеводы"
                            required
                        ></v-text-field>
                    </v-col>

                </v-row>
                <div class="my-2">
                    <v-btn color="primary" @click="sendData()">Добавить</v-btn>
                </div>
            </v-container>
        </v-form>
        <v-toolbar
            @click="addProductFromTable = !addProductFromTable"
            style="cursor: pointer"
            class="mb-2"
            color="blue darken-3"
            dark
            flat
        >
            <v-toolbar-title>Добавить продукт из таблицы</v-toolbar-title>
        </v-toolbar>
        <v-data-table
            v-show="addProductFromTable"
            :headers="productHeaders"
            :items="productDesserts"
            sort-by="name"
            class="elevation-1"
        >
            <template v-slot:top>
                <v-toolbar flat color="white">
                    <v-toolbar-title>Продукты</v-toolbar-title>
                    <v-divider
                        class="mx-4"
                        inset
                        vertical
                    ></v-divider>
                    <v-spacer></v-spacer>
                    <v-dialog v-model="dialog" max-width="500px">
                        <!--                       <template v-slot:activator="{ on, attrs }">-->
                        <!--                           <v-btn-->
                        <!--                               color="primary"-->
                        <!--                               dark-->
                        <!--                               class="mb-2"-->
                        <!--                               v-bind="attrs"-->
                        <!--                               v-on="on"-->
                        <!--                           >New Item</v-btn>-->
                        <!--                       </template>-->
                        <v-card>
                            <v-card-title>
                                <span class="headline">{{ formTitle }}</span>
                            </v-card-title>

                            <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field v-model="productEditedItem.name"
                                                          label="Сколько грамм"></v-text-field>
                                        </v-col>

                                    </v-row>
                                </v-container>
                            </v-card-text>

                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
                                <v-btn color="blue darken-1" text @click="save">Save</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-toolbar>
            </template>
            <template v-slot:item.actions="{ item }">
                <v-icon
                    small
                    class="mr-2"
                    @click="addItemToMyMenu(item)"
                >
                    mdi-plus-circle
                </v-icon>
            </template>
            <template v-slot:no-data>
                <v-btn color="primary" @click="initialize">Reset</v-btn>
            </template>
        </v-data-table>
        <v-toolbar
            @click="myFoodForTheDay = !myFoodForTheDay"
            style="cursor: pointer"
            class="mb-2"
            color="blue darken-3"
            dark
            flat
        >
            <v-toolbar-title>Мое питание за день</v-toolbar-title>
        </v-toolbar>
        <v-data-table
            v-show="myFoodForTheDay"

            :headers="nutritionHeaders"
            :items="nutritionDesserts"
            sort-by="calories"
            class="elevation-1"
        >
            <template v-slot:top>
                <v-toolbar flat color="white">
                    <v-toolbar-title>Мое питание за день</v-toolbar-title>
                    <v-divider
                        class="mx-4"
                        inset
                        vertical
                    ></v-divider>
                    <v-spacer></v-spacer>
                    <v-dialog v-model="dialog" max-width="500px">
                        <!--                       <template v-slot:activator="{ on, attrs }">-->
                        <!--                           <v-btn-->
                        <!--                               color="primary"-->
                        <!--                               dark-->
                        <!--                               class="mb-2"-->
                        <!--                               v-bind="attrs"-->
                        <!--                               v-on="on"-->
                        <!--                           >New Item</v-btn>-->
                        <!--                       </template>-->
                        <v-card>
                            <v-card-title>
                                <span class="headline">{{ formTitle }}</span>
                            </v-card-title>

                            <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field v-model="nutritionEditedItem.name"
                                                          label="Dessert name"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field v-model="nutritionEditedItem.calories"
                                                          label="Calories"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field v-model="nutritionEditedItem.fat"
                                                          label="Fat (g)"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field v-model="nutritionEditedItem.carbs"
                                                          label="Carbs (g)"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field v-model="nutritionEditedItem.protein"
                                                          label="Protein (g)"></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card-text>

                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
                                <v-btn color="blue darken-1" text @click="save">Save</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-toolbar>
            </template>
            <template v-slot:item.actions="{ item }">
                <v-icon
                    v-if="item.name!='total'"
                    small
                    @click="checkAndDelete(item,'checking')"
                >
                    mdi-delete
                </v-icon>
            </template>
            <template v-slot:no-data>
                <v-btn color="primary" @click="initialize">Reset</v-btn>
            </template>
        </v-data-table>
    </div>
</template>

<script>
export default {
    name: "NutritionComponent",
    props: ['user'],
    mounted() {
        this.getNutritionData();
        this.getAllProducts();
    },
    data() {
        return {
            waterPerDay: false,
            myFoodForTheDay: false,
            addProductFromTable: false,
            addProductToTodaysMenu: false,
            itemToDelete: '',
            amountOfWater: '',
            disabledButton: false,
            myMenuWeight: '',
            weightDialog: false,
            menuToAdd: '',
            dialog: false,
            confirmDialog: false,
            responseStatus: '',
            responseMessage: '',
            nutritionDesserts: [],
            productDesserts: [],
            valid: false,
            productName: '',
            nutritionData: '',
            responseErrors: '',
            nutritionHeaders: [
                {
                    text: 'Название продукта',
                    align: 'start',
                    sortable: false,
                    value: 'name',
                },
                {text: 'Калории', value: 'calories', sortable: false,},
                {text: 'Белки (грамм)', value: 'proteins', sortable: false,},
                {text: 'Жиры (грамм)', value: 'fats', sortable: false,},
                {text: 'Углеводы (грамм)', value: 'carbohydrates', sortable: false,},
                {text: 'Вес', value: 'weight', sortable: false,},
                {text: 'Actions', value: 'actions', sortable: false,},
            ],
            productHeaders: [
                {
                    text: 'Название продукта',
                    align: 'start',
                    sortable: true,
                    value: 'name',
                },
                {text: 'Калории', value: 'calories'},
                {text: 'Белки (грамм)', value: 'proteins'},
                {text: 'Жиры (грамм)', value: 'fats'},
                {text: 'Углеводы (грамм)', value: 'carbohydrates'},
                {text: 'Actions', value: 'actions'},
            ],
            nutritionEditedIndex: -1,
            productEditedIndex: -1,
            nutritionEditedItem: {
                name: '',
                calories: '',
                fat: '',
                carbs: '',
                protein: '',
            }, productEditedItem: {
                name: '',
                calories: '',
                fat: '',
                carbs: '',
                protein: '',
            },
            defaultItem: {
                name: '',
                calories: '',
                fat: '',
                carbs: '',
                protein: '',
            },
            waterRules: [
                v => !!v || 'Это поле обязательное',
                v => !isNaN(parseFloat(v)) && isFinite(v) || 'Должны быть только цифры',  ///^[0-9]+$/.test(v) - только для целых чисел
            ],
            productNameRules: [
                v => !!v || 'Это поле обязательное',
                v => v.length >= 3 || 'Имя должно быть 3 или более букв',
            ],
            weight: '',
            weightRules: [
                v => !!v || 'Это поле обязательное',
                v => !isNaN(parseFloat(v)) && isFinite(v) || 'Должны быть только цифры',  ///^[0-9]+$/.test(v) - только для целых чисел
            ],
            calories: '',
            caloriesRules: [
                v => !!v || 'Это поле обязательное',
                v => !isNaN(parseFloat(v)) && isFinite(v) || 'Должны быть только цифры',  ///^[0-9]+$/.test(v) - только для целых чисел
            ],
            proteins: '',
            proteinsRules: [
                v => !!v || 'Это поле обязательное',
                v => !isNaN(parseFloat(v)) && isFinite(v) || 'Должны быть только цифры',  ///^[0-9]+$/.test(v) - только для целых чисел
            ],
            fats: '',
            fatsRules: [
                v => !!v || 'Это поле обязательное',
                v => !isNaN(parseFloat(v)) && isFinite(v) || 'Должны быть только цифры',  ///^[0-9]+$/.test(v) - только для целых чисел
            ],
            carbohydrates: '',
            carbohydratesRules: [
                v => !!v || 'Это поле обязательное',
                v => !isNaN(parseFloat(v)) && isFinite(v) || 'Должны быть только цифры',  ///^[0-9]+$/.test(v) - только для целых чисел
            ]

        }
    },
    computed: {
        formTitle() {
            return this.nutritionEditedIndex === -1 ? 'New Item' : 'Edit Item'
        },
    },

    watch: {

        dialog(val) {
            val || this.close()
        },
    },

    created() {
        this.initialize()
    },
    methods: {
            checkAndDelete(item, status)
            {
              if(status === 'checking')
              {
                  this.itemToDelete = item
                  console.log('чекинг')
                  console.log(this.itemToDelete)
                  this.confirmDialog = true;
              }
              else if(status === 'confirm'){
                  console.log('конфирм')
                  console.log(item);
                  this.confirmDialog = false;
                  axios.post('/api/delete-from-nutrition/' + this.itemToDelete.pivot.product_id + '/' + this.itemToDelete.pivot.user_id + '/' + this.itemToDelete.pivot.id).then((response) => {
                      this.responseStatus = response.data.status;
                      this.responseMessage = response.data.message;
                      console.log(response.data);
                  }).catch((error) => {
                      this.responseErrors = error.response.data.errors;
                      console.log(this.responseErrors)
                  });
                  this.getNutritionData()

              }

            },
        sendWaterInfo() {
            axios.post('/api/send-water-info/' + this.user + '/' + this.amountOfWater).then((response) => {
                this.responseStatus = response.data.status
                this.responseMessage = response.data.message
                this.amountOfWater = '';
                console.log(response.data);
            }).catch((error) => {
                this.responseErrors = error.response.data.errors;
                console.log(this.responseErrors)
            });
        },
        buttonToEnable() {
            if (!isNaN(this.productName) && !isNaN(this.weight) && !isNaN(this.proteins) && !isNaN(this.fats) && !isNaN(this.carbohydrates)) {
                // this.disabledButton = true;
            }
        },
        getNutritionData() {
            axios.post('/api/get-nutrition-data/' + this.user).then((response) => {
                this.nutritionDesserts = response.data.products;
                this.nutritionDesserts.push(response.data.total)
                console.log(this.nutritionDesserts);
            }).catch((error) => {
                this.responseErrors = error.response.data.errors;
                console.log(this.responseErrors)
            });
        },
        getAllProducts() {
            axios.post('/api/get-all-products').then((response) => {
                this.productDesserts = Object.values(response.data);
                console.log(this.productDesserts);
            }).catch((error) => {
                this.responseErrors = error.response.data.errors;
                console.log(this.responseErrors)
            });
        },
        initialize() {
            this.nutritionDesserts = [];
        },
        sendDataToMyMenu() {
            this.weightDialog = false
            let fields = {
                id: this.menuToAdd.id,
                name: this.menuToAdd.name,
                calories: this.menuToAdd.calories,
                proteins: this.menuToAdd.proteins,
                fats: this.menuToAdd.fats,
                carbohydrates: this.menuToAdd.carbohydrates,
                weight: this.myMenuWeight,
            };
            axios.post('/nutrition', fields).then(response => {
                this.responseStatus = response.data.status;
                this.responseMessage = response.data.message;
                // console.log('responseStatus:'+this.responseStatus);
                this.getNutritionData()
            })
            console.log(fields);

        },
        addItemToMyMenu(item) {
            this.menuToAdd = item;
            this.weightDialog = true;
        },
        deleteItem(item) {
            const index = this.nutritionDesserts.indexOf(item)
            confirm('Are you sure you want to delete this item?') && this.nutritionDesserts.splice(index, 1)
        },
        // deleteItemFromNutrition(item) {
        //     const index = this.nutritionDesserts.indexOf(item)
        //     confirm('Are you sure you want to delete this item?') && this.nutritionDesserts.splice(index, 1)
        //     console.log(item);
        //     axios.post('/api/delete-from-nutrition/' + item.pivot.product_id + '/' + item.pivot.user_id + '/' + item.pivot.id).then((response) => {
        //         this.responseStatus = response.data.status;
        //         this.responseMessage = response.data.message;
        //         console.log(response.data);
        //     }).catch((error) => {
        //         this.responseErrors = error.response.data.errors;
        //         console.log(this.responseErrors)
        //     });
        //     this.getNutritionData()
        //
        // },
        close() {
            this.dialog = false
            this.$nextTick(() => {
                this.nutritionEditedItem = Object.assign({}, this.defaultItem)
                this.nutritionEditedIndex = -1
            })
        },

        save() {
            if (this.nutritionEditedIndex > -1) {
                Object.assign(this.nutritionDesserts[this.nutritionEditedIndex], this.nutritionEditedItem)
            } else {
                this.nutritionDesserts.push(this.nutritionEditedItem)
            }
            this.close()
        },
        sendData() {
            let fields =
                {
                    name: this.productName,
                    calories: this.calories,
                    proteins: this.proteins,
                    fats: this.fats,
                    carbohydrates: this.carbohydrates,
                    weight: this.weight
                };
            axios.post('/nutrition', fields).then(response => {
                this.responseStatus = response.data.status
                this.responseMessage = response.data.message
                this.getAllProducts();
                this.getNutritionData();
                console.log(response.data);

            }).catch((error) => {
                this.responseErrors = error.response.data.errors;
                console.log(this.responseErrors)
            });


        }
    }
}
</script>

<style scoped>

</style>
