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
            var indo;
            var indop2;
            //var bolas;
            
            function carregar(){
                
                
                posicoes = [0, 60, 120, 180, 240, 300];
                indo = [true,true,true,true,true, true];
                indop2 = [true,true,true,true,true, true];
                
               for ( var i = 0 ; i<6 ;i++){
                    addBola(i);
                    console.log("bola " + i + " adicionada");
                }
                //alert("carregando");
                
            }
            
            function addBola(index){
                var bola = document.createElement("div");
                console.log("bola " + index + " adicionada");
                bola.setAttribute("class","bola");
                
                //p1 = posicoes[Math.floor(Math.random() * 6)];
                p1 = posicoes[index];
                p2 = 500;
                bola.setAttribute("style", "left: "+p1+"px; top: "+p2+"px");
                bola.setAttribute("onmousedown","estourar(this, "+index+") ");
                document.body.appendChild(bola);
                //setInterval(function(){up(spaceship);},10);
                setInterval(function (){movimentarBolas(bola, index);}, 30);
            }
            
            function estourar(bola, index){
                p1 = parseInt(bola.style.left);
                p2 = parseInt(bola.style.top);
                
                document.getElementById('player').play()
                console.log("bola " + index + " removida");
                indo[index] = true;
                indop2[index] = true;
                document.body.removeChild(bola);
                p1 = posicoes[index];
                p2 = 500;
                addBola(index);
                placar();
            }
            
            function placar(){
                var placar = document.getElementById("placar").innerHTML;
                placar++;
                document.getElementById("placar").innerHTML = placar;
            }
            
            
            function movimentarBolas(bola,index){
                p1 = parseInt(bola.style.left);
                p2 = parseInt(bola.style.top);
                if (indop2[index]){
                    p2 = p2 - 10;
                    console.log(index + "posicao p2 " + p2);
                    if ( p2 <= 0 ){
                        indop2[index] = false;
                    }
                } else {
                    p2 = p2 + 10;
                    console.log(index + "posicao p2 " + p2);
                    if ( p2 > 500 ){
                        indop2[index] = true;
                    }
                }
                if (indo[index]){
                    p1 += 10;
                    //console.log("posicao p1 " + p1);
                    if ( p1 >= 450){
                        indo[index] = false;
                    }
                } else {
                    p1 -= 10;
                    if ( p1 <=0 ){
                        indo[index] = true;
                    }
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
            
            .quadro{
                height: 550px;
                width: 500px;
                border: 2px solid red;
                position: absolute;
                top:0;
                left: 0;
            }
        </style>
    </head>
    <body onload="carregar()">
        <?php
        echo 'Hello world php!'
        ?>
        <div class="quadro">
            
        </div>
        <audio id="player" preload autoplay >
            <source src="js/som2.wav" type="audio/wav"/>
        </audio>
        <audio controls preload autoplay loop>
            <source src="js/4.mp3" type="audio/mpeg"/>
        </audio>
        <div class="placar" id="placar">0</div>
    </body>
</html>
