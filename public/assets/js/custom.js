function fetchAPI(url, formid) {
  var formData = new FormData(document.getElementById(formid));
  const data = formData;

  var checkboxLength = document.querySelectorAll('input[name="choice[]"]:checked ').length;
  if(checkboxLength === 0) {
    alert('Please choose atleast one choice')
    return false;
  }

  fetch(url, {
    method: 'POST',
    headers: {
      'Accept': 'application/json',
      "X-CSRF-Token": document.querySelector('input[name=_token]').value
    },
    body: data,
  }).then((response) => response.json()).then((data) => {

    if (data.success) {
      var msgdiv = document.getElementById('msg')
      msgdiv.classList.remove('d-none')
      msgdiv.innerText = data.success;
      document.getElementById(formid).classList.remove('was-validated');
      document.querySelectorAll(`#${formid} .form-control`).forEach(ele => ele.classList.remove('is-invalid'))
      document.getElementById(formid).reset();
      window.location.href = window.location.origin+'/student-list'
    };

    if (data.errors) {
      document.querySelectorAll(`#${formid} .invalid-feedback`).forEach(ele => ele.remove())

      for (let key in data.errors) {
        document.querySelectorAll(`#${formid} #${key}`).forEach((ele, i) => {
          ele.classList.add('is-invalid')
          var html = `<div class="invalid-feedback">${data.errors[key][0]}</div>`
          ele.insertAdjacentHTML("afterend", html)
        })
      }
    }
  })
    .catch((error) => {
      alert('something went wrong');
      // console.error('Error:', error);
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
      } else {
        event.preventDefault();
        event.stopPropagation();

        fetchAPI(actionUrl, formId);
      }
      form.classList.add('was-validated');
    }, false)
  })
})()

