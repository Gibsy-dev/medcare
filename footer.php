</div>

<div class="well" style="background:#587cca;text-align:center;color:white">
<p>Designed by Alloysius,Titus,Gibsy</p>
</div>
<script src="jquery-1.11.1.min.js"></script>  
  <script src="js/bootstrap.min.js"></script>  
  <script src="js/script.js"></script>  
  <script>
  $(document).ready(function(){
      $(".hover").hover(function(){
          //$(this).addClass('orange');
          $(this).css({"color":"#ca5860","background":"white"});
      },function(){
          //$(this).removeClass('orange');
          //$(this).removecss();
          $(this).css({"color":"black","background":""});
      });

      $('.dropdown').hover(function(){
          $('.dropdown-menu').show();
      },function(){
          $('.dropdown-menu').hide();
      });
      $('.unique').hover(function(){
        $(this).css({"color":"rgb(255, 88, 33)"});  
      },function(){
        $(this).css({"color":""}); 
      });


    

      
     
        
      });
      


      

 
 
    
  </script>
</body>



</html>