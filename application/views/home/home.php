<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CMU JS</title>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/home/styles.css" rel="stylesheet" />
    <style>
        .bg-green {
            background-color: #e6b400 !important;
        }
        .navbar {
        margin: 0 auto;
        }
        .text-yellow {
            color: yellow !important;
        }
        .image-container {
            position: relative;
            width: 100%;
            height: 320px; /* Full viewport height */
            overflow: hidden; /* Ensure image covers the container */
        }
        #articleImage {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.5s ease-in-out; /* Adjust the duration and timing function */
            margin-top: 0; /* Remove top margin */
        }

        .article-title:hover {
    text-decoration: underline;
    text-decoration-color: yellow;
}

    </style>
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-green" style="max-width: 80%;">
            <div class="container px-5">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="images/cmujournallogo.png"  style="width: 150px; height: 40px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"  style="margin-left:350px;">
                    <li class="nav-item"><a class="nav-link px-lg-4 py-3 py-lg-4" href="<?php echo base_url(); ?>" style="font-size: 16px; color:green;">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-4 py-3 py-lg-4" href="<?php echo base_url('home/about'); ?>" style="font-size: 16px; color:green;">About</a></li>
                
                
                    <li class="nav-item dropdown" style="margin-top:16px;">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 16px; color:green;">Users</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio bg-green" >
                                <li><a class="dropdown-item" style="font-size: 16px; color:green;" href="login">Login</a></li>
                                <li><a class="dropdown-item" style="font-size: 16px; color:green;"href="signup">Register</a></li>
                            </ul>
                        </li>
                
                
                </ul>

            </div>

        </div>
    </nav>

    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center image-container">
    <img class="rounded-3 my-5" src="assets/img/cmu.jpg" alt="..." id="articleImage" style="width: 80%; height: 300px;" />
</div>

    <script>
        var images = ["assets/img/cmu.jpg", "assets/img/cmuv2.jpg", "assets/img/cmuv3.jpg"];
        var currentIndex = 0;
        var imageElement = document.getElementById("articleImage");

        function moveToNextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            fadeOutAndChangeSrc(imageElement, images[currentIndex]);
        }

        function fadeOutAndChangeSrc(element, newSrc) {
            element.style.opacity = 0;
            setTimeout(function () {
                element.src = newSrc;
                fadeIn(element);
            }, 500); // Adjust the duration of the fade out effect
        }

        function fadeIn(element) {
            var opacity = 0;
            var timer = setInterval(function () {
                if (opacity >= 1) {
                    clearInterval(timer);
                }
                element.style.opacity = opacity;
                opacity += 0.1;
            }, 50); // Adjust the duration and steps of the fade in effect
        }

        setInterval(moveToNextImage, 5000);

        function resizeImage(width, height) {
            imageElement.style.width = width + 'px';
            imageElement.style.height = height + 'px';
        }
    </script>


    <!-- Page Header-->
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading text-center">
  
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5" style="margin-top:110px;">
    <div class="row gx-4 gx-lg-5 justify-content-center">
    <?php foreach ($articleData as $article): ?>
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100">
            <a href="<?php echo site_url('home/post/'.$article->slug); ?>" class="text-decoration-none">
                <div class="card-body">
                    <h2 class="card-title" style="font-size: 22px;"><?php echo $article->title; ?></h2>
                    <p class="card-text" style="font-size: 14px; margin-top:10px;"><strong>Volume:</strong> <?php echo $article->vol_name; ?></p>
                    <p class="card-text" style="font-size: 14px; margin-top:-20px;"><?php echo $article->doi; ?></p>
                    <p class="card-text" style="font-size: 14px; margin-top:-20px;"><strong>Keywords:</strong> <?php echo $article->keywords; ?></p>
                    <p class="card-text" style="font-size: 14px; margin-top:-20px;"><?php echo isset($article->abstract) && strlen($article->abstract) > 40 ? substr($article->abstract, 0, 40) . '...' : $article->abstract; ?></p>
                </div>
            </a>
            <div class="card-body">
                <p class="card-text" style="font-size: 14px; margin-top:10px;">
                    <strong>File:</strong> 
                    <a href="<?php echo site_url('/files/'.$article->filename); ?>" class="text-decoration-none">View</a>
                </p>
            </div>
            <div class="card-footer">
                <p class="post-meta" style="font-size: 14px; margin-top:10px;">
                    Author: <a href="#!"><?php echo $article->author_name; ?></a><br>
                    <small>Published On: <?php echo date('F d, Y', strtotime($article->created_at)); ?></small>
                </p>
            </div>
        </div>
    </div>
<?php endforeach; ?>

    </div>
</div>
    <!-- Footer-->
    <footer class="border-top" style="background-color: #F1F2CD;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                </div>
            </div>
        </div>
    </footer>

    
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
</body>
</html>
