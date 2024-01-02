start1 = document.getElementById("start1");
start2 = document.getElementById("start2");
stop1 = document.getElementById("stop1");
stop2 = document.getElementById("stop2");
Description = document.getElementById("Description");
Advice = document.getElementById("Advice");

start1.addEventListener("click",function(){
    start1.style.display="none"
    stop1.style.display="flex"
    var speech =true
    window.SpeechRecognition = window.webkitSpeechRecognition;
    const recognition = new SpeechRecognition();
    recognition.interinResults=true;
    recognition.continuous=true;
    
    recognition.addEventListener('result',e=>{
        const transcript =Array.from(e.results)
        .map(result => result[0])
        .map(result => result.transcript)

        Description.innerHTML=transcript;
    })

    if(speech==true){
        recognition.start();
    }
    stop1.addEventListener("click",function(){
        recognition.continuous=false;
        recognition.stop();
        start1.style.display="flex"
        stop1.style.display="none"
    })
})



start2.addEventListener("click",function(){
    start2.style.display="none"
    stop2.style.display="flex"
    var speech =true
    window.SpeechRecognition = window.webkitSpeechRecognition;
    const recognition = new SpeechRecognition();
    recognition.interinResults=true;
    recognition.continuous=true;

    recognition.addEventListener('result',e=>{
        const transcript =Array.from(e.results)
        .map(result => result[0])
        .map(result => result.transcript)

        Advice.innerHTML=transcript;
    })

    if(speech==true){
        recognition.start();
    }

    stop2.addEventListener("click",function(){
        recognition.continuous=false;
        recognition.stop();
        start2.style.display="flex"
        stop2.style.display="none"
    })
})