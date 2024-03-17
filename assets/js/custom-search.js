jQuery(document).ready(function($) {
    function performSearch() {
        var formData = $('#search-form').serialize();

        $.ajax({
            type: 'POST',
            url: customSearchAjax.ajaxurl,
            data: {
                action: 'custom_search',
                search_query: $('#search-input').val(),
                practice_area: $('#practice_area').val(),
                industry_team: $('#industry_team').val(),
                market_focus: $('#market_focus').val(),
                office: $('#office').val(),
                title: $('#title').val(),
                select_letter: $('#select_letter').val(),
            },
            beforeSend: function() {
                $("#attorney-loader").find('img').removeClass('d-none');
            },
            success: function(response) {
                // Replace the search results container with the new results
                $('#search-results').html(response);
                $("#attorney-loader").find('img').addClass('d-none');
                $("#search-results .col-12").slice(0, 9).show();
                $(".load-more").css('visibility', 'visible');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle error
            },
            complete: function() {
                // Hide loading spinner or any loading indication
            }
        });
    }

    // Trigger search on page load
    performSearch();

    // Bind the search form submission to perform AJAX search
    $('#search-form').on('submit', function(e) {
        e.preventDefault();
        performSearch();
    });
    $('#search-form select').on('change', function() {
        // Check if the selected option is not empty
        if ($(this).val() !== '') {
          // Call your function here
          performSearch();
        }
    });

    function SearchNews() {
        var formData = $('#news-form').serialize();

        $.ajax({
            type: 'POST',
            url: customSearchAjax.ajaxurl,
            data: {
                action: 'news_search',
                search_query: $('#search-input').val(),
                practice_area: $('#practice_area').val(),
                industry_team: $('#industry_team').val(),
                market_focus: $('#market_focus').val(),
                office: $('#office').val(),
                news_types: $('#news_types').val(),
            },
            beforeSend: function() {
                $("#news-loader").find('img').removeClass('d-none');
            },
            success: function(response) {
                // Replace the search results container with the new results
                $('#news-results').html(response);
                $("#news-loader").find('img').addClass('d-none');
                $("#news-results .col-12").slice(0, 9).show();
                $(".load-more").css('visibility', 'visible');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle error
            },
            complete: function() {
                // Hide loading spinner or any loading indication
            }
        });
    }
    SearchNews();
    $('#news-form').on('submit', function(e) {
        e.preventDefault();
        SearchNews();
    });
    $('#news-form select').on('change', function() {
        // Check if the selected option is not empty
        if ($(this).val() !== '') {
          // Call your function here
          SearchNews();
        }
    });

    function SearchArticle() {
        var formData = $('#article-form').serialize();

        $.ajax({
            type: 'POST',
            url: customSearchAjax.ajaxurl,
            data: {
                action: 'article_search',
                search_query: $('#search-input').val(),
                practice_area: $('#practice_area').val(),
                industry_team: $('#industry_team').val(),
                market_focus: $('#market_focus').val(),
            },
            beforeSend: function() {
                $("#article-loader").find('img').removeClass('d-none');
            },
            success: function(response) {
                // Replace the search results container with the new results
                $('#article-results').html(response);
                $("#article-loader").find('img').addClass('d-none');
                $("#article-results .col-12").slice(0, 9).show();
                $(".load-more").css('visibility', 'visible');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle error
            },
            complete: function() {
                // Hide loading spinner or any loading indication
            }
        });
    }
    SearchArticle();
    $('#article-form').on('submit', function(e) {
        e.preventDefault();
        SearchArticle();
    });
    $('#article-form select').on('change', function() {
        // Check if the selected option is not empty
        if ($(this).val() !== '') {
          // Call your function here
          SearchArticle();
        }
    });

    function VideoNews() {
        var formData = $('#video-form').serialize();

        $.ajax({
            type: 'POST',
            url: customSearchAjax.ajaxurl,
            data: {
                action: 'video_search',
                search_query: $('#search-input').val(),
                practice_area: $('#practice_area').val(),
                industry_team: $('#industry_team').val(),
                market_focus: $('#market_focus').val(),
                office: $('#office').val(),
            },
            beforeSend: function() {
                $("#video-loader").find('img').removeClass('d-none');
            },
            success: function(response) {
                // Replace the search results container with the new results
                $('#video-results').html(response);
                $("#video-loader").find('img').addClass('d-none');
                $("#video-results .col-12").slice(0, 9).show();
                $(".load-more").css('visibility', 'visible');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle error
            },
            complete: function() {
                // Hide loading spinner or any loading indication
            }
        });
    }
    VideoNews();
    $('#video-form').on('submit', function(e) {
        e.preventDefault();
        VideoNews();
    });
    $('#video-form select').on('change', function() {
        // Check if the selected option is not empty
        if ($(this).val() !== '') {
          // Call your function here
          VideoNews();
        }
    });

    // alerts

    function AlertNews() {
        var formData = $('#alert-form').serialize();

        $.ajax({
            type: 'POST',
            url: customSearchAjax.ajaxurl,
            data: {
                action: 'alert_search',
                search_query: $('#search-input').val(),
                practice_area: $('#practice_area').val(),
                industry_team: $('#industry_team').val(),
                market_focus: $('#market_focus').val(),
                office: $('#office').val(),
            },
            beforeSend: function() {
                $("#alert-loader").find('img').removeClass('d-none');
            },
            success: function(response) {
                // Replace the search results container with the new results
                $('#alert-results').html(response);
                $("#alert-loader").find('img').addClass('d-none');
                $("#alert-results .col-12").slice(0, 9).show();
                $(".load-more").css('visibility', 'visible');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle error
            },
            complete: function() {
                // Hide loading spinner or any loading indication
            }
        });
    }
    AlertNews();
    $('#alert-form').on('submit', function(e) {
        e.preventDefault();
        AlertNews();
    });
    $('#alert-form select').on('change', function() {
        // Check if the selected option is not empty
        if ($(this).val() !== '') {
          // Call your function here
          AlertNews();
        }
    });


});