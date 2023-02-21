<?php
    if(!empty($_SESSION['user'])){
        header("Location:" . CONF_URL_BASE . "/app");
    }
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form id="form">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">

    <label for="password">Senha:</label>
    <input type="password" name="password" id="password">

    <button type="submit">Login</button>

    <a href="<?= url("cadastro"); ?>">Cadastro</a>
</form>

<script type="text/javascript" async>
    const form = document.querySelector("#form");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);
        const data = await fetch("<?= url("/"); ?>",{
            method: "POST",
            body: dataUser,
        });
        const user = await data.json();
        console.log(user);
        if(user.code == 200) {
            window.location.href = "<?= url("app"); ?>";
        }
    });
</script>
</body>
</html>