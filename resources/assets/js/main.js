var Vue = require('vue');

var vm = new Vue({
    el: '#email',
    data: {
        placeholder: "youremail@example.com"
    },
    methods: {
        sayHello: function (){
            alert("Hola");
        },

        checkEmailExsists: function (item) {
            console.log("hey")
        }
    }

});