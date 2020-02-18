<style>
.carre {
  position: relative;
  height: 500px;
  width: 500px;
  background: green;
  margin-left: 50px;
}
.line {
  position: relative;
  width: 100%;
  height: 10px;
  background: blue;
  top: 5px;
}

.line2 {
  position: relative;
  width: 10px;
  height: 100%;
  background: blue;
  top: 5px;
  margin-left: 5px;
}
.longueur {
  position: absolute;
  margin-left: 50%;
  color: #FFF;
  font-weight: bold;
  font-size: 2em;
}

.largeur {
  position: absolute;
  top: 50%;
  color: blue;
  font-weight: bold;
  font-size: 2em;
}
</style>

<div class="carre">

  <div class="line">
<h1 class="longueur">100</h1>
  </div>
  <div class="line2">
<h1 class="largeur">100</h1>
  </div>
</div>
