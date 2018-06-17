<template>
    <div class="calendar-list-item">
        <div class="flexbox flex-align-center flex-justify-space-between">
            <div class="id" v-text="id"></div>
            <div class="name" v-text="title"></div>
            <div class="link">
                <a :href="link">Zobacz</a>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import qs from 'qs';

export default {
    name: 'CalendarItem',
    data() {
        return {
            id: this.calendar.id,
            title: this.calendar.title,
            slug: this.calendar.title,
            link: '?show_calendar=' + this.calendar.title
        }
    },
    props: ['calendar'],
    methods: {
        
    }
}
</script>