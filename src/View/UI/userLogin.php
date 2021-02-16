<?php $this->layout('Template::mainTemplate', ['title' => 'Librarium', 'css' => 'login,root'])?>
<div class="app">
    <div class="app-form">
        <form id="form" action="<?=BASE_URL?>/login" method="POST">
            <h1>Librarium</h1>
            <div class="app-form-control">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="example@email.com">
            </div>
            <div class="app-form-control">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="app-form-control">
                <a href="" class="link-form">Forgot my password</a>
                <div class="app-form-control-btn">
                    <button type="submit">Login</button>
                    <a href="<?=BASE_URL?>/register" class="link-btn">Register</a>
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
        text: '<?=$this->e($message)?>',
        showConfirmButton: false,
        timer: 1500
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
            window.location.href = "<?=BASE_URL?>/"
        }
    });
</script>
<?php
    endif;
?>
<script src="<?=BASE_URL?>/src/View/scripts/userLogin.js"></script>
