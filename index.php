<?php

//
include 'libraries/functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- /*__*| Linking my css and javascript |*__*/ -->
    <link rel="stylesheet" href="style.css">
    <script defer src ="script.js" ></script>

     <!-- /*__*| Linking fontawesome library |*__*/ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Server-Sent Events</title>

</head>

<body>

<header>
    <div>
        <a href="#" class="logo"><img src ="images/clogo.png" width=60px height=60px></a>
        <nav>
            <ul>
            <div id="currentTime">
            <p>Current Time</p>
        </div>
            </ul>
        </nav>

    </div>
</header>

<video playsinline autoplay muted loop>
    <source src="images/earthVideo.mp4" type="video/mp4" preload="auto" autoplay muted aria-label="earth rotating">
</video>

<main>

    <section>
        <aside>

        
            <h2>Current World Population</h2>
            <h1><div id="result_m"><?php echo current_population(); ?> </div></h1>
        </aside>

        <div class="populationData">

            <div>

                <h3>Current Male Population</h3>
                <h4><div id="result_a"><?php echo current_malePopulation(); ?> </div></h4>

            </div>

            <div>

                <h3>Current Female Population</h3>
                <h4><div id="result_b"><?php echo current_femalePopulation(); ?> </div></h4>


            </div>

        </div>

        <div class="populationData">

            <div>

                <h3>Births Today</h3>
                <h4><div id="result_c"><?php echo current_births(); ?> </div></h4>

            </div>

            <div>

                <h3>Deaths Today</h3>
                <h4><div id="result_d"><?php echo current_deaths(); ?> </div></h4>


            </div>

        </div>




    </section>
</main>

<footer>
    <p> &copy; 2023 Camille Pacamalan</p>
</footer>

    
</body>
</html>