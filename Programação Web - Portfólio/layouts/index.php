<?php require_once("./header.php"); ?>

<div class="container my-5 p-2 border rounded w-25">
    <form id="signo-form" method="POST" action="show_zodiac_sign.php">
        <h1 class="text-center">Descubra seu signo</h1>
        <label for="form_date">Data de nascimento</label>
        <div class="input-group mb-3">
            <div class="form-floating">
                <input required type="date" class="form-control" id="form_date" placeholder="Ex: 01/02/2003"
                    name="form_date">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-3 w-100">Descobrir</button>
    </form>
</div>

<?php require_once("./footer.php"); ?>