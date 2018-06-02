<template>
    <div>
        <button @click.prevent="toggleModal">toggle modal</button>

        <div class="modal add-calendar" :class="active ? 'active' : ''">
            <form id="add-calendar" class="axios">
                <input type="text" name="calendar_name" v-model="calendar_name">
                <input type="text" name="calendar_description" v-model="calendar_description">
                <button @click.prevent="save">Save</button>
            </form>

            <form id="add-event" class="axios">
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
    name: 'Modal',
    data () {
        return {
            calendar_name: 'name',
            calendar_description: 'description',
            event_title: 'event title',
            event_description: 'event description',
            event_date: 'event date',
            active: false
        }
    },
    methods: {
        save() {
            axios.post('/calendar/',
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