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
    <style>
      #main {
        width:100%;
        border-radius: 25px;
        background-color:#D0D3D4;
        display: flex;	
        flex-wrap:wrap;
        justify-content:space-around; 
      }
      #main div {

        background-color:#F7F9F9;
        width:410px;
        margin:10px;
        height:400px;

      }


      #main div img{

        border-radius: 25px;
        margin:5px;
        width:400px;
        height:80%;
      }
      h3,h1{
        text-align:center;

      }
      #main div img:hover{
        -webkit-transition: border-radius 1s;
        border-radius:100%;
        cursor: pointer;

      }
      a:link {
        color: blue;
      }

      /* visited link */
      a:visited {
        color: green;
      }

      /* mouse over link */
      a:hover {
        color: hotpink;
      }

      /* selected link */
      a:active {
        color: blue;
      }

    </style>
  </head>
  <body>

    <h1>Islas exoticas</h1>
    <p><b><a href="index.php" target="_blank">Regresar</a></b></p>
    <div id="main">
      <div> <img src="imagen/1.jpg" alt="Smiley face" width="300" height="150">
        <h3>IMAGEN 1</h3>

      </div>
      <div> <img  src="imagen/2.jpg" alt="Smiley face" width="300" height="150">
        <h3>IMAGEN 2</h3>

      </div>
      <div> <img  src="imagen/3.jpg" alt="Smiley face" width="400" height="250">
        <h3>IMAGEN 3</h3>


      </div>
      <div> <img  src="imagen/4.jpg" alt="Smiley face" width="400" height="250">
        <h3>IMAGEN 4</h3>

      </div>
      <div> <img  src="imagen/5.jpg" alt="Smiley face" width="400" height="250">
        <h3>IMAGEN 5</h3>

      </div>

      <div> <img  src="imagen/6.jpg" alt="Smiley face" width="400" height="250">
        <h3>IMAGEN 6</h3>

      </div>
      <div> <img  src="imagen/7.jpg" alt="Smiley face" width="400" height="250">
        <h3>IMAGEN 7</h3>

      </div>
      <div> <img  src="imagen/8.jpg" alt="Smiley face" width="400" height="250">
        <h3>IMAGEN 8</h3>
      </div>
      <div> <img  src="imagen/9.jpg" alt="Smiley face" width="400" height="250">
        <h3>IMAGEN 9</h3>

      </div>
    </div>

  </body>
</html>
