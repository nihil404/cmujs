<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CMU JS</title>
        <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/cmujus.png')?>" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="    " rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url ('css/home/styles.css" rel="stylesheet')?>" />
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
        <!-- Your existing navigation bar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-green" style="max-width: 80%;">
            <div class="container px-5">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">CMU JS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Your existing menu items -->
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url(); ?>" style="font-size: 16px; color:green;">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/about'); ?>"style="font-size: 16px; color:green;">About</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/articles'); ?>" style="font-size: 16px; color:green;">Articles</a></li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Separate "Login" and "Register" links -->
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('registration/login'); ?>" style="font-size: 16px; color:green;">Login</a></li>
                <br> <!-- Add <br> tag here -->
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('registration/signup'); ?>"style="font-size: 16px; color:green;">Register</a></li>
            </ul>
        </div>
    </div>
</nav>

 <!-- Page Header-->
        
  
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php foreach($articleData as $article) : ?>
                    <div class="post-heading">
                        <h1><?php echo $article->title; ?></h1>
                        <p><strong>Volume:</strong> <?php echo $article->vol_name; ?></p>
                <p><?php echo $article->doi; ?></p>
                <p><strong>Keywords:</strong> <?php echo $article->keywords; ?></p>
                        <span class="meta">
                            Author: <small><a href="#!"><?php echo $article->author_name; ?></a> Published on: <?php echo date('F d, Y', strtotime($article->created_at)); ?></small>
                        </span>
                        <p class="card-text" style="font-size: 14px; margin-top:10px;">
                    <strong>File:</strong> 
                    <a href="<?php echo site_url('/files/'.$article->filename); ?>" class="text-decoration-none">View</a>
                </p>
                    </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p><?php echo $article->abstract; ?></p>
              
                <form onsubmit="return confirmDelete(<?php echo $article->articleid; ?>)">
                
                </form>
                <br>
            
            </div>
        </div>
    </div>
</article>
<?php endforeach; ?>




                    </div>
                </div>
            </div>
        </article>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; CMU JS</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url('js/scripts.js')?>"></script>>
    </body>
</html>
