<body>
	<div id='wrapper'>
		
		<div >
			<div id="bigPic">
				<img src="images/1.jpg" alt="" />
				<img src="images/2.jpg" alt="" />
				<img src="images/3.jpg" alt="" />
				<img src="images/4.jpg" alt="" />
				<img src="images/5.jpg" alt="" />
				<img src="images/6.jpg" alt="" />
				<img src="images/7.jpg" alt="" />
				<img src="images/8.jpg" alt="" />
				<img src="images/9.jpg" alt="" />
				<img src="images/10.jpg" alt="" />
			</div>
			
			
			<ul id="thumbs">
				<li class='active' rel='1'><img src="images/1_thumb.jpg" alt="" /></li>
				<li rel='2'><img src="images/3_thumb.jpg" alt="" /></li>
				<li rel='3'><img src="images/4_thumb.jpg" alt="" /></li>
				<li rel='4'><img src="images/5_thumb.jpg" alt="" /></li>
				<li rel='5'><img src="images/6_thumb.jpg" alt="" /></li>
				<li rel='6'><img src="images/7_thumb.jpg" alt="" /></li>
				<li rel='7'><img src="images/8_thumb.jpg" alt="" /></li>
				<li rel='8'><img src="images/9_thumb.jpg" alt="" /></li>
				<li rel='9'><img src="images/10_thumb.jpg" alt="" /></li>
				<li rel='10'><img src="images/2_thumb.jpg" alt="" /></li>
			</ul>
		
		</div>
		
	</div>
	
	</div>

	<script type="text/javascript">
	var currentImage;
    var currentIndex = -1;
    var interval;
    function showImage(index){
        if(index < $('#bigPic img').length){
        	var indexImage = $('#bigPic img')[index]
            if(currentImage){   
            	if(currentImage != indexImage ){
                    $(currentImage).css('z-index',2);
                    clearTimeout(myTimer);
                    $(currentImage).fadeOut(250, function() {
					    myTimer = setTimeout("showNext()", 3000);
					    $(this).css({'display':'none','z-index':1})
					});
                }
            }
            $(indexImage).css({'display':'block', 'opacity':1});
            currentImage = indexImage;
            currentIndex = index;
            $('#thumbs li').removeClass('active');
            $($('#thumbs li')[index]).addClass('active');
        }
    }
    
    function showNext(){
        var len = $('#bigPic img').length;
        var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
        showImage(next);
    }
    
    var myTimer;
    
    $(document).ready(function() {
	    myTimer = setTimeout("showNext()", 3000);
		showNext(); //loads first image
        $('#thumbs li').bind('click',function(e){
        	var count = $(this).attr('rel');
        	showImage(parseInt(count)-1);
        });
	});
    
	
	</script>	
</body>	
