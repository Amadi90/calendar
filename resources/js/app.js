import Vue from 'vue';
import ModalAddCalendar from './components/ModalAddCalendar';
import CalendarsList from './components/CalendarsList';
import Calendar from './components/Calendar';

Vue.config.productionTip = false;

new Vue({
    el: '#calendar-vue',
    data: {
        selectedDate: false
    },
    components: {
        Calendar,
        ModalAddCalendar,
        CalendarsList
    }
});