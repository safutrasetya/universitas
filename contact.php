<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


    <title>ContactUs</title>
  </head>
  <body>
    <style>
 body{
    background: url("https://media.newyorker.com/photos/5c926fae4c50545726e44f85/master/pass/Lemann-College-Admissions.jpg") no-repeat center center;
  background-size: cover;
  color: rgb(195, 208, 209);;
}

.our-team{
  padding: 30px 0 40px;
  background: #fff;
  text-align: center;
  overflow: hidden;
  position: relative;
}

.our-team .pic{
  display: inline-block;
  width: 130px;
  height: 130px;
  margin-bottom: 50px;
  /*background:#ff00ac;*/
  position: relative;
  z-index: 1;
}

.our-team .pic:before
{
  content: "";
  width: 100%;
  background: #53c2b0;
  position: absolute;
  bottom: 135%;
  right: 0;
  left: 0;
  transform: scale(3);
  transition: all 0.3s linear 0s;
}

.our-team:hover .pic:before
{
  height: 100%;
}

.our-team .pic:after
{
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background: #53c2b0;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
}

.our-team .pic img{
  width: 100%;
  height: auto;
  border-radius: 50%;
  transform: scale(1);
  transition: all 0.9s ease 0s;
}

.our-team:hover .pic img
{
  box-shadow: 0 0 0 14px #53c2b0;
  transform: scale(0.7);
}

.our-team .team-content
{
  margin-bottom: 50px;
}

.our-team .title{
  font-size: 22px;
  font-weight: 700;
  color:#4e5052;
  letter-spacing: 1px;
  text-transform: capitalize;
  margin-bottom: 5px;
}

.our-team .post{
  display: block;
  font-size: 15px;
  color:#4e5052;
  text-transform: capitalize;
}

.our-team .social{
  width: 100%;
  padding:0;
  margin:0;
  background: #53c2b0;
  position: absolute;
  bottom: -100px;
  left:0;
  transition: all 0.5 ease 0s;
}

.our-team:hover .social{
  bottom:0;
}

.our-team .social li{
  display: inline-block;
}

.our-team .social li a{
  display: block;
  padding:10px;
  font-size: 17px;
  color:#fff;
  transition: all 0.3s ease 0s;
}

.our-team .social li a:hover{
  color:#53c2b0;
  background: #f7f5ec;
  text-decoration: none;

}

	</style>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Explore</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"   aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link " aria-current="page" href="index.php">Home</a>
              <a class="nav-link" href="about.php">About Us</a>
              <a class="nav-link active" href="contact.php">Contact Us</a>

            </div>
          </div>
        </div>
      </nav>
    <!--end navbar-->


    <!--our team-->
    <div class="container mt-5">
		<div class="row">
      <div class="col-md-1 col-sm">
      </div>
			<div class="col-md-3 col-sm">
				<div class="our-team">
					<div class="pic">
						<img src="img/rere.jpeg" alt="">
					</div>
					<div class="team-content">
						<h3 class="title">Retno Wulansari </h3>
						<span class="post">(201402024)</span>
					</div>
					<ul class="social">

						<li><a href="" class="fab fa-facebook-f"></a></li>
						<li><a href="" class="fab fa-instagram"></a></li>

					</ul>
				</div>
			</div>
			<div class="col-md-4 col-">
				<div class="our-team">
					<div class="pic">
						<img src="img/safutra.jpeg" alt="">
					</div>
					<div class="team-content">
						<h3 class="title">Safutra Setya Adinata </h3>
						<span class="post">(201402066)</span>
					</div>
					<ul class="social">

						<li><a href="" class="fab fa-facebook-f"></a></li>
						<li><a href="" class="fab fa-instagram"></a></li>

					</ul>
				</div>
			</div>
			<div class="col-md-3 col-sm">
				<div class="our-team">
					<div class="pic">
						<img src="img/fadil.jpeg" alt="">
					</div>
					<div class="team-content">
						<h3 class="title">M. Fadil Ramadhan</h3>
						<span class="post">(201402078)</span>
					</div>
					<ul class="social">

						<li><a href="" class="fab fa-facebook-f"></a></li>
						<li><a href="" class="fab fa-instagram"></a></li>

					</ul>
				</div>
			</div>
      <div class="col-md-1 col-sm">
      </div>
      </div>

      <div class="row mt-2 mb-2">
        <div class="col-sm-2">
        </div>
			<div class="col-sm-4">
				<div class="our-team">
					<div class="pic">
						<img src="img/pretty.jpeg" alt="">
					</div>
					<div class="team-content">
						<h3 class="title">Pretty Ohara Hutasoit</h3>
						<span class="post">(201402084)</span>
					</div>
					<ul class="social">

						<li><a href="" class="fab fa-facebook-f"></a></li>
						<li><a href="" class="fab fa-instagram"></a></li>

					</ul>
				</div>
			</div>
      <div class="col-sm-4">
        <div class="our-team">
          <div class="pic">
            <img src="img-4.jpg" alt="">
          </div>
          <div class="team-content">
            <h3 class="title">Marco Markus Mahulae</h3>
						<span class="post">(201402114)</span>
          </div>
          <ul class="social">

            <li><a href="" class="fab fa-facebook-f"></a></li>
            <li><a href="" class="fab fa-instagram"></a></li>

          </ul>
        </div>
      </div>
      <div class="col-sm-2">
      </div>
		</div>
	</div>


  <!--javascript bootsrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <!--javascript  bootsrap-->
  </body>
</html>
