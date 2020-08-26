<template>
<div >
    <v-parallax
        dark
        src="https://images.squarespace-cdn.com/content/v1/57eae6be414fb577177d168a/1481201905786-5EZB5WDPSPQT5IEP4LLH/ke17ZwdGBToddI8pDm48kBY-qbJWPsJyl0YWCpcFDbUUqsxRUqqbr1mOJYKfIPR7LoDQ9mXPOjoJoqy81S2I8N_N4V1vUb5AoIIIbLZhVYy7Mythp_T-mtop-vrsUOmeInPi9iDjx9w8K4ZfjXt2dtpiMAtR4kZNhqC87Kai_7eqPC5xDA4RuAfsTyVeslMUZDqXZYzu2fuaodM4POSZ4w/complete-fitness-program-banner.jpg?format=1500w"
    >
        <v-row
            align="center"
            justify="center"
        >
            <v-col class="text-center" cols="12">
                <h1 class="display-1 font-weight-thin mb-4">Nutrition Management</h1>
                <h4 class="subheading">Start build your body TODAY</h4>

            </v-col>
        </v-row>
    </v-parallax>
<!--    <div class="container clock-body" id="clock">-->
<!--        <p class="date">{{ date }}</p>-->
<!--        <p class="time">{{ time }}</p>-->
<!--        <p class="text">DIGITAL CLOCK with Vue.js</p>-->
<!--    </div>-->
</div>
</template>

<script>

    export default {
        name: "HomeComponent",
        data() {
            return {
                time: '',
                date: '',
                week:['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'],
                timerID : setInterval(this.updateTime, 1000),
            }
        },
        mounted(){
            this.updateTime();
        },
        methods: {
            updateTime() {
                let cd = new Date();
                this.time = this.zeroPadding(cd.getHours(), 2) + ':' + this.zeroPadding(cd.getMinutes(), 2) + ':' + this.zeroPadding(cd.getSeconds(), 2);
                this.date = this.zeroPadding(cd.getFullYear(), 4) + '-' + this.zeroPadding(cd.getMonth()+1, 2) + '-' + this.zeroPadding(cd.getDate(), 2) + ' ' + this.week[cd.getDay()];
            },
            zeroPadding(num, digit) {
                let zero = '';
                for(let i = 0; i < digit; i++) {
                    zero += '0';
                }
                return (zero + num).slice(-digit);
            }
        }
    }
</script>

<style scoped>

    .clock-body {
        background: #0f3854;
        background: radial-gradient(ellipse at center,  #0a2e38  0%, #000000 70%);
        background-size: 100%;
    }
    p {
        margin: 0;
        padding: 0;
    }
    #clock {

        font-family: 'Share Tech Mono', monospace;
        color: #ffffff;
        text-align: center;
        position: absolute;
        /*left: 50%;*/
        /*top: 50%;*/
        /*transform: translate(-50%, -50%);*/
        color: #daf6ff;
        text-shadow: 0 0 20px rgba(10, 175, 230, 1), 0 0 20px rgba(10, 175, 230, 0);
    }
    .time {
        letter-spacing: 0.05em;
        font-size: 80px;
        padding: 5px 0;
    }
    .date {
        letter-spacing: 0.1em;
        font-size: 24px;
    }
    .text {
        letter-spacing: 0.1em;
        font-size: 12px;
        padding: 20px 0 0;
    }

</style>
