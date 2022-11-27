$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        dots: false,
        margin: 48
    }
    );
  });


const videoBtn= document.querySelector('#video-btn');
const videoPic= document.querySelector('.video_picture');
const videoWrapper=document.querySelector('.video_play');
const videoFile=document.querySelector('#video-file');
    


  videoWrapper.addEventListener('click',function(){
    if(videoFile.paused){
      videoPic.classList.add('none');
      videoWrapper.classList.remove('video_overlay');
      videoBtn.classList.add('none')
      videoFile.play()

    } 
    else{ 
        videoFile.pause()
        videoWrapper.classList.add('video_overlay');
        videoBtn.classList.remove('none')
    
    }
    })