<template>
    <v-container fluid>
        <v-row>

            <v-col cols="12" md="12">
                <v-textarea
                    v-model="dataMessages.join('\n')"
                    readonly
                    solo
                    name="input-7-4"
                    label="Чат"
                ></v-textarea>
            </v-col>

        </v-row>
        <form>
            <v-text-field
                v-model="message"
                label="Ваше сообщение"
                required
            ></v-text-field>
            <v-btn color="light-blue darken-1"  @click="sendMessage()">Отправить сообщение</v-btn>
        </form>
    </v-container>

</template>

<script>
    export default {
        name: "TestingRedisComponent",
        data() {
            return {
                text: '',
                dataMessages: [],
                message: '',
            }
        },
        mounted() {
            let socket = io('http://localhost:3000');
            socket.on("new-action:App\\Events\\NewEvent", function(data) {
                console.log(data.result)
                this.dataMessages.push(data.result);
            }.bind(this));
        },
        methods:{
            sendMessage() {
                let fields =
                    {
                        text: this.message,
                    };
                axios.post('/redis-event/',fields).then((response)=> {
                    this.message = "";
                    console.log(response.data)
                });
            }
        }
    }
</script>

<style scoped>

</style>
