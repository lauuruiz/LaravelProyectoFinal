<?php
    ini_set('display_error',1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once('header.php');
    require_once('navbar.php');
    require_once('comanda.php');

    if (isset($_POST['id'])) {
        //"[{"id":2,"idfactura":1,"idproducto":2,"idempleado":3,"unidades":54,"precio":1.25,"entregada":0}]",

        $comanda = "[{'id':".$_POST['id'].", 'idfactura':".$_POST['idfactura'].",'idproducto':". $_POST['idproducto'].",'idempleado':".$_POST['idempleado'].",'unidades':".$_POST['unidades'].",'precio':".$_POST['precio'].",'entregada':1}]";

        //$comanda = new Comanda($_POST['id'], $_POST['idfactura'], $_POST['idproducto'], $_POST['idempleado'], $_POST['unidades'], $_POST['precio'], 1);
        echo $comanda;
        echo "<br>";

        //$comandaprueba = json_encode($comanda);
        file_put_contents("http://informatica.ieszaidinvergeles.org:8061/posweb/public/api/comanda/".$_POST['id'], $comanda);
    }

    $facturaBD = file_get_contents("http://informatica.ieszaidinvergeles.org:8061/posweb/public/api/factura");
    
    $arrayFactura = json_decode($facturaBD);

    $productoBD = file_get_contents("http://informatica.ieszaidinvergeles.org:8061/posweb/public/api/producto");

    $arrayProducto = json_decode($productoBD);

    $comandaBD = file_get_contents("http://informatica.ieszaidinvergeles.org:8061/posweb/public/api/comanda");

    $arrayComanda = json_decode($comandaBD);

    if(isset($_GET['destino'])){
        $target = $_GET['destino'];
    }else{
        $target = "barra";
    }
    
    $arrayComandaTabla = array();
    
    for($i = 0; $i < count($arrayComanda); $i++){
        if($arrayComanda[$i]->entregada == 0 ){
            for($k = 0; $k < count($arrayProducto); $k++){
                if($arrayComanda[$i]->idproducto == $arrayProducto[$k]->id){
                    if($arrayProducto[$k]->destino == $target){
                        for($j = 0; $j < count($arrayFactura); $j++){
                            if($arrayComanda[$i]->idfactura == $arrayFactura[$j]->id){
                               array_push($arrayComandaTabla, $arrayComanda[$i]);
                            }
                        }
                    }
                }
            }
        }
    }

    echo "<div class='container'>
        <div class='row'>
            <div class='col-12'><h1>Factura</h1></div>
        </div>
        <div class='row rowTablaIcono'>
            <div class='col-2 iconoFlecha'>
                <i class='fas fa-chevron-left'></i>
            </div>
            <div class='col-8'>
                <table class='table table-hover'>
                    <thead>
                    <tr class='cabecera'>
                        <th scope='col'>Id</th>
                        <th scope='col'>Producto</th>
                        <th scope='col'>Unidades</th>
                        <th scope='col'>Mesa</th>
                        <th scope='col'>Hora de inicio</th>
                        <th scope='col'>¿Entregada?</th>
                    </tr>
                    </thead>
                    <tbody>";
                    
                    for($i = 0; $i < count($arrayComandaTabla); $i++){
                        for($k = 0; $k < count($arrayProducto); $k++){
                            if($arrayComandaTabla[$i]->idproducto == $arrayProducto[$k]->id){
                                for($j = 0; $j < count($arrayFactura); $j++){
                                    if($arrayComandaTabla[$i]->idfactura == $arrayFactura[$j]->id){
                                       echo "<tr>
                                        <td>".$arrayComandaTabla[$i]->id."</td>
                                        <td>".$arrayProducto[$k]->nombre."</td>
                                        <td>".$arrayComandaTabla[$i]->unidades."</td>
                                        <td>".$arrayFactura[$j]->mesa."</td>
                                        <td>".$arrayFactura[$j]->horadeinicio."</td>";
                                        echo "<td><form id='form' class='topBefore' enctype='application/x-www-form-urlencoded' method='post' action=".$_SERVER['PHP_SELF'].">
                                                 <input type='hidden' name='id' value='".$arrayComandaTabla[$i]->id."'/>
                                                 <input type='hidden' name='idfactura' value='".$arrayComandaTabla[$i]->idfactura."'/>
                                                 <input type='hidden' name='idproducto' value='".$arrayComandaTabla[$i]->idproducto."'/>
                                                 <input type='hidden' name='idempleado' value='".$arrayComandaTabla[$i]->idempleado."'/>
                                                 <input type='hidden' name='unidades' value='".$arrayComandaTabla[$i]->unidades."'/>
                                                 <input type='hidden' name='precio' value='".$arrayComandaTabla[$i]->precio."'/>
                                                 <input type='submit' name='submit' class='form-control' id='submit'>                                               
                                                </form></td>
                                        </tr>";
                                    }
                                }
                            }
                        }
                    }
                    
                    echo "</tbody>
                    </table>
                </div>
                <div class='col-2 iconoFlecha'>
                    <i class='fas fa-chevron-right'></i>
                </div>
            </div>
        </div>";

    require_once('footer.php');
?>