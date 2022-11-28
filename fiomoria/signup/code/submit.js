const submit = document.querySelector('button');
const user = document.querySelector('input[name="user"]');
const senha = document.querySelector('input[name="senha"]');
const avatar = document.querySelector('input[type="radio"]');

submit.addEventListener('click', () => {
    $.ajax({
        url: "code/signup.php",
        type: "post",
        data: {
            user: user.value,
            senha: senha.value,
            avatar: avatar.value
        },
        success: (failed) => {
            if(failed)
                user.style.border = "1px red solid"
        }
    })
});