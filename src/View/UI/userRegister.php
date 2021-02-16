<?php $this->layout('Template::mainTemplate', ['title' => 'Librarium', 'css'=> 'root,login'])?>
<div class="app">
    <div class="app-form">
        <form id="submitForm" action="<?=BASE_URL?>/register" method="POST">
            <h1>Librarium</h1>
            <div class="app-form-control">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Joseph">
            </div>
            <div class="app-form-control">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="example@email.com" >
            </div>
            <div class="app-form-control">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" >
            </div>
            <div class="app-form-control">
                <label for="Cpassword">Confirm Password:</label>
                <input type="password" id="Cpassword" name="Cpassword">
            </div>
            <div class="app-form-control">
                <div class="app-form-control-btn">
                    <button type="submit">Register</button>
                    <a href="<?=BASE_URL?>//login" class="link-btn">Login</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    if(isset($error)):
?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$this->e($error)?>'
    });
</script>
<?php
    endif;
    if(isset($message)):
?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Congratulations!',
        text: '<?=$this->e($message)?>',
        showConfirmButton: false,
        timer: 1500
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
            window.location.href = "<?=BASE_URL?>/login"
        }
    });
</script>
<?php
    endif;
?>
<script src="<?=BASE_URL?>/src/View/scripts/userRegister.js"></script>
