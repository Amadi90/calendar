<template>
    <div>
        <button @click.prevent="toggleModal">add calendar</button>

        <div class="modal add-calendar" :class="active ? 'active' : ''">

            <form id="add-calendar" class="axios">
                <input type="text" name="calendar_name" v-model="calendar_name">
                <input type="text" name="calendar_description" v-model="calendar_description">
                <button @click.prevent="save">Save</button>
            </form>
            
            <div>
                <button @click.prevent="toggleModal">close</button>
            </div>

        </div>

    </div>
</template>

<script>
import axios from 'axios';
import qs from 'qs';

export default {
    name: 'ModalAddCalendar',
    data () {
        return {
            calendar_name: 'name',
            calendar_description: 'description',
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