<!DOCTYPE html>
<?php 
    include 'funcao.php';
    $vet = array('Avestruz', 'Águia', 'Burro', 'Borboleta', 'Cachorro',
    'Cabra', 'Carneiro', 'Camelo', 'Cobra', 'Coelho',
    'Cavalo', 'Elefante', 'Galo', 'Gato', 'Jacaré',
    'Leão', 'Macaco', 'Porco', 'Pavão', 'Peru',
    'Touro', 'Tigre', 'Urso', 'Veado', 'Vaca');

    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 1;
    $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
    $numero = isset($_POST['numero']) ? $_POST['numero'] : "";
    $animal = isset($_POST['animal']) ? $_POST['animal'] : "";

    $vet2 = array('01'=>'Avestruz','02'=>'Avestruz', '03'=>'Avestruz', '04'=>'Avestruz', '05'=>'Águia', '06'=>'Águia','07'=>'Águia','08'=>'Águia', '09'=>'Burro', '10'=>'Burro','11'=>'Burro','12'=>'Burro','13'=>'Borboleta','14'=>'Borboleta','15'=>'Borboleta','16'=>'Borboleta','17'=>'Cachorro','18'=>'Cachorro','19'=>'Cachorro','20'=>'Cachorro',
    '21'=>'Cabra','22'=>'Cabra','23'=>'Cabra','24'=>'Cabra','25'=>'Carneiro','26'=>'Carneiro','27'=>'Carneiro','28'=>'Carneiro','29'=>'Camelo','30'=>'Camelo','31'=>'Camelo','32'=>'Camelo','33'=>'Cobra','34'=>'Cobra','35'=>'Cobra','36'=>'Cobra','37'=>'Coelho','38'=>'Coelho','39'=>'Coelho','40'=>'Coelho',
    '41'=>'Cavalo','42'=>'Cavalo','43'=>'Cavalo','44'=>'Cavalo','45'=>'Elefante','46'=>'Elefante','47'=>'Elefante','48'=>'Elefante','49'=>'Galo','50'=>'Galo','51'=>'Galo','52'=>'Galo','53'=>'Gato','54'=>'Gato','55'=>'Gato','56'=>'Gato','57'=>'Jacaré','58'=>'Jacaré','59'=>'Jacaré','60'=>'Jacaré',
    '61'=>'Leão','62'=>'Leão','63'=>'Leão','64'=>'Leão','65'=>'Macaco','66'=>'Macaco','67'=>'Macaco','68'=>'Macaco','69'=>'Porco','70'=>'Porco','71'=>'Porco','72'=>'Porco','73'=>'Pavão','74'=>'Pavão','75'=>'Pavão','76'=>'Pavão','77'=>'Peru','78'=>'Peru','79'=>'Peru','80'=>'Peru',
    '81'=>'Touro','82'=>'Touro','83'=>'Touro','84'=>'Touro','85'=>'Tigre','86'=>'Tigre','87'=>'Tigre','88'=>'Tigre','89'=>'Urso','90'=>'Urso','91'=>'Urso','92'=>'Urso','93'=>'Veado','94'=>'Veado','95'=>'Veado','96'=>'Veado','97'=>'Vaca','98'=>'Vaca','99'=>'Vaca','00'=>'Vaca');


?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Jogo do Bicho</title>
    <link rel="stylesheet" href="recuperacao.css">
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</head>
<body onload="load_body()">
    <center>
    <header>O jogo do bicho</header>
    <form method="post">
        <fieldset>
            
            <input type="radio" name="tipo" id="tipo" value="1" <?php if ($tipo == 1) echo 'checked'; ?> onclick="load()">Grupo Simples<br>
            <input type="radio" name="tipo" id="tipo" value="2" <?php if ($tipo == 2) echo 'checked'; ?> onclick="load()">Milhar<br><br>

            Valor da Aposta:<input type="text" name="valor" id="valor" value="<?php echo $valor; ?>">
        </fieldset>
        <div id="milhar">
        <fieldset>
            Número:<input type="text" name="numero" id="numero" maxlength="4" value="<?php echo $numero; ?>">
        </fieldset>
        </div>
        <div id="gs">
        <fieldset>        
            Animal: <select name="animal" id="animal">
                   <?php
                   for ($x=0; $x<count($vet); $x++){
                       $index = $x + 1;
                       if ($index == $animal)
                            echo "<option value='$index' selected>$vet[$x]</option>";
                       else
                            echo "<option value='$index'>$vet[$x]</option>";
                   }

                   ?>
                   </select>
        </fieldset>
        </div>

         
        <input type="submit" value="Apostar">

    </form>Sorteio

    <?php
        echo "Tipo:".$tipo."<br>";
        echo "Valor: ".$valor."<br>";
        echo "Número:".$numero."<br>";
        echo "Animal:".$animal."<br><br>";
        $premios = sorteio();
        //var_dump($premios);
        if($tipo == 1){
            $i = 1;
            foreach($premios as $prem){
                $num = substr ($prem,2);
                $animais[] = array_search($vet2[$num],$vet)+1;
                if(!isset($premio)){
                    
                    $animalsort = array_search($vet2[$num],$vet)+1;
                    if($animalsort == $animal){
                       
                        $premio = $i;
                    }
                }
                //echo 'A:'.$i.' '.$animalsort.'='.$animal.'<br>';
                $i++;
                //echo 'B:'.$i.'<br>';
            }
            
            for ($x=0; $x<count($premios); $x++){
                
                echo ($x+1).'º Prêmio '.$premios[$x].'- <img src="img/'.((int)$animais[$x]).'.png" <br><br><br><br><br>';
            }
            if(isset($premio)){
                if ($premio==1)
                    echo "<p style='color:blue;''> Parabéns, você ganhou o $premio º prêmio, o valor de R$ " .$valor * 15, " reais</p>"; 
                elseif($premio==2)
                    echo "<p style='color:blue;''> Parabéns, você ganhou o $premio º prêmio, o valor de R$ " .$valor * 5, " reais</p>"; 
                elseif($premio==3)
                    echo "<p style='color:blue;''> Parabéns, você ganhou o $premio º prêmio, o valor de R$ " .$valor * 4, " reais</p>"; 
                elseif($premio==4)
                    echo "<p style='color:blue;''> Parabéns, você ganhou o $premio º prêmio, o valor de R$ " .$valor * 3, " reais</p>"; 
                elseif ($premio==5)
                echo "<p style='color:blue;''> Parabéns, você ganhou o $premio º prêmio, o valor de R$ " .$valor * 2, " reais</p>";  

            }else{
                echo  '<p style="color:red;"> Que pena, você não ganhou<p/>';
            } 
            

            

            
        }else{
            $i = 1;
            foreach($premios as $prem){
                $num = substr ($prem,2);
                $animais[] = array_search($vet2[$num],$vet)+1;
                if(!isset($premio)){
                    
                    if($prem == $numero){
    
                        $premio = $i;
                    }
                }
                $i++;
            }
            
            for ($x=0; $x<count($premios); $x++){  
                echo ($x+1).'º Premio  2 '.$premios[$x].'- <img src="img/'.((int)$animais[$x]).'.png" <br><br><br><br><br>';
            }
            if(isset($premio)){
                if ($premio==1)
                    echo "<p style='color:blue;''> Parabéns, você ganhou o $premio º prêmio, o valor de R$ " .$valor * 35, " reais</p>"; 
                elseif($premio==2)
                    echo "<p style='color:blue;''> Parabéns, você ganhou o $premio º prêmio, o valor de R$ " .$valor * 30, " reais</p>"; 
                elseif($premio==3)
                    echo "<p style='color:blue;''> Parabéns, você ganhou o $premio º prêmio, o valor de R$ " .$valor * 25, " reais</p>"; 
                elseif($premio==4)
                    echo "<p style='color:blue;''> Parabéns, você ganhou o $premio º prêmio, o valor de R$ " .$valor * 20, " reais</p>"; 
                elseif ($premio==5)
                echo "<p style='color:blue;''> Parabéns, você ganhou o $premio º prêmio, o valor de R$ " .$valor * 15, " reais</p>";  

            }else{
                echo  '<p style="color:red;"> Que pena, você não ganhou<p/>';
            } 

        }
    ?>
    </center>
</body>
</html>