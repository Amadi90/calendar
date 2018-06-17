<template>
    <div>
        <button @click.prevent="toggleModal">calendars list</button>

        <div class="calendars-list modal" :class="activeModal ? ' active' : ''">
            <button @click.prevent="toggleModal">close calendars list toggleModal</button>
            <calendar-list-item v-for="calendar in calendars" :key="calendar.id" :calendar="calendar"></calendar-list-item>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import qs from 'qs';

import CalendarListItem from './CalendarListItem';

export default {
    name: 'CalendarsList',
    props: ['show'],
    data () {
        return {
            activeModal: this.show ? true : false,
            calendars: this.getCalendarsList()
        }
    },
    methods: {
        getCalendarsList() {
            axios.post('/', qs.stringify({
                ajax: true,
                action: 'get_calendars'
            }))
            .then( (response) => {
                this.calendars = response.data;
            });
        },
        toggleModal() {
            this.activeModal = !this.activeModal;
        }
    },
    components: {
        CalendarListItem
    }
}
</script>