<template>
    <div>
        <div v-if="responseErrors" v-for="category in responseErrors" >
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
        <!--        <v-data-table dense :headers="headers" :items="desserts" item-key="name" class="elevation-1"></v-data-table>-->
        <v-data-table
            :search="search"
            :headers="headers"
            :items="desserts"
            sort-by="name"
            class="elevation-1"
        >
            <template v-slot:top>
                <v-toolbar flat color="white">
                    <v-toolbar-title>Таблица каллорий</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-text-field
                        v-model="search"
                        append-icon="mdi-magnify"
                        label="Поиск"
                        single-line
                        hide-details
                    ></v-text-field>
                    <v-divider
                        class="mx-4"
                        inset
                        vertical
                    ></v-divider>
                    <v-spacer></v-spacer>
                    <v-dialog v-model="dialog" max-width="500px">
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn
                                color="primary"
                                dark
                                class="mb-2"
                                v-bind="attrs"
                                v-on="on"
                            >Добавить продукт
                            </v-btn>
                        </template>
                        <v-card>
                            <v-card-title>
                                <span class="headline">{{ formTitle }}</span>
                            </v-card-title>

                            <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field
                                                :rules="productNameRules"
                                                v-model="editedItem.name"
                                                          label="Название продукта"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field
                                                :rules="weightRules"
                                                v-model="editedItem.calories" label="Калории(г)"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field
                                                :rules="weightRules"
                                                v-model="editedItem.proteins"
                                                          label="Белки (г)"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field
                                                :rules="weightRules"
                                                v-model="editedItem.fats" label="Жиры (г)"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field
                                                :rules="weightRules"
                                                v-model="editedItem.carbohydrates"
                                                          label="Углеводы (г)"></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card-text>

                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="close">Выйти</v-btn>
                                <v-btn color="blue darken-1" text @click="save">Сохранить</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-toolbar>
            </template>
            <template v-slot:item.actions="{ item }">
                <v-icon
                    small
                    class="mr-2"
                    @click="editItem(item)"
                >
                    mdi-pencil
                </v-icon>
                <v-icon
                    small
                    @click="deleteItem(item)"
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
        name: "ProductsComponent",
        mounted() {
            //console.log(myToken.csrfToken);
            axios.post('/api/get-all-products').then((response) => {
                this.desserts = response.data; //Object.values(response.data);
                //console.log(this.desserts);
            })

        },
        data() {
            return {
                weightRules: [
                    v => !!v || 'Это поле обязательное',
                    v => !isNaN(parseFloat(v)) && isFinite(v)  || 'Должны быть только цифры',  ///^[0-9]+$/.test(v) - только для целых чисел
                ],
                productNameRules: [
                    v => !!v || 'Это поле обязательное',
                    v => v.length >= 3 || 'Имя должно быть 3 или более букв',
                ],
                //csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                search: '',
                dialog: false,
                responseErrors: '',
                responseStatus: '',
                responseMessage: '',
                headers: [
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
                    {text: 'Actions', value: 'actions', sortable: false,},
                ],
                desserts: [],
                editedIndex: -1,
                editedItem: {
                    name: '',
                    calories: '',
                    fats: '',
                    carbohydrates: '',
                    proteins: '',
                },
                defaultItem: {
                    name: '',
                    calories: '',
                    fats: '',
                    carbohydrates: '',
                    proteins: '',
                },
            }
        },
        computed: {
            formTitle() {
                return this.editedIndex === -1 ? 'Новый продукт' : 'Изменить продукт'
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
            getAllProducts()
            {
                axios.post('/api/get-all-products').then((response) => {
                    this.desserts = response.data;  //Object.values(response.data);
                }).catch((error) => {
                    this.responseErrors = error.response.data.errors;
                    console.log(this.responseErrors)
                });
            },
            initialize() {
                this.getAllProducts()
            },

            editItem(item) {
                this.editedIndex = this.desserts.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem(item) {
                const index = this.desserts.indexOf(item)
                console.log('Удаляем '+item.name);
                console.log(item);
                confirm('Вы действительно хотите удалить продукт?') && this.desserts.splice(index, 1)
                axios.delete('/product/'+item.id).then(response => {
                    this.responseStatus = response.data.status
                    this.responseMessage = response.data.message
                    console.log(this.responseMessage);
                }).catch((error) => {
                    this.responseErrors = error.response.data.errors;
                    console.log(this.responseErrors)
                });
             },

            close() {
                this.dialog = false
                this.$nextTick(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                })
            },

            save() {
                if (this.editedIndex > -1) {
                    Object.assign(this.desserts[this.editedIndex], this.editedItem)
                    let fields =
                        {
                            name: this.editedItem.name,
                            calories: this.editedItem.calories,
                            proteins: this.editedItem.proteins,
                            fats: this.editedItem.fats,
                            carbohydrates: this.editedItem.carbohydrates,
                        };
                    axios.put('/product/'+this.editedItem.id,fields).then(response => {

                        this.responseStatus = response.data.status
                        this.responseMessage = response.data.message
                        console.log(this.responseStatus);
                    }).catch((error) => {
                        this.responseErrors = error.response.data.errors;
                        console.log(this.responseErrors)
                    });
                    //console.log(this.editedItem.id)
                } else {
                    //this.desserts.push(this.editedItem)
                    //let arr = Object.values(this.editedItem);
                    // let values = new Map([
                    //     ['name', this.editedItem.name],
                    //     ['calories', this.editedItem.calories],
                    //         ['proteins', this.editedItem.proteins],
                    //         ['fats', this.editedItem.fats],
                    //         ['carbohydrates', this.editedItem.carbohydrates],
                    // ]);
                    let fields =
                        {
                            name: this.editedItem.name,
                            calories: this.editedItem.calories,
                            proteins: this.editedItem.proteins,
                            fats: this.editedItem.fats,
                            carbohydrates: this.editedItem.carbohydrates,
                        };
                    console.log(JSON.stringify(fields));
                    axios.post('/product', fields).then(response => {
                        //location.reload();
                        this.responseStatus = response.data.status
                        this.responseMessage = response.data.message
                        console.log(this.responseMessage);
                    }).catch((error) => {
                        this.responseErrors = error.response.data.errors;
                        console.log(this.responseErrors)
                    });
                    this.getAllProducts();
                    console.log(this.editedItem.name);
                }
                this.close()
            },
        },
    }
</script>

<style scoped>

</style>
