function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
document.querySelector("#form").addEventListener('submit', e=>{
    const errors = [];
    const data = {
        Email: e.target.email.value,
        Password: e.target.password.value
    }

    const fields = Object.keys(data);

    for(const i in fields){
        const field = fields[i];
        if(data[field] == ''){
            errors.push(`Field ${field} must be filled`);
        }
    }

    if(!validateEmail(data.Email)){
        errors.push(`Your Email must be valid`);
    }

    if(!(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/).test(data.Password)){
        errors.push(`Wrong Password`);
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