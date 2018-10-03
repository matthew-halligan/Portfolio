<footer class="footer border-top-gray">
    <nav class="sociales">
        <ul>
            <li>
                <a href="http://facebook.com"><span> Facebook</span></a>
            </li>
            <li>
                <a href="http://twitter.com"><span> Twitter</span></a>
            </li>
            <li>
                <a href="http://youtube.com"><span> YouTube</span></a>
            </li>
            <li>
                <a href="http://instagram.com"><span> Instagram</span></a>
            </li>
            <li>
                <a href="http://pinterest.com"><span> Pinterest</span></a>
            </li>
        </ul>
    </nav>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script type="text/javascript">
    /* Open and close responsive menu */
    // A $( document ).ready() block.
    $( document ).ready(function() {
        console.log( "ready!" );
        $('.mobile-navbar-hamburger-container').click(function () {
            console.log('click');
            $('#mobile-navbar').toggleClass('active');
        });
    });


    var ms_slider_pictures_array = [];
    var ms_slider_index = 0;
    var ms_slider_max = 0;

    /* Open when someone clicks on the span element */

    /* Close when someone clicks on the "x" symbol inside the overlay */
    function closeNav() {
        $(".ms-this-is-the-ms-gallery-selected-item").removeClass('ms-this-is-the-ms-gallery-selected-item');
    }

    function increase_slider_selection(){
        console.log('ms slider index', ms_slider_index);
        if(ms_slider_index < ms_slider_max){
            ms_slider_index +=1;
            console.log('Ms slider index', ms_slider_index);
            $('.ms-this-is-the-ms-gallery-selected-item .oi-container img').attr('src', ms_slider_pictures_array[ms_slider_index]);
        } else {
            ms_slider_index = 0;
            $('.ms-this-is-the-ms-gallery-selected-item .oi-container img').attr('src', ms_slider_pictures_array[ms_slider_index]);
        }
    }

    function decrease_slider_selection(){
        if(ms_slider_index > 0){
            ms_slider_index -= 1;
            console.log('Ms slider index', ms_slider_index);
            $('.ms-this-is-the-ms-gallery-selected-item .oi-container img').attr('src', ms_slider_pictures_array[ms_slider_index]);
        } else {
            ms_slider_index = ms_slider_max;
            $('.ms-this-is-the-ms-gallery-selected-item .oi-container img').attr('src', ms_slider_pictures_array[ms_slider_index]);
        }
    }

    $('.ms-slider img').click(function () {
        ms_slider_pictures_array = []; // Reset the array
        console.log($(this).siblings('.ms-gallery-element'));
        var  gallery_image_sources = $(this).siblings('.ms-gallery-element');
        console.log(typeof (gallery_image_sources));
        $.each(gallery_image_sources, function (key, value) {
            console.log('Iterating: ' + value.getAttribute('data-gallery-image'));
            ms_slider_pictures_array.push(value.getAttribute('data-gallery-image'));

            console.log('ms slider array', ms_slider_pictures_array);
            console.log('ms slider max', ms_slider_max);
        });
        ms_slider_max = ms_slider_pictures_array.length - 1;
        ms_slider_index = 0;
        var gallery_popup = $(this).siblings('.overlay');
        gallery_popup.toggleClass('samuel');
        gallery_popup.toggleClass('ms-this-is-the-ms-gallery-selected-item');

        // Se the image source
        console.log('0 element', ms_slider_pictures_array[0]);
        $('.ms-this-is-the-ms-gallery-selected-item .oi-container img').attr('src', ms_slider_pictures_array[ms_slider_index]);
    });

    $('.oi-container .controls i.ms-prev').click(function () {
        console.log('Prev Arrow has been clicked');
        decrease_slider_selection();
    });

    $('.oi-container .controls i.ms-next').click(function () {
        console.log('Next arrow has been clicked');
        increase_slider_selection();
    });
</script>