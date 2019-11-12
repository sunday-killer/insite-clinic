Vue.use(window.vuelidate.default)
const { required, email, numeric, minLength, maxLength } = window.validators

new Vue({
  el: '#app',
  data: {
    name: 'Вася',
    email: 'example@mail.com',
    phone: 88432505142,
    comment: '',
    response: null
  },
  validations: {
    name: { required },
    email: { required, email },
    phone: { required, numeric, minLength: minLength(11), maxLength: maxLength(11) },
  },
  methods: {
    sendForm () {

      if (this.isInvalid()) {
        return;
      }

      $.ajax({
        url: '/ajax.php',
        type: 'POST',
        dataType: 'JSON',
        data: ({name: this.name, email: this.email, phone: this.phone, comment: this.comment}),
        success: data => {
          console.log(data)
          this.response = data.return
        },
        error (err) {
          this.response = `[Error]: ${err}`
          console.error(err)
        }
      });
    },
    status(validation) {
      return {
        error: validation.$error,
        dirty: validation.$dirty
      }
    },
    isInvalid () {
      return this.$v.name.$error || this.$v.email.$error || this.$v.phone.$error
    }
  }
})