// function validateForm(id) {
//     'use strict'
//     var forms = document.querySelectorAll(`#${id}`)
//     Array.prototype.slice.call(forms)
//       .forEach(function (form) {
//         form.addEventListener('click', function (event) {
//           if (!form.checkValidity()) {
//             event.preventDefault()
//             event.stopPropagation()
//             form.classList.add('was-validated')
        
//           }else {
//             // event.preventDefault()
//             // event.stopPropagation()
//             console.log('All Form Filled')
//           }
//         }, false)
//     })
// };

function validateForm (id) {
  'use strict'
  const forms = document.querySelectorAll(`#${id}`)
  Array.from(forms)
    .forEach(function (form) {
      form.classList.remove('was-validated')
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
}
