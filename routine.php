<?php 
// start classes


class Overview {
    public  $height;
    public  $weight;
    public  $gender;
    public  $age;
    public  $activity_level;
    public $weight_goals;
    public $days_availabe;
    public $routine_goal;
    
  
    // GET INFORMATION UP FIRST

    function __construct($height,$weight,$gender,$age,$activity_level,$goal,$days_availabe,$routine_goal) {
        $this->height=$height;
        $this->weight=$weight / 2.2;
        $this->gender=$gender;
        $this->age=$age;
        $this->activity_level=$activity_level;
        $this->weight_goals=$goal;
        $this->days_availabe=$days_availabe;
        $this->routine_goal=$routine_goal;


        // get function 
        switch ($this->weight_goals){
            case "lose_fat":
                $this->lose_fat();
            break;
            case "gain_weight":
                $this->gain_weight();
            break;
            case "maintain":
                $this->tdee();
            break;
        }
    }

    // diet build
public function gain_weight(){
    
    $new_diet = $this->tdee();
    $add = $new_diet+500;
    return $add;
}
    public function lose_fat(){

        

        $lose_weight_newdiet = $this->tdee();
        

        $new_diet = $lose_weight_newdiet - 500;
     
        return $new_diet;

      
    }
    // get bmi data

    public function bmi() {
        $weight = $this->weight*2.2;
        $height_me = $this->height * $this->height;

        $combined = $weight / $height_me;

      
        
        $bmi = $combined * 703;

        $bmi = round($bmi,0);
       
        // TELL THEM IF YOUR FAT
       
        echo 'Body mass index (BMI) is a measure of body fat based on height and weight that applies to adult men and women';
        echo '<br>';

        if ($bmi < 18){
            echo 'Your BMI is considered underweight';
            echo '<br>';
            echo $bmi;

        } else if($bmi >27) {
            echo "Your BMI is considered overweight";
            echo '<br>';
            echo $bmi;
            

        } else if($bmi >30) {
            echo "Your BMI is considered obese ";
            echo '<br>';
            echo $bmi;
        }
        else {
            echo "Your in a normal Weight Range ";
            echo "Your BMI is ";
            echo '</n> '. $bmi;
        }
        
    }
    // Weight better
    function bmr(){
        
    if ($this->gender == 'female') {
        $newheight= $this->height * 2.54;
        
        $bmr = (655.1+(9.563 * $this->weight)+(1.85*$newheight)-(4.676*$this->age));
       
        return $bmr;
        
       
    } else if($this->gender=='male'){
        
        $newheight= $this->height * 2.54;

        
        $bmr = (66.47 + (13.75*$this->weight) + (5.003*$newheight)) - (6.755 * $this->age);

        return $bmr;
     
        
        // Start of bmr calculation

       
    }
    else {
        echo 'Error Doesnt work';
    }
        
    }

    // get tdee 

    function tdee () {
        // get out put and set tdee to add
        switch ($this->activity_level) {
            case "sedentary":
                $to_add = 1.2;
            break;
            case "light_work":
                $to_add = 1.375;
            break;
            case "medium":
                $to_add=1.55;
            break;
            case "heavy_work":
                $to_add = 1.725;
            break;
            case "beast":
                $to_add=1.9;
            break;

        }

        // Now get bmr then multiply tdee

       $this->bmr=$this->bmr();

       $tdee= $this->bmr * $to_add;
       $tdee= round($tdee,0);
       return $tdee;
       

    }
    public function macros() {
        $weight = $this->weight*2.2;
        

        if ($this->weight_goals == 'lose_fat'){
            echo '<h3><b>This macro is for maintaining weight</b></h3>';
            $carb=.2*$weight;
            $fat=.3*$weight;
            $protein=.5 * $weight;

            
           
            echo "
            <li> Protein: $protein grams </li>
        <li> Carbs: $carb grams</li>
        <li> Fats: $fat  grams</li>
            ";
        } else if($this->weight_goals =='gain_weight'){

            echo '<h3><b>This macro is for maintaining weight</b></h3>';
            $carb=.5*$weight;
            $fat=.2*$weight;
            $protein=.3 * $weight;
            
            echo "
            <li> Protein: $protein grams </li>
        <li> Carbs: $carb grams</li>
        <li> Fats: $fat  grams</li>
            ";

        }
        else if ($this->weight_goals=='maintain'){

            echo '<h3><b>This macro is for maintaining weight</b></h3>';
            $carb=.33*$weight;
            $fat=.33*$weight;
            $protein=.33 * $weight;
            
           
            echo "
            <li> Protein: $protein grams </li>
        <li> Carbs: $carb grams</li>
        <li> Fats: $fat  grams</li>
            ";
        }
    }

    public function get_routine(){

          
        
        if ($this->routine_goal == 'gain_muscle') {
            if ( $this->days_availabe == '3') {
                echo 

                '<embed src="https://cdn.muscleandstrength.com/sites/default/files/workouts/3dayhardcore.pdf" width="100%" height="500">';

                // dude 100 percent


            }
            else if ( $this->days_availabe =='4'){
                echo 

                '<embed src="https://cdn.muscleandstrength.com/sites/default/files/workouts/3daysplitplusfullbodyfriday.pdf" width="100%" height="500">';
            }
            else if ( $this->days_availabe =='5') {
                echo 

                '<embed src="https://cdn.muscleandstrength.com/sites/default/files/workouts/m-f-workoutroutine_1.pdf" width="100%" height="500">';
            }
            else {
                return null;
            }
        }
        
        if ($this->routine_goal == 'get_stronger') {
            if ( $this->days_availabe == '3') {
                echo 

                '<embed src="https://docs.google.com/spreadsheets/d/1FjhZyucDANh7pkAMVWoi30WJvzeV64LnAcQfa2KUla0/edit#gid=154613498" width="100%" height="500">';
            }
            else if ( $this->days_availabe =='4'){
                echo 

                '<embed src="https://cdn.muscleandstrength.com/sites/default/files/workouts/mattkroc16weekstrength.pdf" width="100%" height="500">';
            }
            else if ( $this->days_availabe =='5') {
                echo 

                '<embed src="https://cdn.muscleandstrength.com/sites/default/files/workouts/4-5dayworkoutforbuildingmuscleandstrength.pdf" width="100%" height="500">';
            }
            else {
                return null;
            }
        }
        
        if ($this->routine_goal == 'toned') {
            if ( $this->days_availabe == '3') {
                echo 

                '<embed src="https://cdn.muscleandstrength.com/sites/default/files/workouts/kingofcalistehenics.pdf" width="100%" height="500">';
            }
            else if ( $this->days_availabe =='4')f3{
                echo 

                '<embed src="https://steelsupplements.com/blogs/steel-blog/4-day-calisthenics-workout-plan-for-beginners" width="100%" height="500">';
            }
            else if ( $this->days_availabe =='5') {
                echo 

                '<embed src="https://cdn2.hubspot.net/hubfs/2073800/Premium_Content/ebook_8WeekShred.pdf" width="100%" height="500">';
            }
            else {
                return null;
            }
        }

    }

}


// get data from long form

if (isset($_POST['submit'])){

    $goal = $_POST['weight_goals'];
    $routine_goal = $_POST['workouts'];
    $days_availabe = $_POST['days_workouts'];
    $active_level = $_POST['activity_level'];
   // $does_workout = $_POST['do_workout'];
    $level_working = $_POST['experience_level'];
    $height =$_POST['height'];
    $weight = $_POST['weight'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    // Now logic controls 

    
    if (!empty($height) && !empty($weight) && !empty($gender) && !empty($age)) {


        // Check If int

        if (!is_int($age) && !is_int($height) && !is_int($weight)) {
            
           
            //$height = $height / 39.37;//M^2
            //$height = $height **2;
            

            $overview = New Overview($height,$weight,$gender,$age,$active_level,$goal,$days_availabe,$routine_goal);
            
           
          
          

        }

        else {

            echo 'Sorry thats not a number';
        }
        
    } else {echo '<p> You"ve missed something please </p>';}



}else{}
?>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
<div class="container">
<div class="jumbotron">
  <h1 class="display-4">Your Routine Has Been Generated</h1>
  <p class="lead"><?php 
  $overview->bmi();
  ?></p>
  <hr class="my-4">
  <p>BMI is just an indication not a major factor in your fitness routine diet is important</p>
  <a class="btn btn-primary btn-lg" href="https://www.instagram.com/chozysports/" role="button">Follow Me </a>
</div>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Diet Generator</h1>
    <p class="lead">This is your diet break down and what you should eat based of your inputs
       </p> 
  <p> <a href="https://www.tigerfitness.com/blogs/tools/tdee-calculator-total-daily-energy-expenditure">TDEE is how many calories your body exerts based of a multitude of reasons... </a>
  
  <b> Your TDEE is  <?php
  echo $overview->tdee();
  ?> </b> Since you want to <?php echo $goal;?>
   </p>
   <p> If you need help counting calories <a href="https://www.myfitnesspal.com/">MyFitnessPal </a></p>
   <p> Eat around those calories to hit your goals <b> 1lb a week </b> </p>

   <h1> 

   Macros </h1>
   <p> Macros are the protein, carb and fat intake to help you get closer to your goal </p>

   <p> For your goal you need to eat 
    <ul>
        <?php $overview->macros();?>
    </ul>
   </p>

  </div>
</div>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Work Out Plan</h1>
    <p class="lead">Following this plan will help you <b><?php echo $routine_goal;?> </b></p>
    <?php $overview->get_routine();?>
  </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>