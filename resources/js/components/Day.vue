<template>
    <td :date="day.date" @click.self="toggleModal">
        {{ day.day }}
        <modal-day :calendar="calendar" :showModal="showModal" :date="day.date" @toggleModal="toggleModal"></modal-day>
    </td>
</template>

<script>
import ModalDay from './ModalDay';
import moment from 'moment';

export default {
    name: 'Day',
    props: ['day', 'calendar'],
    data () {
        return {
            showModal: false
        }
    },
    methods: {
        showEvent(date){
            this.showModal = true;
        },
        toggleModal() {
            this.showModal = !this.showModal;
        }
    },
    components: {
        ModalDay
    }
}
</script>