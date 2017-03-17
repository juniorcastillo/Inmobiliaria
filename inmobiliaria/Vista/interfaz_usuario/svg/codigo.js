
	
	window.onload =  function(){
		var status = false;
		var s = Snap("#svg");
		Snap.load("svg/casa.svg", function(f){
			puerta = f.select("#puerta");
			
			g = f.select("g");
            
            
			  g.hover(function() { 
                        
                          puerta.animate({
                             
                           opacity:0
                              
                           
                          }, 1000, mina.elastic); 
                        
                     
                    }, function() { 
                          
                        puerta.animate({
                          
                          opacity:9
                              
       
                        },1000, mina.elastic); 
                        
                  } 
                    );
				//esta función es lo que hace cuando sale del hover
				/*function(){				
					blanco.animate({height: 122.08836, width:145.91048,y:818.11139,
         			x:104.71805}, 1000, mina.elastic);*/
			
				s.append(g);
				g.drag();
		});
	}
