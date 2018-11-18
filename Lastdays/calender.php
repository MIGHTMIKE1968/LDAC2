<?php
// Set your timezone
date_default_timezone_set('US/Central');
// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}
// Check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}
// Today
$today = date('Y-m-j', time());
// For H3 title
$html_title = date('Y / m', $timestamp);
// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
// You can also use strtotime!
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));
// Number of days in the month
$day_count = date('t', $timestamp);
 
// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);
// Create Calendar!!
$weeks = array();
$week = '';
// Add empty cell
$week .= str_repeat('<td></td>', $str);
for ( $day = 1; $day <= $day_count; $day++, $str++) {
     
    $date = $ym . '-' . $day;
     
    if ($today == $date) {
        $week .= '<td class="today">' . $day;
    } else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';
     
    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {
        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }
        $weeks[] = '<tr>' . $week . '</tr>';
        // Prepare for new week
        $week = '';
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

    <link rel="stylesheet" type="text/css" href="css/cal.css">
        
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    
<title>Church Calender</title>
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
            		<li><a href="music.html">MUSIC</a></li>
            		<li><a href="sermons.html">SERMONS</a></li>
          		</ul>
        	</li>
            <li><a href="#">BOOKSTORE</a></li>
            <li><a href="calender.php">CALENDER</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="contactform.php"><i class="fa fa-envelope envelope" aria-hidden="true"></i> &nbsp;CONTACT &nbsp;US</a></li>
        </ul>       
    </div>
    </div>      
</nav>
    
<div class="container">
    
    <div>
		<div class="header">
            <img src="img/LDAChead.png" width="100%" height="auto" alt=""/>
        </div>
        
        <div class="row" id="art">
            
            <div>
                <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
                <table class="table table-bordered">
                <tr>
                <th>S</th>
                <th>M</th>
                <th>T</th>
                <th>W</th>
                <th>T</th>
                <th>F</th>
                <th>S</th>
                </tr>
            <?php
                foreach ($weeks as $week) {
                    echo $week;
                }
            ?>
                </table>
            </div>
            
         </div>
        
            <div>
                <h1 class="month">November 2018 - Schedule Of Events</h1>
                <h2>
                    <p>Thursday, November 22, 2018 - Thanksgiving Day Service @ 10:30AM</p>
                </h2>
            </div>
            
            <div class="social">
                <h1><a href="https://www.facebook.com/The-Last-Days-Apostolic-Church-176068399402095/?ref=aymt_homepage_panel"><img src="img/black fb logo.png" class="hvr-float" width="4%" height="4%" alt=""/></a>
    
                <a href="https://twitter.com"><img src="img/black twitter logo copy.png" class="hvr-float" width="4%" height="4%" alt=""/></a>

                <a href="https://www.youtube.com/channel/UCkjL2R8mL3Jy4GbHqkVj1rw?disable_polymer=true"><img src="img/black yt logo.png" class="hvr-float" width="4%" height="4%" alt=""/></a></h1>
            </div>
            
        </div>
    </div>
</div>
    
 <div class="container footer">
    <h5>© Copyright 2018, Last Days Apostolic Church. All Rights Reserved.</h5><br>
    <h6 class="sonic">Web Design by Sonicpress</h6><br>
</div>
    
</body>
</html>
