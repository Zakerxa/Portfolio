import { createStore } from 'vuex';
// Create a new store instance.
export default store = createStore({
    state() {
        return {
            count: 0
        }
    },
    mutations: {
        increment(state) {
            state.count++
        }
    }
})