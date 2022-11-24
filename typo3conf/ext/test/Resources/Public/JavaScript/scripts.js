// form button
const submitBtn = document.querySelector('.contactSubmit');

if (submitBtn) {
    submitBtn.addEventListener('click', ev => {
        ev.preventDefault();
        const form = document.querySelector('.contactForm');

        const name = form.querySelector('#name').value;
        const email = form.querySelector('#email').value;
        const phone = form.querySelector('#phone').value;
        const msg = form.querySelector('#msg').value;
        const country = form.querySelector('#country').value;
        const languages = [...form.querySelectorAll('.lang:checked')].map(l => l.value);
        const nameError = form.querySelector('.invalid-name');
        const emailError = form.querySelector('.invalid-email');
        const phoneError = form.querySelector('.invalid-phone');
        const langError = form.querySelector('.invalid-lang');

        // validate name
        if(name === ''){
            nameError.innerText = 'Please enter a name';
        }else if(!name.match(/^[a-zA-Z]*$/)){
            nameError.innerText = 'Only letters are allowed';
        }else{
            nameError.innerText = '';
        }

        // validate email
        const mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if(email === ''){
            emailError.innerText = 'Please enter a email address';
        }else if(!email.match(mailFormat)){
            emailError.innerText = 'Invalid email address';
        }else{
            emailError.innerText = '';
        }

        // validate phone
        const phoneFormat = /^\+?([0-9]{2,3})\)?[/. ]?([0-9]{2})[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

        if(phone !== ''){
             if(!phone.match(phoneFormat)){
                phoneError.innerText = 'Invalid phone number';
            }else{
                phoneError.innerText = '';
            }
        }

        // validate languages
        if(languages.length === 0){
            langError.innerText = 'Please select at least one language';
        }else{
            langError.innerText = '';
        }

        // if errors are empty, submit form
        if(nameError.textContent === '' && emailError.textContent === '' && phoneError.textContent === '' && langError.textContent === ''){
            form.requestSubmit();
        }
        
    });
}