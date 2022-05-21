<?php 
include "../../translate.php";
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Blog</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
<style>
body, html {
    height: 100%;
    font-family: "Inconsolata", sans-serif;
    
}.bgimg {
    background-position: top;
    background-repeat:no-repeat;
    background-image: url("../pic/HeartAttack.jpg");
    min-height:75%;
  
}    footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color:#000000;
  }  .container-fluid {
      padding: 60px 50px;
  }

.menu {
    display: none;
}
</style>
<body>


<!-- Header with image -->

<header class="bgimg w3-display-container  w3-grayscale-min" id="myPage" >
</header>


<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

<!-- About Container -->
<div class="w3-container" id="about">
  <div class="w3-content" style="max-width:900px">
    <h2 class="w3-center w3-padding-50 "><span class="w3-tag w3-wide ">Anxiety, depression tied to higher risk of heart attack, stroke</span></h2>
    <p class=" text-center">Adults with mood disorders like anxiety and depression may be more likely to have a heart attack or stroke than people without mental illness, a new study suggests.<br>

Researchers enrolled 221,677 people age 45 and older without any history of heart attack or stroke and tracked them for an average of nearly five years.<br>


More than 90 percent of participants were ages 45 to 79. In this age group, compared to men without mental health issues at the start, men with moderate psychological distress were 28 percent more likely to have a heart attack during the study and 20 percent more likely to have a stroke. Men in this age group with high levels of distress were 60 percent more likely to have a heart attack and 44 percent more likely to have a stroke.<br>


Women ages 45 to 79 with moderate psychological problems were 12 percent more likely to have a heart attack and 28 percent more likely to have a stroke than women without any mental distress. Women with high psychological distress were 24 percent more likely to have a heart attack and 68 percent more likely to have a stroke.<br>
</p>
<div class="w3-panel w3-leftbar w3-light-grey">
<p class=" text-center"><i class="text-center">
“The stronger association between psychological distress and heart attack in men compared to women could be due to women being more likely than men to seek primary care for mental and physical health problems,<br> thus partly negating the possible physical effects of mental health problems,” said lead study author Caroline Jackson of the University of Edinburgh in the U.K.<br>
    <img src="../pic/heart_attack_signs.jpg"style="width:100%;max-width:900px" class="w3-margin-top">

“Alternatively, it could reflect the known hormonal protection against heart disease in women since the study population included a large number of younger women,” Jackson said by email. <br>“We did however find a strong association between psychological distress and stroke in women, perhaps suggesting different mechanisms exist between psychological distress and different types of cardiovascular disease in women.”<br>

Overall, the study participants suffered 4,573 heart attacks and 2,421 strokes.<br>

The study wasn’t designed to prove whether or how depression or anxiety might directly cause heart attacks or strokes, researchers note in Circulation: Cardiovascular Quality Outcomes.
<br>
Another limitation is that researchers assessed psychological factors at a single point in time, making it impossible to know if worsening cardiovascular health contributed to mood disorders or if mental illness caused heart problems.
<br>
However, it’s possible that lifestyle factors like poor eating and exercise habits, smoking, or inactivity might independently influence both the risk of mental health problems and heart issues, the study authors note.
<br>
    <img src="../pic/hpg160003fa.png"style="width:100%;max-width:900px" class="w3-margin-top">
“It is also possible that symptoms of depression or anxiety directly affect the body’s physiology through mechanisms such as hormonal pathways, inflammatory processes in arteries and increased risk of blood clotting,” Jackson said. “It is vital that further research seeks to identify the underlying mechanisms so that we can better understand the link between mental health and subsequent physical health and inform intervention strategies.”<br>

Researchers assessed psychological distress using a standard set of questions designed to reveal symptoms of mood disorders. The questions asked, for example, how often people felt tired for no reason, how often they felt restless or fidgety, and how frequently they felt so sad that nothing could cheer them up.
<br>
Overall, about 16 percent of the study participants had moderate psychological distress and roughly 7 percent had high or very high levels of mental distress.</i></p>
</div>
  </div>
</div>
</div>
<!-- End page content -->
</div>


  <div class="container">
   <form method="POST" id="comment_form">
    <div class="form-group">
     <input type="email" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Your Email/Gmail Address" />
    </div>
    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <input type="submit" name="submit" id="submit" class="btn btn-info bg-primary" value="Submit" />
    </div>
   </form>
   <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>
  </div>
  <div class="container ">
<ul class="pager font-weight-bold text-monospace">
  <li class="previous "><a href="blog_2.php">Previous Page</a></li>
  <li class="center"><a href="../../index.php">Back to home page</a></li>
  <li class="next "><a href="../blog_front_page.php">Back to first page</a></li>
</ul></div><!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-48 w3-large container-fluid text-center">  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Copyright@ <a href="https://www.reuters.com/article/us-health-mood-heart/anxiety-depression-tied-to-higher-risk-of-heart-attack-stroke-idUSKCN1LD2GN"title="reuters.com" target="_blank" class="w3-hover-text-green">reuters.com</a></p>
</footer>
 </body>
</html>

<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>
