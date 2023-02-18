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
  const forms = document.querySelectorAll(`#${id}`);
  let valid = false;
  Array.from(forms).forEach(function (form) {
      form.classList.remove('was-validated');

      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
          valid = false;
          form.classList.add('was-validated');
        } 
        else {  
          event.preventDefault();
          event.stopPropagation();
          valid = true;
        }
      }, false);
    });

    return valid;
}

function fetchMethod(id) {

  // var validated = validateForm(id);

  console.log(validated);
  
  return false;
  // if(validateForm(id)) {
  //   console.log('Form Validated')
  // } else {
  //   console.log('Form Not Validated')
  // }

}



function fetchAPI(url, token, formid){
  console.log(url +'<====>'+ token + '<====>'+formid);
  const data = { username: 'example' };
  fetch('https://example.com/profile', {
    method: 'POST', // or 'PUT'
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
  }).then((response) => response.json()).then((data) => {
      console.log('Success:', data);

    document.getElementById(formid).classList.remove('was-validated');
    document.getElementById(formid).reset();
  })
  .catch((error) => {
    alert('something error');
    console.error('Error:', error);
  });
};


(() => {
  'use strict'
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation');
  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {

      let form_id = event.target.id;
      let action_url = event.target.dataset.action;
      let my_token = '1234';

      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }else{
        event.preventDefault();
        event.stopPropagation();

        fetchAPI(action_url, my_token, form_id);
      }
      form.classList.add('was-validated');
    }, false)
  })
})()

