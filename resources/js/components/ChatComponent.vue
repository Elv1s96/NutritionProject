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
        name: "ChatComponent",
        data() {
            return {
                dataMessages: [],
                message: '',
            }
        },
        mounted() {
            window.Echo.channel('chat').listen('Message',({message}) => {
                this.dataMessages.push(message)
            })
        },
        methods:{
            sendMessage() {
                let fields =
                    {
                        text: this.message,
                    };
                axios.post('/echo-chat-send-message',fields).then((response)=> {
                    this.dataMessages.push('Я: '+this.message)
                    this.message = "";
                });
            }
        }
    }
</script>

<style scoped>

</style>
