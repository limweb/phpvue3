import Preload from "./components/Preload.js"
import Header from "./components/Header.js"
import Main from "./components/Main.js"
import Leftsidebar from "./components/Leftsidebar.js"
import Rightsidebar from "./components/Rightsidebar.js"

export default  {
    data: () => ({
        load:true
    }),
    template: `
        <Preload />
        <Header />
        <Rightsidebar />
        <Leftsidebar  />
        <Main />
    `,
    components:{
        Preload,
        Header,
        Leftsidebar,
        Rightsidebar,
        Main
    },
    mounted(){
        setTimeout(()=>{
            this.load = false;
        },2000)
    }
}
