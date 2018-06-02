import Vue from 'vue';
import Modal from './components/Modal';
import CalendarsList from './components/CalendarsList';

Vue.config.productionTip = false;

new Vue({
    el: '#calendar-vue',
    data: {
        selectedDate: false
    },
    components: {
        Modal,
        'calendars-list': CalendarsList
    },
    methods: {
        addEvent(event) {
            this.selectedDaate = event.target.attributes.date.value;
            console.log(this.selectedDaate);
        }
    }
});