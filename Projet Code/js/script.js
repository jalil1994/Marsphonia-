$(function() {
lancerbanniere();

function lancerbanniere(){

$( ".img1" ).animate({
      opacity: 0,
      } , {
      duration : 1
      })
      $( ".img2" ).animate({
      opacity: 0,
      } , {
      duration : 1
      })
      $( ".img3" ).animate({
      opacity: 0,
      } , {
      duration : 1
      })

    //img1 + text1
    $( ".img1" ).animate({
      opacity: 1,
      } , {
      duration : 3000
      })

      $( ".img1" ).animate({
      opacity: 1,
      } , {
      duration : 1000
      })

      $( ".img1" ).animate({
      opacity: 0,
      } , {
      duration : 3000
      })

    // disp de img1
    // laisse img2 a 0 pendant apparition et disp de img1
    $( ".img2" ).animate({
      opacity: 0,
      } , {
      duration : 7000
      })

    //  img2
      $( ".img2" ).animate({
      opacity: 1,
      } , {
      duration : 3000
      })

      $( ".img2" ).animate({
      opacity: 1,
      } , {
      duration : 1000
      })

      $( ".img2" ).animate({
      opacity: 0,
      } , {
      duration : 3000
      })

    // disp de img2 
    // laisse img3 a 0 pendant apparition et disp de img1, text1 et img2
    $( ".img3" ).animate({
      opacity: 0,
      } , {
      duration : 14000
      })

    //  img3
      $( ".img3" ).animate({
      opacity: 1,
      } , {
      duration : 3000
      })

      $( ".img3" ).animate({
      opacity: 1,
      } , {
      duration : 1000
      })

       $( ".img3" ).animate({
       opacity: 0
      }, {
        duration: 3000,
       
        complete: function() {
          lancerbanniere();
        }
      });
}
});