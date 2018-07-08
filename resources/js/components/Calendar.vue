<template>
    <div class="calendar-container">

        <header>
            <div class="day"><button @click="subDay"> - </button>{{ selectedDate.format('DD') }}<button @click="addDay"> + </button></div>
            <div class="month"><button @click="subMonth"> - </button> {{ selectedDate.format('MMM') }}<button @click="addMonth"> + </button></div>
        </header>

        <table class="calendar">
            <thead>
                <tr>
                    <th v-for="i in 7" v-bind:key="i" class="day-label">{{ startOfWeek.isoWeekday(i).format('ddd') }}</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td v-for="i in parseInt(startOfMonth.format('e'))+6" v-bind:key="i" class="prev-month"></td>
                    <day v-for="day in days" :calendar="calendar" :key="day.date" :day="day" :class="{ 'current-day': isToday(day.date) }"></day>
                </tr>

            </tbody>
        </table>

        <div class="ring-left"></div>
        <div class="ring-right"></div>

    </div> <!-- end calendar-container -->

</template>

<script>
    import axios from 'axios';
    import qs from 'qs';
    import moment from 'moment';
    import Day from './Day';
    import Events from '../Events';

    export default {
        name: 'Calendar',
        props: ['calendar'],
        data () {
            return {
                currentDate: moment(),
                selectedDate: moment()
                // activeCalendar: qs.parse(window.location.search, { ignoreQueryPrefix: true }).show_calendar
            }
        },
        computed: {
            startOfWeek(){
                return moment();
            },
            startOfMonth(){
                return moment(this.selectedDate).startOf('month');
            },
            daysInMonth(){
                return moment(this.selectedDate).daysInMonth();
            },
            weeksInMonth(){
                return Math.floor(this.daysInMonth / 7);
            },
            days(){
                let days = [];
                for(let day=0; day<this.daysInMonth; day++){
                    days.push({ date: moment(this.startOfMonth).add(day, 'days').format("YYYY-MM-DD"), day: day + 1 });
                }
                return days;
            }
        },
        methods: {
            addDay(){
                this.selectedDate = moment(this.selectedDate).add(1, 'days');
            },
            subDay(){
                this.selectedDate = moment(this.selectedDate).subtract(1, 'days');
            },
            addMonth(){
                this.selectedDate = moment(this.selectedDate).add(1, 'months');
            },
            subMonth(){
                this.selectedDate = moment(this.selectedDate).subtract(1, 'months');
            },
            showEvents(date){
                alert(date);
            },
            isToday(date){
                return this.currentDate.format('YYYY-MM-DD') == date;
            }
        },
        components: {
            Day
        }
    }

</script>
