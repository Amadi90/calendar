<template>
    <div>
        <div class="modal add-event" :class="showModal ? 'active' : ''">
            <br>

            <form id="add-event" class="axios">
                <input type="text" name="calendar_id" v-model="calendar_id">
                <input type="text" name="event_title" v-model="event_title">
                <input type="text" name="event_description" v-model="event_description">
                <input type="text" name="event_date" v-model="event_date" disabled>
                <br>
                <br>
                <button @click.prevent="addEvent">Add</button>
                <button @click.prevent="toggleModal">Close</button>
            </form>

        </div>

    </div>
</template>

<script>
import Events from '../Events';
import axios from 'axios';
import qs from 'qs';

export default {
    name: 'ModalAddEvent',
    props: ['showModal', 'date'],
    data () {
        return {
            calendar_id: 'calendar-id',
            event_title: 'event title',
            event_description: 'event description',
            event_date: this.date
        }
    },
    methods: {
        save() {
            axios.post('/',
                qs.stringify({
                    ajax: true,
                    action: 'add_calendar',
                    calendar_name: this.calendar_name,
                    calendar_description: this.calendar_description,
                })
            )
            .then(function (response) {
                console.log(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        addEvent() {
            console.log('add event');
        },
        toggleModal() {
            this.$emit('toggleModal');
        }
    }
}
</script>