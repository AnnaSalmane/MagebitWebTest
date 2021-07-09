var app = new Vue({
    el: "#app",
    data: {
        email: "",
        checkbox: false,
        formErrors: [],
        reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,

    },
    methods: {
        checkHasData: function (value) {
            if (value.length > 0) {
                return true;
            } else {
                return false;
            }
        },
        checkEnds: function (value) {
            if (value.endsWith(".co")) {
                return true;
            } else {
                return false;
            }
        },
        checkEmail: function (value) {
            if (!this.reg.test(this.email)) {
                return true;
            } else {
                return false;
            }
        },
        checkCheckbox: function (value) {
            if (value === false) {
                return true;
            } else {
                return false;
            }
        },
    },
    computed: {
        checkFormValid: function () {

            this.formErrors = [];

            if (this.checkEnds(this.email)) {
                this.formErrors.push("We are not accepting subscriptions from Colombia emails");
                return false;
            } 
            else if (!this.checkHasData(this.email) && !this.checkCheckbox(this.checkbox)) {
                this.formErrors.push("Email address is required");
                return false;
            }
            else if (!this.checkHasData(this.email)) {
                return false;
            }
            else if (this.checkEmail(this.email)) {
                this.formErrors.push("Please provide a valid e-mail address");
                return false;
            }
            else if (this.checkCheckbox(this.checkbox)) {
                this.formErrors.push("You must accept the terms and conditions");
                return false;
            }
            
            else {
                return true;
            }
        },

        addEmail: function () {
            if (checkFormValid() = true) {
                axios.post('classes.php',{
                    email:this.email,
                    checkbox:this.checkbox
                })
                this.formErrors = [];
                
                return true;
            }
        },
    },
})