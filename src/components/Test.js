import {useStore} from 'vuex';
import { computed } from 'vue';

export default {
    setup() {
        const store = useStore();
        const count = computed(() => store.state.count);
        console.log('test--->', count);
        const decrement = () => {
            store.state.count--;
        }
        return {
            count,
            decrement
        }
    },
    template: `<div class="w-full bg-red-300">test count--> {{ $store.state.count }}//{{count}}
               <input class=" " type="button" value='Add'  @click="$store.commit('increment')">&nbsp;&nbsp;
               <input class=" " type="button" value='Dec'  @click="decrement">
               </div>
            `
}
