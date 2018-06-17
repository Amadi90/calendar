import Vue from 'vue';
import ModalAddCalendar from './components/ModalAddCalendar';
import ModalAddEvent from './components/ModalAddEvent';
import CalendarsList from './components/CalendarsList';

Vue.config.productionTip = false;

new Vue({
    el: '#calendar-vue',
    data: {
        selectedDate: false
    },
    components: {
        ModalAddCalendar,
        ModalAddEvent,
        CalendarsList
    },
    methods: {
        addEvent(event) {
            this.selectedDaate = event.target.attributes.date.value;
            console.log(this.selectedDaate);
        }
    }
});