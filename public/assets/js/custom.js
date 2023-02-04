function validateForm(id) {
    'use strict'
    var forms = document.querySelectorAll(`#${id}`)
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('click', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            form.classList.add('was-validated')
        
          }else {
            // event.preventDefault()
            // event.stopPropagation()
            console.log('All Form Filled')
          }
        }, false)
    })
};
