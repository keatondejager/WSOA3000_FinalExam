    <!-- End of Content -->
    <footer class="footer mt-auto py-0 fixed-bottom">
        <div class="container bg-inverse">
            <span class="text-muted">
                Made by Keaton de Jager, Student Number: 1636214 <br>
                <div>Icons made by <a href="https://www.flaticon.com/authors/gregor-cresnar" title="Gregor Cresnar" target="_blank">Gregor Cresnar</a> from 
                    <a href="https://www.flaticon.com/" title="Flaticon" target="_blank">www.flaticon.com</a> 
                    is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
                </div>

            </span>
        </div>
    </footer>
    

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
    crossorigin="anonymous"></script>

<?php   
        if ($about) {
            print("<script src=\"js/about_page.js\"></script>");
        } elseif ($profile) {
            print("<script src=\"js/profile_page.js\"></script>");
        }
?>

</html>