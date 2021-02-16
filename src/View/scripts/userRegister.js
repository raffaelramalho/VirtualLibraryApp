function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
document.querySelector("#submitForm").addEventListener('submit', e => {
    const errors = [];
    const data={
        Name: e.target.name.value,
        Email: e.target.email.value,
        Password: e.target.password.value,
        'Confirm Password': e.target.Cpassword.value
    }
    const fields = Object.keys(data);

    for(const i in fields){
        const field = fields[i];
        if(data[field] == ''){
            errors.push(`Field ${field} must be filled`);
        }
    }

    if(!(/[^0-9]{3,}/).test(data.Name)){
        errors.push(`Your Name cant contain numbers and must have at least 3 characters`);
    }

    if(!validateEmail(data.Email)){
        errors.push(`Your Email must be valid`);
    }

    if(data.Password !== data["Confirm Password"]){
        errors.push(`Fields Password and Confirm Password must be equals`);
    }

    if(!(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/).test(data.Password)){
        errors.push(`You Password must have at least eight characters one letter and one number`);
    }

    if(errors.length >= 1){
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'OPS!',
            text: errors[0],
        })
    }
})