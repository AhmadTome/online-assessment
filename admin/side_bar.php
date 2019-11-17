<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
    <!-- Avatar image in top left corner -->
    <a href="add_lecturer.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
        <i class="fa fa-user w3-xxlarge"></i>
        <p>Add Lecturers</p>
    </a>
    <a href="add_student.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
        <i class="fa fa-user w3-xxlarge"></i>
        <p>Add Students</p>
    </a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black" onclick="document.location.href = '../helper/kill_session.php';">
        <i class="fa fa-sign-out w3-xxlarge"></i>
        <p>Logout</p>
    </a>

</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
    <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
        <a href="add_lecturer.php" class="w3-bar-item w3-button" style="width:25% !important">Add Lecturers</a>
        <a href="add_student.php" class="w3-bar-item w3-button" style="width:25% !important">Add Students</a>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
