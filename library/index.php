<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vishal Portfillio</title>
    <link rel="stylesheet" href="vishal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color:  rgba(90, 128, 90, 0.991);
    color: white;
}

nav {
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 80px;
    background-color: gray;
}

p{
  font-size:2rem;   
}
nav ul {
    display: flex;
    justify-content: center;
}

nav ul li {
    list-style: none;
    margin: 20px;
}

nav ul li a {
    text-decoration: none;
    color: white;
}

a:hover {
    text-decoration: none;
    color: rgb(243, 11, 141);
    font-size: 1.4rem;
}

.left {
    font-size: 2rem;
}
.firstsection {
    display: flex;
    justify-content: space-around;
    margin: 80px 0;
}

.leftsection {
    /* background-color: red; */
    width: 40%;
    font-size: 50px;
}

.rightsection {
    /* background-color: red; */
    width: 30%;
}

.img {
    width: 70%;
}

#element {
    color: red;
}

.text-gray {
    color: rgb(208, 188, 188);
}

.secondsection {
    max-width: 80vw;
    margin: auto;
    height: 80vh;
}

hr {
    border: 0;
    height: 1.2px;
    background-color: rgb(53, 53, 240);
    margin: 40px 84px;
}

.secondsection h1 {
    font-size: 1.9rem;
}

.box {
    background-color: white;
    width: 77vw;
    height: 2px;
    margin: 60px 0px;
    display: flex;
}

.vertical {
    height: 90px;
    width: 2px;
    background-color: white;
    margin: 0 150px;
}

.image-top {
    width: 23px;
    position: relative;
    top: -32px;
    left: -9px;
}

.vertical-title {
    position: relative;
    top: 75px;
}

.vertical-desc {
    position: relative;
    top: 86px;
    color: grey;
    font-size: 9px;
}

footer {
    background-color: rgb(8, 8, 38);
    /* height: 233px; */
}

.footer {
    display: flex;
    padding: 23px 122px;
    justify-content: space-between;
}

.footer ul {
    list-style: none;
}

.footer>div {
    width: 123px;
}

.footer-rights {
    color: grey;
    text-align: center;
    font-size: 30px;
    padding: 12px 0;
}

.btn {
    height: 2rem;
    background: transparent;
    color: white;
}

    </style>
</head>

<body>
    <header>
        <nav>
            <div class="left">Tanmay Library</div>
            <div class="right">
                <ul>
                    <a href="#home">
                        <li>Home</li>
                    </a>
                    <a href="#about">
                        <li>About</li>
                    </a>
                    <a href="#service" onclick="Login()">
                        <li>Services</li>
                    </a>
                    <a href="form.php">
                        <li>Form Fill Up</li>
                    </a>
                    <a href="Studentpennal.php">
                        <li>Record Student</li>
                    </a>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <section class="firstsection">
            <div class="leftsection">
                <h1>Tanmay Library</h1>
                <p>Library opening on 5th Auguest <br>It Is In Siddarth Nagar</p>
                <span id="element"></span>
            </div>
            <div class="rightsection">
                <img class="img" src="library.jpg">
            </div>
        </section>
        <hr>
        <section class="secondsection">
            <h1>All Services</h1>
            <p>1.Open 6.00AM To 10.00PM <br>
              2.Fully AC
              <br>
              3.Separate Cabin And Comfortable  <br> 
                chairs
                <br>
              4.Daily Newspaper
              <br>
              5.RO Cold Water 
              <br>
              6.Peaceful Atmosphere
              <br>
              7.CCTV Surveillance
              <br>
              8.Flexible Shifts
          </p>
           
        </section>
    </main>
    <footer>
        <div class="footer">
            <div class="footer-first">
                <h3>Tanmay's Library</h3>
            </div>
            <div class="footer-second">
                <ul>
                    <li>Home</li>
                    <li>About</li>
                    <li>Services</li>
                    <li>Form Fill Up</li>
                </ul>

            </div>
            

        </div>
        <div class="footer-rights">
            Tanmaylibrary.com || All Rights Reserved
        </div>
    </footer>

</div>
</body>

<script  src="js.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>