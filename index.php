<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript">
            
            var p1;
            var p2;
            var posicoes;
            var placar;
            //var bola;
            
            function carregar(){
                
                /*
                posicoes = [0, 60, 120, 180, 240, 300];
                for ( var i = 0 ; i<6 ;i++){
                    addBola(i);
                }
                alert("carregando");
                */
            }
            
            function addBola(index){
                var bola = document.createElement("div");
                bola.setAttribute("class","bola");
                
                //p1 = posicoes[Math.floor(Math.random() * 6)];
                p1 = posicoes[index];
                p2 = 550;
                bola.setAttribute("style", "left: "+p1+"px; top: "+p2+"px");
                bola.setAttribute("onmousedown","estourar(this, "+index+") ");
                document.body.appendChild(bola);
                //setInterval(function(){up(spaceship);},10);
                setInterval(function (){movimentarBolas(bola);}, 100);
            }
            
            function estourar(bola, index){
                document.body.removeChild(bola);
                addBola(index);
                placar();
            }
            
            function placar(){
                var placar = document.getElementById("placar").innerHTML;
                placar++;
                document.getElementById("placar").innerHTML = placar;
            }
            
            
            function movimentarBolas(bola){
                p1 = parseInt(bola.style.left);
                p2 = parseInt(bola.style.top);
                p2 = p2 - 20;
                if ( p2 < -50){
                    p2 = 550;
                }
                bola.setAttribute("style", "left: "+p1+"px; top: "+p2+"px");
            }
        </script>
        <style type="text/css">
            .bola{
                height: 50px;
                width: 50px;
                background-color: #f00;
                border-radius: 25px;
                position: absolute;
                
            }
            .placar{
                height: 200px;
                width: 200px;
                position: absolute;
                line-height: 200px;
                text-align: 200px;
                top: 200px;
                left: 600px;
                font-size: 80px;
            }
        </style>
    </head>
    <body onload="carregar()">
        <?php
        echo 'Hello world php!'
        ?>
        <audio controls  >
            <source src="82109__gniffelbaf__balloon-burst-01.wav" type="audio/wav"/>
        </audio>
        <div class="placar" id="placar">0</div>
    </body>
</html>
