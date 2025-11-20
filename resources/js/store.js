import { createStore } from 'vuex';
import authorize from './authorize';
const store = createStore({
    state() {
        return {
            count: 0,
            dashboardAdmin: [],
            search: ''
        }
    },
    getters: {

    },
    mutations: {
        increment(state) {
            state.count++;
        },
        admin(state) {
            authorize.get('/api/user').then(res => state.dashboardAdmin = res.data);
        }
    }
});

export default store;