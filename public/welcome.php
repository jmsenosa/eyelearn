<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	 if (!$session->is_logged_in()) { redirect_to("login_student.php"); }
	
	// Find User 
	$user = Student::find_by_id($_SESSION['user_id']);	
	
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>

  
</head>


<body>
   <section class="welcome animated fadeInDown">
       <div class="content">
          <div class="fixed-action-btn horizontal" style="bottom: 30px; right: 100px;">
            <a class="btn-floating btn-large red">
              <i class="fa fa-cog"></i>
            </a>
            <ul>
              <li><a class="btn-floating green"><i class="fa fa-music musicon"></i>
              <span class="fa-stack fa-lg musicoff">
                  <i class="fa fa-music fa-stack-1x"></i>
                  <i class="fa fa-ban fa-stack-2x" style="color:red"></i>
              </span>
              </a></li>
            </ul>
          </div>
          
           <div class="kalsada">
                <img src="student_assets/kalsada.png" />
            </div>
            <div class="clouds">
                <img src="student_assets/cloudsun.svg" class="cloudsun">
                <img src="student_assets/cloudy.svg" class="cloud1">
                <img src="student_assets/cloud.svg" class="cloud2">
                <img src="student_assets/cloudy.svg" class="cloud3">
                <img src="student_assets/cloud.svg" class="cloud4">
                <img src="student_assets/cloudy.svg" class="cloud5">
                <img src="student_assets/cloud.svg" class="cloud6">
                <img src="student_assets/cloudy.svg" class="cloud7">
                <img src="student_assets/cloud.svg" class="cloud8">
            </div>
            
            <div clas="puno">
                <img src="student_assets/puno.png" class="puno1">
                <img src="student_assets/puno.png" class="puno2">
                <img src="student_assets/puno.png" class="puno3">
                <img src="student_assets/puno.png" class="puno4">
                <img src="student_assets/puno.png" class="puno5">
            </div>
            
            <div class="fence">
                
            </div>
            <div class="kubo" id="kubo">
                <a href="paaralan.php"><img src="student_assets/bahaykubo.png" class="animated pulse" class="kuboimg"/></a>
            </div>
            
            <div class="paaralan">
                <img src="student_assets/paaralan.png">
            </div>
            
            <div class="lumabas">
                <a href="index.php"><img src="student_assets/SIGN1.png"></a>
            </div>
           
           <div class="board">
                <a href="mgakwento.php"><img src="student_assets/board.png"></a>
           </div>
   

           <div class="goat3">
                <img src="student_assets/goat106.gif">
           </div>
            <div class="goat2">
                <img src="student_assets/goat107.gif">
           </div>
         
<!--<a class="modal-trigger waves-effect waves-light btn" href="#modal1" style="position:absolute;left:100px;top:600px">Credits</a>-->
<img src="student_assets/credits.gif" class="modal-trigger"  style="position:absolute;left:100px;top:300px;cursor:pointer" href="#modal1">
  <!-- Modal Structure -->

           
            
            
       </div>
    <audio src="student_assets/bg%20music.mp3" id="welcome" loop></audio>
     
   </section>
      <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
     <h5>Pasasalamat</h5>
        <h5><p>Ang Eye-Learn ay isang digital na programang pang-edukasyon na nagbibigay ng e learning na karanasan para sa batang edad 4 hanggang 5.Ang Eye-Learn ay naglalayong turuan ang mga mag-aaral sa nursery na may bagong paraan ng pag-aaral sa pamamagitan ng computer.Magturo at matuto ng mga aralin ng Alpabetong Filipino (ABaKaDa), halina't simulan ang masayang paglalakbay sa maagang edukasyon.
</br></br> Ang aming grupo ay nagpapasalamat sa youtube.com at google.com sa pagsuporta sa aming mga bidyos at larawan.</p></h5>
    </div>
    <div class="modal-footer">
      <a  class="modal-action modal-close waves-effect waves-green btn-flat ">OK</a>
    </div>
    </div>
    
  </div>
    
 <div id="modal2" class="modal modal-fixed-footer  green lighten-2" style="height:180px !important;border-radius:20px;" >
    <div class="modal-content" >
      
        <center> <h3>Kamusta <?php echo $user->first_name ?></h3></center>
    </div>
    <div class="modal-footer green">
      <a  class="modal-action modal-close waves-effect waves-green btn-flat "><span style="font-size:48px">OK</span></a>
    </div>
  </div>
</body>


</html>


<script>
     $('#modal2').openModal({
        starting_top: '10%', // Starting top style attribute
        ending_top: '20%',
     }
        
     );
    $('#kubo img').hover(
       
        function(){
            $('#kubo img').attr('src','student_assets/bahaykubohover.png');
        },
        function(){
            $('#kubo img').attr('src','student_assets/bahaykubo.png');
        }
    );
    
    $('.lumabas a img').hover(
        function(){
            $('.lumabas a img').attr('src','student_assets/SIGN2.png');
        },
        function(){
            $('.lumabas a img').attr('src','student_assets/SIGN1.png');
        }
    );
    
    $('.fa-cog').hover(
        function(){
            $('.fa-cog').addClass('fa-spin');
        },
        function(){
            $('.fa-cog').removeClass('fa-spin');
        }
    )
    
    $('.musicon').on('click', function(){
       $('.musicon').hide();
        $('.musicoff').show();
       document.getElementById('welcome').pause();
    });
    
    $('.musicoff').on('click', function(){
       $('.musicoff').hide();
        $('.musicon').show();
       document.getElementById('welcome').play();
    });
    
    $('')
    $('.modal-trigger').leanModal();
    document.getElementById('welcome').play();
</script>