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



function fetchAPI(url,formid){
  var formData = new FormData(document.getElementById(formid));

  const data = formData;
  fetch(url, {
    method: 'POST',
    headers: {
      'Accept': 'application/json',
      "X-CSRF-Token": document.querySelector('input[name=_token]').value
    },
    body: data,
  }).then((response) => response.json()).then((data) => {
      console.log(data.success);
      
      document.getElementById(formid).classList.remove('was-validated');
      document.getElementById(formid).reset();
  })
  .catch((error) => {
    // alert('something went wrong');
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

      let formId = event.target.id;
      let actionUrl = event.target.dataset.action;
      let my_token = '1234';

      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }else{
        event.preventDefault();
        event.stopPropagation();

        fetchAPI(actionUrl, formId);
      }
      form.classList.add('was-validated');
    }, false)
  })
})()

