<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/homepage.js"></script>
    <title>SIY - HOSPITAL
    </title>
</head>

<!-- php -->
<?php
session_start();

if (isset($_SESSION['loged_email'])) {
    $val2 = $_SESSION['loged_email'];

}
//else if(!isset($_SESSION['loged_user'] ))
else {
    header("location:signuplogin.php");
}


if (isset($_GET['logout'])) {
    session_destroy();
    header("location:signuplogin.php");
}

?>

<?php
include('connection.php');
?>


<!-- appointment php -->
<?php
if (isset($_POST['appoint'])) {

    $depart = mysqli_real_escape_string($con, $_POST['dept']);
    $doc = mysqli_real_escape_string($con, $_POST['dct']);
    $name = mysqli_real_escape_string($con, $_POST['nameuser']);
    $email = mysqli_real_escape_string($con, $_POST['useremail']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);


    //now store this data into database
    $query = $con->prepare("INSERT INTO  appointment(department,doctor,userName,Useremail,Date,Time,Emailadded)values(?,?,?,?,?,?,?) ");
    $query->bind_param("sssssss", $depart, $doc, $name, $email, $date, $time, $val2);
    $query->execute();
    $query->close();
    header("location:appointment.php");
}
?>


<body>
    <!-- HEADER PART -->
    <header>
        <nav id="navbar">
            <div id="logo">
                <img src="images/logo.png" alt="">

            </div>
            <ul>

                <li class="item"><a href="#home">Home</a></li>
                <li class="item"><a href="#appointmentleft">Appointment</a></li>
                <li class="item"><a href="#services">Our Services</a></li>
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">More</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="profile.php">Profile</a>
                        <a href="appointment.php">View Appointments</a>
                        <a href="#doctor">Our Doctor</a>
                        <a href="#pricing">Pricing</a>
                        <a href="#aboutus">About Us</a>
                        <a href="#contactus">Contact Us</a>

                    </div>
                </div>

                <div style="position:absolute;top:27px;right:20px;padding:10px;border:red; ">
                    <form id="logout" method="get">
                        <button type="submit" name="logout"><i style="padding-right : 5px;" class="fa-solid fa-right-from-bracket"></i>Log
                            Out</button>
                    </form>
                </div>

            </ul>
        </nav>
    </header>

    <section id="home">

        <p id="h-primary">Welcome to SIY</p>
        <p id="homeintro">Best Hospital <br> In Your Town</p>
        <button class="btn">Appointment</button>
    </section>

    <!-- about us -->
    <section id="aboutus">
        <div id="left">
            <img src="images/about.jpg" alt="">
        </div>
        <div id="right">
            <p id="aboutheading">About Us</p>
            <p id="aboutintro">Best Medical Care For <br> Yourself and Your Family</p>
            <p id="text">Taking care of your health is of utmost importance in leading a fulfilling and vibrant life.
                One of the fundamental aspects of maintaining good health is adopting a balanced diet. Fueling your body
                with nutritious foods, such as fresh fruits, vegetables, whole grains, lean proteins, and healthy fats,
                provides the essential nutrients it needs to function optimally. Complementing a wholesome diet, regular
                exercise is vital for strengthening the body, enhancing cardiovascular health, and improving overall
                fitness. </p>

            <div id="container">
                <div>
                    <img src="images/1.png" id="logos">
                    <p id="abouttext">Qualified</p>
                    <p id="changeabouttext">Doctor</p>
                </div>
                <div>
                    <img src="images/3.png" id="logos">
                    <p id="abouttext">Emergency</p>
                    <p id="changeabouttext">Services</p>
                </div>
                <div>
                    <img src="images/4.png" id="logos">
                    <p id="abouttext">Accurate</p>
                    <p id="changeabouttext">Testing</p>
                </div>
                <div>
                    <img src="images/2.png" id="logos">
                    <p id="abouttext">Free</p>
                    <p id="changeabouttext">Ambulance</p>
                </div> <span></span>
            </div>


        </div>
    </section>


    <!-- services -->
    <section id="services">
        <p id="serviceheading">Our Services</p>
        <p id="serviceheading2">Excellent Medical <br> Services</p>
        <div class="container2">
            <div class="ser">
                <img src="images/catroon1.jpg" alt="">
                <h2 class="h-secondary center" style="color: rgb(17, 13, 59);">Emergency Care</h2>
                <p class="center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem, culpa suscipit error
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
            </div>
            <div class="ser">
                <img src="images/emergency2.png" alt="">
                <h2 class="h-secondary center" style="color: rgb(17, 13, 59);">Operation & Surgery</h2>
                <p class="center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem, culpa suscipit error
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
            </div>
            <div class="ser">
                <img src="images/cartoon2.webp" alt="">
                <h2 class="h-secondary center" style="color: rgb(17, 13, 59);">Outdoor Checkup</h2>
                <p class="center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem, culpa suscipit error
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
            </div>
            <div class="ser">
                <img src="images/cartoon3.png" alt="">
                <h2 class="h-secondary center" style="color: rgb(17, 13, 59);">Ambulance Service</h2>
                <p class="center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem, culpa suscipit error
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
            </div>
            <div class="ser">
                <img src="images/cartoon4.avif" alt="">
                <h2 class="h-secondary center" style="color: rgb(17, 13, 59);">Medicine & Pharmacy</h2>
                <p class="center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem, culpa suscipit error
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
            </div>
            <div class="ser">
                <img src="images/cartoon5.webp" alt="">
                <h2 class="h-secondary center" style="color: rgb(17, 13, 59);">Blood Testing</h2>
                <p class="center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem, culpa suscipit error
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
            </div>
        </div>
    </section>


    <!-- Appointment -->
    <section class="appointment">
        <div id="appointmentleft">
            <p id="aapointmentheading">APPOINTMENT</p>
            <p id="aapointmentheading2">Make An Appointment</p>
            <p id="text2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure inventore officia enim illo
                nobis omnis! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo eum ad tempore
                voluptatum laborum vitae quasi reiciendis qui quo odio.
            </p>
        </div>
        <div id="appointmentright">
            <p id="aapointmentheading2">Make An Appointment</p>
            <form action="index.php" method="post">
                <?php
                if (isset($_GET['success'])) { ?>
                    <p class="success">
                        <?php echo $_GET['success']; ?>
                    </p>
                <?php }
                ?>
                <select name="dept" id="" aria-placeholder="Choose Department" required>
                    <option value="Dental Department">Dental Department</option>
                    <option value="Cardiology Department">Cardiology Department</option>
                    <option value="Neurology Department">Neurology Department</option>
                    <option value="Dermatology Department">Dermatology Department</option>
                    <option value="General Surgery">General Surgery</option>
                </select>
                <select name="dct" id="" required>
                    <option value="Dr. Iqra">Dr. Iqra </option>
                    <option value="Dr. Yashfa">Dr. Yashfa</option>
                    <option value="Dr. Shahab">Dr. Shahab</option>
                    <option value="Dr. Asim">Dr. Asim</option>
                </select>

                <input type="text" name="nameuser" required placeholder="Name">
                <input type="email" name="useremail" required placeholder="Enter Email">

                <input type="date" name="date" placeholder="Select Date" required>
                <input type="number" name="time" placeholder="Enter Contact No" required>

                <button id="appointmentbtn" name="appoint">Make an Appointment</button>
            </form>

        </div>
    </section>


    <!-- pricing -->
    <section id="pricing">
        <p id="priceheading">MEDICAL PACKAGE</p>
        <p id="priceheading2">Awesome Medical <br> Programs</p>
        <div class="container2">
            <div class="pricingdiv">
                <img src="images/price-1.jpg" alt="">
                <h2 class="h-secondary center" style="color: rgb(17, 13, 59);">Pregnancy Care</h2>
                <p class="center">Medical Treatment <br> Highly Experience Doctors <br> Highest Success Rate <br>
                    Telephone Service</p>
                <p id="pricetag">Price 20000/-</p>
            </div>
            <div class="pricingdiv">
                <img src="images/price-2.jpg" alt="">
                <h2 class="h-secondary center" style="color: rgb(17, 13, 59);">Operation & Surgery</h2>
                <p class="center">Medical Treatment <br> Highly Experience Doctors <br> Highest Success Rate <br>
                    Telephone Service</p>
                <p id="pricetag">Price 50000/-</p>
            </div>
            <div class="pricingdiv">
                <img src="images/price-3.jpg" alt="">
                <h2 class="h-secondary center" style="color: rgb(17, 13, 59);">Health Checkup</h2>
                <p class="center">Medical Treatment <br> Highly Experience Doctors <br> Highest Success Rate <br>
                    Telephone Service</p>
                <p id="pricetag">Price 100000/-</p>
            </div>
        </div>
    </section>


    <!-- doctor -->
    <section id="doctor">
        <p id="doctorheading">OUR DOCTORS</p>
        <p id="doctorheading2">Qualified Healthcare <br>Professionals</p>
        <div class="slider">
            <div class="slider__inner">
                <div class="slider__content">
                    <div class="slider__card">
                        <div class="card__inner">
                            <img src="images/team-1.jpg" alt="Anotha One!">
                            <div class="card__content">
                                <h3 id="doctorname">Dr Shahabaz Khan</h3>
                                <p id="speciality"> <i> Dentist </i></p>
                                <p style="text-align: center;">Orthodontics <br> Orthodontics <br> Orthodontics <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="slider__card">
                        <div class="card__inner">
                            <img src="images/team-2.jpg" alt="Anotha One!">
                            <div class="card__content">
                                <h3 id="doctorname">Dr Shahabaz Khan</h3>
                                <p id="speciality"> <i> Dentist </i></p>
                                <p style="text-align: center;">Orthodontics <br> Orthodontics <br> Orthodontics <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="slider__card">
                        <div class="card__inner">
                            <img src="images/team-3.jpg" alt="Anotha One!">
                            <div class="card__content">
                                <h3 id="doctorname">Dr Shahabaz Khan</h3>
                                <p id="speciality"> <i> Dentist </i></p>
                                <p style="text-align: center;">Orthodontics <br> Orthodontics <br> Orthodontics <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="slider__card">
                        <div class="card__inner">
                            <img src="images/team4.avif" alt="Anotha One!">
                            <div class="card__content">
                                <h3 id="doctorname">Dr Shahabaz Khan</h3>
                                <p id="speciality"> <i> Dentist </i></p>
                                <p style="text-align: center;">Orthodontics <br> Orthodontics <br> Orthodontics <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="slider__card">
                        <div class="card__inner">
                            <img src="images/team5.avif" alt="Anotha One!">
                            <div class="card__content">
                                <h3 id="doctorname">Dr Shahabaz Khan</h3>
                                <p id="speciality"> <i> Dentist </i></p>
                                <p style="text-align: center;">Orthodontics <br> Orthodontics <br> Orthodontics <br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider__scroll">
                    <div class="slider__scroll-bar"></div>
                </div>
            </div>
    </section>


    <!-- footer -->
    <footer>
        <section id="contactus">
            <div class="about">
                <h1>Keep in Touch</h1>
                <p>You can Keep in touch with us</p>
                <i class="fa-solid fa-phone-volume">&nbsp;&nbsp;+92 312 8591374</i><br><br>
                <i class="fa-solid fa-envelope">&nbsp;&nbsp;mshahabaliyousaf@gmail.com</i><br><br>
                <i class="fa-solid fa-location-dot">&nbsp;&nbsp;i-14 islamabad</i>
            </div>
            <div class="gallery">
                <h1>Follow Us</h1>
                <ul>
                    <i class="fa-brands fa-facebook">&nbsp;&nbsp;Facebook</i><br><br>
                    <i class="fa-brands fa-instagram">&nbsp;&nbsp;Instagram</i><br><br>
                    <i class="fa-brands fa-twitter">&nbsp;&nbsp;Twitter</i><br><br>
                    <i class="fa-brands fa-linkedin">&nbsp;&nbsp;linkedin</i>
                </ul>
            </div>
            <div class="main">
                <h1>Main Link</h1>
                <ul>
                    <li>Home</li>
                    <li>Appointment</li>
                    <li>Our Doctor</li>
                    <li>About Us</li>
                </ul>
                <br><br><br><br>

            </div>

            <p style="margin-left: 500px;">2023 All Right Reserved</p>
        </section>
    </footer>
</body>

</html>