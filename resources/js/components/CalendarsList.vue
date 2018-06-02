<template>
    <div>
        <button @click.prevent="toggleModal">toggle modal</button>

        <div class="calendars-list modal" :class="activeModal ? ' active' : ''">
            <calendar-item v-for="calendar in calendars" :key="calendar.id" :calendar="calendar"></calendar-item>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import qs from 'qs';

import CalendarItem from './CalendarItem';

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
            var self = this;
            axios.post('/calendar/', qs.stringify({
                ajax: true,
                action: 'get_calendars'
            }))
            .then(function (response) {
                self.calendars = response.data;
            });
        },
        toggleModal() {
            this.activeModal = !this.activeModal;
        }
    },
    components: {
        'calendar-item': CalendarItem
    }
}
</script>