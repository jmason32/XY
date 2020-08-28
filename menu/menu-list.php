<div class="menu-title">
    <span class="color-highlight">Check out our pages</span>
    <h1>Navigation</h1>
    <a href="#" class="menu-hide"><i class="fa fa-times"></i></a>
</div>
<div class="menu-page">
    <ul class="menu-list">
        <li id="menu-index">
            <a href='../index.php'>
                <i class='fa fa-home color-green-dark'></i>
                <span>Homepage</span>
                <em>This is where it all Begins</em>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>  
        <li id="menu-components">
            <a href="business/all.php">
                <i class='fa fa-cog color-yellow-dark'></i>
                <span>Da Businesses My Guy</span>
                <em>Just a Copy and Paste Away</em>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>   
        <li id="menu-pages">
            <a href="map/user-map.php">
                <i class='fa fa-heart color-red-dark'></i>
                <span>Issa a Map</span>
                <em>Easy to Customize and Use</em>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>    
        <li id="menu-media">
            <a href="media.html">
                <i class='fa fa-camera color-brown-light'></i>
                <span>Media</span>
                <em>Showcase your Projects with Style</em>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>      
        <li id="menu-contact">
            <form action="includes/logout.inc.php">
                <button type='submit'>
                    <i class='fa fa-envelope color-blue-dark'></i>
                    <span>Logout</span>
                    <em>Let's get in Touch or Just Say Hello</em>
                    <i class="fa fa-angle-right"></i>
</button>
            </form>

        </li>
    </ul>
</div>

<script type="text/javascript">
    $('#menu-hider, .close-menu, .menu-hide').on('click',function(){
        $('.menu-box').removeClass('menu-box-active');
        $('#menu-hider').removeClass('menu-hider-active');
        return false;
    });
</script>