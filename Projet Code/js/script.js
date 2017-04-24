$(function() {
lancerbanniere();

function lancerbanniere(){

$( "#imgBan1" ).animate({
      opacity: 0,
      } , {
      duration : 1
      })
      $( "#imgBan2" ).animate({
      opacity: 0,
      } , {
      duration : 1
      })
      $( "#imgBan3" ).animate({
      opacity: 0,
      } , {
      duration : 1
      })
      

    //img1 + text1
    $( "#imgBan1" ).animate({
      opacity: 1,
      } , {
      duration : 3000
      })

      $( "#imgBan1" ).animate({
      opacity: 1,
      } , {
      duration : 1000
      })

      $( "#imgBan1" ).animate({
      opacity: 0,
      } , {
      duration : 3000
      })

    // disp de img1
    // laisse img2 a 0 pendant apparition et disp de img1
    $( "#imgBan2" ).animate({
      opacity: 0,
      } , {
      duration : 7000
      })

    //  img2
      $( "#imgBan2" ).animate({
      opacity: 1,
      } , {
      duration : 3000
      })

      $( "#imgBan2" ).animate({
      opacity: 1,
      } , {
      duration : 1000
      })

      $( "#imgBan2" ).animate({
      opacity: 0,
      } , {
      duration : 3000
      })

    // disp de img2 
    // laisse img3 a 0 pendant apparition et disp de img1, text1 et img2
    $( "#imgBan3" ).animate({
      opacity: 0,
      } , {
      duration : 14000
      })

    //  img3
      $( "#imgBan3" ).animate({
      opacity: 1,
      } , {
      duration : 3000
      })

      $( "#imgBan3" ).animate({
      opacity: 1,
      } , {
      duration : 1000
      })

       $( "#imgBan3" ).animate({
       opacity: 0
      }, {
        duration: 3000,
       
        complete: function() {
          lancerbanniere();
        }
      });
}
});