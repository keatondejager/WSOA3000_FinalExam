<?php 
define('TITLE', 'About | #WooliesWaterChallenge');
include("includes/header.php"); 
?>

<!-- A simply about page with information about the site -->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1">
            <div class="card" style="border-radius:0;">
                <div class="card-header bg-info">
                    <h2 class="card-title">About</h2>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8 col-md-10 col-sm-12">
                                <div class="card shadow-2 my-2" style="border-radius:0;">
                                    <div class="card-header">
                                        <h3 class="card-title">The Woolworths Water Challenge</h3>
                                    </div>
                                    <div class="card-body">
                                        <h5>What is <a class="text-info card-link font-weight-bold" href="https://twitter.com/hashtag/Woolieswaterchallenge" target="_blank">
                                            <i>#WooliesWaterChallenge?</i>
                                        </a></h5>
                                        <p class="card-text">The Woolies Water Challenge is a viral trend that has been going around since the 11th of March 2019.
                                        You can watch the video that started it all <a class="card-link text-info blockquote font-weight-bold" target="_blank" href="https://twitter.com/bab_Sinkila/status/1104871173903581184?ref_src=twsrc%5Etfw%7Ctwcamp%5Etweetembed%7Ctwterm%5E1104871173903581184&ref_url=https%3A%2F%2Fwww.thesouthafrican.com%2Foffbeat-news%2Fwatch-woolies-water-local-bras-larneys-video%2F">here.</a></p>
                                    </div>
                                </div>

                                <div class="card shadow-2 my-2" style="border-radius:0;">
                                    <div class="card-header">
                                        <h3 class="card-title">This Webpage</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>This webpage is my response to the #WooliesWaterChallenge trend. It is a mix of satirical commentary as well as an exploration into
                                            the concept of cyber-imperialism.
                                        </p>
                                        <p>The source code for this project is available on <a class="text-info font-weight-bold blockquote" href="https://github.com/keatondejager/WSOA3000_FinalExam">GitHub</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php 
    $about = TRUE;
    $profile = FALSE;
    include("includes/footer.php"); 
?>