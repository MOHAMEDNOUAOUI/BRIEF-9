<?php
require '../CONTROLER/SCORE_CONTROLER.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/index.css">
</head>
<body>
  <div class="videocontainer">
    <!-- <video autoplay loop muted plays-inline type="video/mp4" controls class="background-video">
      <source src="./IMGS/Sea of Stars - PlayStation Demo Now Available!.mp4">
    </video> -->
  </div>
  <main class="main d-flex position-relative justify-content-center align-items-center">
    <div class="reply border border-3 border-black w-50 h-50 d-flex position-relative">
      <h3 class="position-absolute QUIZZ">QUIZZ GAME</h3>
      <div class="left d-flex flex-column w-75 align-items-center justify-content-center">
        <!-- <form action="" id="myForm"> -->
        <input type="text" required name="PLAYERNAME" id="PLAYERNAME" placeholder="Player Name">
        <button type="submit" class="w-25" id="ENTER"  name="ENTER">Enter</button>
        <!-- </form> -->
</div>
      <div class="right w-50 bg-danger">
        <img src="./IMGS/Portrait_Zale.png"      alt="quizzer profile">
      </div>
    </div>
  </main>
  <script src="./js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
