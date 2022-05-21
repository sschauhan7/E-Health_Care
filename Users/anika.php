<!DOCTYPE html>
<html>
<body>
<script>
var questions = [
     {
           prompt: "Are you experience of any these syptoms?\n(a)aa\n\ (b) ss\n(c) cc",
           answer: "a"
     },
     {
          prompt: "Are you experience these symptons too?\n(a) ss\n\ (b)ss\n(c)cc",
          answer: "c"
     },
     {
        //  prompt: "What color are strawberries?\n(a) Yellow\n\ (b) Red\n(c) Blue",
      //    answer: "a"
     }
];


var score = 0;

/*for(var i = 0; i < questions.length; i++){
     var response = window.prompt(questions[i].prompt);
     if(response == questions[i].answer:"b" ){
         // score++;
          alert("suggested doctor");
     } else if(response == questions[i].answer:"c" ){
         // score++;
          alert("suggested doctor");
        //  alert("WRONG!");
     }
}
alert("suspected disease " + score + "/" + questions.length);
*/
for(var i = 0; i < questions.length; i++){
     var response = window.prompt(questions[i].prompt);
     if(response == questions[i].answer){
          score++;
      //    alert("Correct!");
     } else {
      //    alert("WRONG!");
     }
}
alert("suspected disease " + score + "/" + questions.length);
</script>
</body>
</html> 


