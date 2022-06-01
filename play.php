<!DOCTYPE html>
<html>
<body>
<?php
include 'header.php';
include 'config.php';


$id = 0;
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "SELECT * FROM audio WHERE id ='$id' ";
  $data = mysqli_query($conn,$query);
  
  while($row= mysqli_fetch_array($data)){
    $id = $row['id'];
    $cover = $row['picture'];
    $music = $row['Title'];
    
  }


  echo "<br>";
  echo "<img src='cover/".$cover."' class='cover' >";   
  echo '
  <audio id = "music" autoplay="true" style="display:none;">
  <source src="upload/'.$music.'" type="audio/mpeg"> 
  </audio>  
  <div class = "container">
  <div class="center">
  <h2>'.$music.'</h2>
  <br>  
  <button onclick="playAudio()" type="button">Play Audio</button>
  <button onclick="pauseAudio()" type="button">Pause Audio</button>
  <button onclick="stopAudio()" type="button">Stop Audio</button>
  <button onclick="next()" type="button">Next Audio</button>
  <br>
  


  <div class="progress">
  <span class="start"></span>
  <div class="progress-bar">
    <div class="now"></div>
  </div>
  <span class="end"></span>
</div>

  </div>
  </div>
  ';
  


}



?>
<script>
const audio= document.getElementById('music'); 
const start = document.querySelector('.start')
const end = document.querySelector('.end')
const progressBar = document.querySelector('.progress-bar')
const now = document.querySelector('.now')




function playAudio() { 
  audio.play(); 
} 

function pauseAudio() { 
  audio.pause(); 
} 

function stopAudio(){
  audio.pause();
  audio.currentTime = 0;


}

function nextAudio(){

}


  function conversion (value) {
    let minute = Math.floor(value / 60)
    minute = minute.toString().length === 1 ? ('0' + minute) : minute
    let second = Math.round(value % 60)
    second = second.toString().length === 1 ? ('0' + second) : second
    return `${minute}:${second}`
  }

  audio.onloadedmetadata = function () {
    end.innerHTML = conversion(audio.duration)
    start.innerHTML = conversion(audio.currentTime)
  }

  progressBar.addEventListener('click', function (event) {
    let coordStart = this.getBoundingClientRect().left
    let coordEnd = event.pageX
    let p = (coordEnd - coordStart) / this.offsetWidth
    now.style.width = p.toFixed(3) * 100 + '%'

    audio.currentTime = p * audio.duration
    audio.play()
  })

  setInterval(() => {
    start.innerHTML = conversion(audio.currentTime)
    now.style.width = audio.currentTime / audio.duration.toFixed(3) * 100 + '%'
  }, 1000)





</script>

<style>
.h2 {
  font-size: 12px;
  font-family: "Times New Roman", Times, serif;

}
.cover {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 25%;
}
.container {
  height: 200px;
  position: relative;
  
}

.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;

}

.progress {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 380px;
      margin: 100px auto;
    }

    .progress-bar {
      position: relative;
      width: 70%;
      height: 5px;
      background-color: #eee;
      vertical-align: 2px;
      border-radius: 3px;
      cursor: pointer;
    }

    .now {
      position: absolute;
      left: 0;
      display: inline-block;
      height: 5px;
      width: 70%;
      background: #31c27c;
    }

    .now::after {
      content: '';
      position: absolute;
      left: 100%;
      width: 3px;
      height: 7px;
      background-color: lightblue;
    }

</style>

</body>
</html>


