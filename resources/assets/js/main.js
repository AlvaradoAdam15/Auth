var Vue = require('vue');

var $ = require('jquery');

var vm = new Vue({
    el: '#email',
    data: {
        placeholder: "youremail@example.com",
        url: "http://auth.app/checkEmailExsists"
    },
    methods: {
        checkEmailExsists: function (item) {
            var email = $('#email').value();
            console.debug("checkEmailExsists EXECUTED!");
            console.debug("A punt de cridar:");
            console.debug(this.url);
            console.debug(email);
            var url = this.url + '?email=' + email;
            console.debug(url);

            $.ajax(url).done(function(data){
                //Ok
                console.debug(data);
            }).fail(function(data){
                //error
                alert("Ha petat");
            }).always(function(data){
                //always
                console.debug("Xivato!");
            });
        }
    }

});