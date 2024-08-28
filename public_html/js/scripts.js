$(document).ready(function() {

    // Initialize the datepicker for the schedule appointment form
    if ($("#date").length > 0) {
        $("#date").datepicker({
            dateFormat: "yy-mm-dd",
            minDate: 0 // Disable past dates
        });
    }

    // Infinite scroll for loading more blog posts
    let currentPage = 1;

    function loadMorePosts() {
        $.ajax({
            url: 'load_more_posts.php',
            type: 'GET',
            data: { page: currentPage },
            success: function(data) {
                if (data.trim() === '') {
                    $('#loadMore').text('No more posts to load').prop('disabled', true);
                } else {
                    $('.blog-posts').append(data);
                    currentPage++;
                }
            },
            error: function() {
                alert('Failed to load more posts.');
            }
        });
    }

    $('#loadMore').click(function() {
        loadMorePosts();
    });

    // Auto-submit file upload form when a file is selected
    $('.case-management .case-item input[type="file"]').on('change', function() {
        $(this).closest('form').submit();
    });

    // Smooth scroll to sections when clicking on navigation links
    $('.top-nav ul li a[href^="#"]').on('click', function(e) {
        e.preventDefault();

        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top - 50
        }, 500);
    });

});
