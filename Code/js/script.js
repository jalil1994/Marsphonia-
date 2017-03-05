	

	function anim(idImg,idIco) {


		
		$('#img1, #img2, #img3, #img4, #img5, #img6, #img7, #img8, #img9, #img10, #img11, #img12, #img13, #img14, #img15, #img16, #img17, #img18, #img19, #img20').hide();
		$('#ico1, #ico2, #ico3, #ico4, #ico5, #ico6, #ico7, #ico8, #ico9, #ico10, #ico11, #ico12, #ico13, #ico14, #ico15, #ico16, #ico17, #ico18, #ico19, #ico20').css('border', 'none');

		$('#'+idImg).show();

		$('#'+idIco).css('border', '4px solid rgba(117, 117, 117, 0.6)');

		$('#'+idImg).animate({
					opacity : 1 ,	
				} , {
					duration : 1000
				});

		$('#'+idImg).delay(1000).animate({
					opacity : 0 ,
				} , {
					duration : 1000
				});

		setTimeout(function(){ $('#'+idIco).css('border', 'none');  }, 2800);


		console.log("Id ico " +idIco);
	}


function auto(){

		anim("img1","ico1");


		var i = 2;
		setInterval(function lancanim(){

				if(i < 21){
					anim("img"+i,"ico"+i);
					i++;
				} else {
					i = 1;
				}

		}, 2800);
		};
	$(function(){

		auto();

		

	});

