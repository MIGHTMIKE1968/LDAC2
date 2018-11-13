<?php


if ($_POST['submit']) {
	
	if (!$_POST['name']) {
		$error="<br/>- Please enter your name";
	}
	
	if (!$_POST['email']) {
		$error.="<br/>- Please enter your email";
	}
	
	if (!$_POST['message']) {
		$error.="<br/>- Please enter a message";
	}
	
	if (!$_POST['check']) {
		$error.="<br/>- Please confirm you are human";
	}
	
	if ($error) {
		$results='<div class="alert alert-danger" role="alert"><strong>Sorry, there is an error.</strong> Please correct the following: '.$error.' </div';
	} else {
		mail("mike@mikesdreamosophy.com", "Contact message", "Name: ".$_POST['name'].
			"Email: ".$_POST['email'].
			"Message: ".$_POST['message']);
		{
		$results='<div class="alert alert-success" role="alert"><stron>Thank you! We will get back in touch with you shortly.</div>';	
		}
	}
}
		   

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
        
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="https://use.fontawesome.com/fb1c328b44.js"></script>

    <link rel="stylesheet" type="text/css" href="css/contact.css">
        
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    
<title>Contact Us</title>
</head>

<body>
    
 <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
    <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a href="index.html" class="navbar-brand"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
        </div>
    <div class="collapse navbar-collapse" id="bs-nav-demo">
         <ul class="nav navbar-nav">
            <li ><a href="about.html">ABOUT &nbsp;US</a></li>
            <li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MINISTERS<span class="caret"></span></a>
          		<ul class="dropdown-menu">
            		<li><a href="founder.html">OUR &nbsp;FOUNDER</a></li>
            		<li><a href="pastor.html">OUR &nbsp;PASTOR</a></li>
                    <li><a href="minboard.html">MINISTER'S &nbsp;BOARD</a></li>
          		</ul>
        	</li>
            <li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MUSIC &nbsp;AND &nbsp;SERMONS<span class="caret"></span></a>
          		<ul class="dropdown-menu">
            		<li><a href="#">MUSIC</a></li>
            		<li><a href="#">SERMONS</a></li>
          		</ul>
        	</li>
            <li><a href="#">BOOKSTORE</a></li>
            <li><a href="#">CALENDER</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="contactform.php"><i class="fa fa-envelope envelope" aria-hidden="true"></i> &nbsp;CONTACT &nbsp;US</a></li>
        </ul>       
    </div>
    </div>      
</nav>
    
<section id="contact">
		<div class="container">
            
            <div class="header">
                <img src="img/LDAChead.png" width="100%" height="auto" alt=""/>
            </div>
		
			<div class="row" id="art">
				
				<h1 class="welcome">Contact Form</h1>
				
				<div class="col-md-6 col-md-offset-3">
					
					<?php echo $results;?>
					
					
					<form method="post" role="form">
						
						<div class="form-group">
							<input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $_POST['name']; ?>">
						</div>
						
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $_POST['email']; ?>">
						</div>
						
						<div class="form-group">
							<textarea name="message" rows="8" class="form-control" placeholder="Message..."><?php echo $_POST['message']; ?></textarea>
						</div>
						
						<div class="checkbox">
							<label>
								<input type="checkbox" name="check"> I am human
							</label>
						</div>
						
						<div align="center">
							<input type="submit" name="submit" class="btn btn-default" value="send message"/>
						</div>
						
					</form>
						  
				</div>
                
                
                <div>
                    <h1 class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3118.3155882198375!2d-90.2357026846585!3d38.59560587961824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87d8b471fb6f4b8b%3A0x475cad330bac80de!2sLast+Days+Apostolic+Church!5e0!3m2!1sen!2sus!4v1467592735838" width="480" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </h1>
                </div>
                
                <div>
                    <h1>
                        <p>
                           3311 Pennsylvania Avenue<br>
                           Saint Louis, Missouri 63118<br>
                           Phone: 314.771.6310 • 314.776.8527<br>
                           Email: praise@theldachurch.com
                        </p>
                    </h1>
                </div>
                
			</div>
            
            
            <div class="social">
                <h1><a href="https://www.facebook.com/The-Last-Days-Apostolic-Church-176068399402095/?ref=aymt_homepage_panel"><img src="img/black fb logo.png" class="hvr-float" width="4%" height="4%" alt=""/></a>
    
                <a href="https://twitter.com"><img src="img/black twitter logo copy.png" class="hvr-float" width="4%" height="4%" alt=""/></a>

                <a href="https://www.youtube.com/channel/UCvOssxRwuzTPY3gQu5Cnsew"><img src="img/black yt logo.png" class="hvr-float" width="4%" height="4%" alt=""/></a></h1>
             </div>
		
		
		</div>
    
	</section>
            
    
 <div class="container footer">
    <h5>© Copyright 2018, Last Days Apostolic Church. All Rights Reserved.</h5><br>
    <h6 class="sonic">Web Design by Sonicpress</h6><br>
</div>
    
</body>
</html>
