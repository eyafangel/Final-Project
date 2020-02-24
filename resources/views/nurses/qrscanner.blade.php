<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <style>
            #qr-canvas{
		display:none;
	}

	#outdiv{
		width:240px;
		height:240px;
	}

	#v{
		width:240px;
		height:240px;
	}

	@media screen and (max-width: 480px){
		
		#outdiv{
			width:190px;
			height:190px;
		}
		
	    #v{
			width:190px;
			height:190px;
		}
		
		@media screen and (max-device-width: 480px) 
	              and (orientation:portrait){
	  
			#outdiv{
				width:270px;
				height:270px;

			}
			
		    #v{
				width:270px;
				height:270px;
			}
		
		}

    }
	</style>
	
        <script type = "text/javascript" src='{{asset('js/llqrcode.js')}}'></script> 
		<script type = "text/javascript" src='{{asset('js/main.js')}}'></script>
		 
             

        <div style="display:none" id="result"></div>
	    <div class="selector" id="webcamimg" onclick="setwebcam()" align="left"></div>
		<div class="selector" id="qrimg" onclick="setimg()" align="right" ></div>
			<center id="mainbody"><div id="outdiv"></div></center>
				<canvas id="qr-canvas" width="800" height="600"></canvas>

      
				<script type="text/javascript">load();</script>
				<script type = "text/javascript" src='{{asset('js/jquery.min.js')}}'></script>
    </body>
    
     </html>