<template>
    <div>
        <button @click.prevent="toggleModal">add event</button>

        <div class="modal add-event" :class="active ? 'active' : ''">

            <form id="add-event" class="axios">
                <input type="text" name="calendar_id" v-model="calendar_id">
                <input type="text" name="event_title" v-model="event_title">
                <input type="text" name="event_description" v-model="event_description">
                <input type="text" name="event_date" v-model="event_date">
                <button @click.prevent="addEvent">Add</button>
            </form>

        </div>

    </div>
</template>

<script>
import axios from 'axios';
import qs from 'qs';

export default {
    name: 'ModalAddEvent',
    data () {
        return {
            calendar_id: 'calendar-id',
            event_title: 'event title',
            event_description: 'event description',
            event_date: 'event date',
            active: false
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
            this.active = !this.active;
        }
    }
}
</script>