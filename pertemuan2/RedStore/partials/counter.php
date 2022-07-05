<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



<div class="counterbox">
        <div class="col">
            <div class="counter-box">
                <i class="fa fa-plane"></i>
                <h2 class="counter">215</h2>
                <h4>HOT DESTINATIONS</h4>
            </div>
        </div>
        <div class="col">
            <div class="counter-box">
                <i class="fa fa-users"></i>
                <h2 class="counter">101</h2>
                <h4>HAPPY CLIENTS</h4>
            </div>
        </div>
        <div class="col">
            <div class="counter-box">
                <i class="fa fa-coffee"></i>
                <h2 class="counter">205</h2>
                <h4>CUPS OF COFFEE</h4>
            </div>
        </div>
        <div class="col">
            <div class="counter-box">
                <i class="fa fa-globe"></i>
                <h2 class="counter">105</h2>
                <h4>VISITED COUNTRIES</h4>
            </div>
        </div>
    </div>

    

    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="jquery.counterup.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });

    </script>