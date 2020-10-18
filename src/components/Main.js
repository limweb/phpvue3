import { ref,reactive,onMounted }  from 'vue'
import Footer from './Footer.js';

export default {
    setup(){

        return { }
    },
    template:`	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
            <router-view />
            <Footer />
		</div>
	</div>`,
    components:{
        Footer
    }
}