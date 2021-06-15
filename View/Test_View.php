<?php

//Vista de los test
class Test_View
{

    var $test;

    function __construct($test)
    {
        $this->test = $test;
        $this->render();
    }

    function render()
    {
        include_once './Common/Auth.php';
        include 'includes.php';
        $errores = 0;
        foreach ($this->test as $res) {
            if ($res['conclusion'] != '1') {
                $errores++;
            }
        }
?>

        <div class="custom-card p-3">
            <div class="row">
                <h4 class="enumtest">
                    <p class="Detest">De</p> <?php echo count($this->test); ?> <p class="testhay">tests hay</p> <?php echo $errores; ?> <p class="testfallidos">test fallidos</p>
                </h4>
            </div>
            <div class="table-responsive-md">
                <table class="table p-5 tablatest">
                    <tr class="table-primary">
                        <th class="testth testentidad" scope="col">Entidad</th>
                        <th class="testth testatributo" scope="col">Atributo</th>
                        <th class="testth testerror" scope="col">Error</th>
                        <th class="testth testvalor" scope="col">Valor</th>
                        <th class="testth testerroresperado" scope="col">Error Esperado</th>
                        <th class="testth testerrorobtenido" scope="col">Error Obtenido</th>
                        <th class="testth testresultado" scope="col">Resultado</th>
                    </tr>
                    <?php
                    foreach ($this->test as $res) {
                    ?>
                        <tr class="<?php echo $res['conclusion'] == '0' ? "table-danger" : "table-success" ?>">
                            <td><?php echo $res['entidad']; ?></td>
                            <td><?php echo $res['atributo']; ?></td>
                            <td><?php echo $res['error'] . '<br>' . '<span class=\'' . $res['obtenido'] . '\'>'; ?></td>
                            <td>
                                <?php
                                var_dump($res['dato']);
                                /*if (is_array($res['dato'])){
                                    foreach ($res['dato'] as $key => $value) {
                                        if(is_array($value)){
                                            foreach($value as $key=>$value){
                                                
                                                echo $key.'='.$value.'<br>';
                                            }
                                        }else{
                                            echo $key.'='.$value.'<br>';
                                        }
                                    }
                                } else {
                                    if (strlen($res['dato']) > 20) {
                                        echo substr($res['dato'], 0, 20)."...";
                                    } else echo $res['dato'];
                                }*/
                                ?>
                            </td>
                            <td><?php echo $res['esperado']; ?></td>
                            <td><?php echo $res['obtenido']; ?></td>
                            <td><?php echo $res['conclusion']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
<?php
    }
}

?>