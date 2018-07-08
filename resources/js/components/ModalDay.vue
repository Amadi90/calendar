<template>
    <div>
        <div class="modal day-details" :class="showModal ? 'active' : ''">

            <form id="add-event" class="axios">
                <input type="text" name="calendar_id" v-model="calendar_id" disabled>
                <input type="text" name="event_date" v-model="event_date" disabled>
                <input type="text" name="event_title" v-model="event_title">
                <input type="text" name="event_description" v-model="event_description">
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
    name: 'ModalDay',
    props: ['showModal', 'date', 'calendar'],
    data () {
        return {
            calendar_id: this.calendar,
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
                    action: 'add_event',
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