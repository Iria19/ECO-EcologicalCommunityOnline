<?php

class FormEnvi
{

    function __construct()
    {
        $this->render();
    }

    function render()
    {
        include 'header.php';
?>
        <div class="alert alert-danger m-5" role="alert">
            <span class="alert-heading">
                <h4 style="display:inline-block;" class="schedule-rejection-msg">Mensaje del Sistema </h4>
                <form name="formenviar" method="post">
                    <label class="motivo_rechazo" for="motivo_rechazo">Motivo del rechazo</label>
                    <input id="motivo_rechazo" name="motivo_rechazo_solicitud" type="text" class="form-control" placeholder="Motivo rechazo">
                </form>

        </div>
<?php

        include 'footer.php';
    }
}

?>