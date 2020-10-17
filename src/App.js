export default  {
    data: () => ({
        msg: 'vuejs 3 '
    }),
    template: `
        <h1>App {{msg}}</h1>
        <Test /> <Home />
        <p>
        <router-link to="/home">Home</router-link>&nbsp;&nbsp;
        <router-link to="/foo">Foo</router-link>&nbsp;&nbsp;
        <router-link to="/foo/1">Foo/1</router-link>&nbsp;&nbsp;
        <router-link to="/bar">Bar</router-link>
        </p>
        <br/>
        <router-view />
    `
}
