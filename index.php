<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>

<body>



<form id="msform" action="routine.php" method="POST">

  <ul id="progressbar">
    <li class="active">Goals set up</li>
    <li>Diet Calculator</li>
    <li>Personal Details</li>
  </ul>
 
  <fieldset><!-- GOAL -->
    <h2 class="fs-title">Routine Creator</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <select name="weight_goals" id="select">
  <option value="lose_fat">I want to lose fat</option>
  <option value="gain_weight">I want to gain weight</option>
  <option value="maintain">I want to maintain</option>
  
</select>
    

<!-- Muscle Workouts -->
<select name="workouts" id="select">
  <option value="gain_muscle">I want to gain Muscle</option>
  <option value="get_stronger">I want to get stronger</option>
  <option value="toned">I want to get toned</option>
  
</select>
<placeholder>  How many times you want to work out a week? </placeholder>
<!-- Days You wanna work out -->
<select name="days_workouts" id="select">
  <option value="3">3 days a week</option>
  <option value="4">4 days a week</option>
  
  <option value="5">5 days a week</option>
  
</select>


   
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">TDEE Calculator </h2>
    <h3 class="fs-subtitle">Your daily life</h3>
    <!-- ACTIVITY LEVEL -->
    <placeholder> Activity level </placeholder>
    <select name="activity_level" id="select">
        
  <option value="sedentary">Sedentary| Little to no exercise + work a job that requires you to sit</option>
  <option value="light_work">Light Work| light exercise 1-3 days / week</option>
  <option value="medium">Medium| moderate exercise 3-5 days / week</option>
  <option value="heavy_work">Heavy Work|heavy exercise 6-7 days / week</option>
  <option value="beast">Very Hard exericse |very heavy exercise, hard labor job, training 2x / day</option>
</select>


<!-- Do you work out -->

<!--<placeholder> Do you Work out? </placeholder>
    <select name="do_workout" id="select">
        
  <option value="no">No I don't work out</option>
  <option value="light_workout">3-5 days| Light workout, IE I can keep a conversation; walking, hiking</option>
  <option value="medium_workout">3-5 days| Medium workout, IE running a mile weight lifting for 1-2 hours</option>
  <option value="intense_workout">3-5 days|Intense workout, IE I can't keep a conversation; Sprints for 30 minutes, Heavy weightlifting</option>
 
  
</select> -->


    

<!-- experience level --> 

<placeholder> experience level </placeholder>
    <select name="experience_level" id="select">
        
  <option value="noob">Noob- Just started </option>
  <option value="novice">Novice 1-2 Years</option>
  <option value="Beast">Beast 2+ Years </option>
 
 
 
  
</select>
   
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Body Details</h2>
    <h3 class="fs-subtitle">It's not weird i promise</h3>
    <input type="text" name="height" placeholder="Height in inch" />
    <input type="text" name="weight" placeholder="Weight in lbs" />
    <select name="gender" id="select">
    <option value="male">Male </option>
    <option value="female">Female </option>
</select>
<input type="text" name="age" placeholder="Age" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" value="Submit" />
  </fieldset>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<script type="text/javascript">


var current_fs, next_fs, previous_fs; 
var left, opacity, scale; 
var animating; 

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	
	next_fs.show(); 

	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			
			scale = 1 - (1 - now) * 0.2;
			
			left = (now * 50)+"%";
			
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	
	previous_fs.show(); 
	
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			
			
			scale = 0.8 + (1 - now) * 0.2;
		
			left = ((1-now) * 50)+"%";
		
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})

</script>

</body>

</html>