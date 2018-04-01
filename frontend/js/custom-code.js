//
// CUSTOM CODE
//

$(window).load(function(){
  $('#page').removeClass('is-exiting');
  allScript();
  ga('send', 'pageview');
})


function allScript(){

    $('html, body').scrollTop(0);
    //
    // SEARCH
    //
    $('.header__search, .search__overlay').on('click', function(){
      $('.search').toggleClass('is-open');
    })

    //
    // MOBILE MENU
    //
    $('.header__menu_mobile').on('click', function(){
      $('.menu__mobile').toggleClass('is-open');
    })

    //
    // SHOW ALL ARTISTS
    //
    $('.show_all').on('click', function(){
      $(this).hide();
      $('.single-project__other_artist_list a').removeClass('hide');
    })

    //
    // LAZY LOAD
    //

    $('.lazy').Lazy({
      // your configuration goes here
      scrollDirection: 'vertical',
      effect: "fadeIn",
      effectTime: 500,
      threshold: 100,
      onError: function(element) {
          console.log('error loading ' + element.data('src'));
      }
    });


    //
    // MAILCHIMP
    //
    $('#mailchimp').submit(function(){
  		var mailchimpform = $(this);
      $('.newsletter__status').html('Wait...');

  		$.ajax({
  			url:mailchimpform.attr('action'),
  			type:'POST',
  			data:mailchimpform.serialize(),
  			success:function(data){
  				$('.newsletter__status').html(data);
  			}
  		});
  		return false;
  	});


    $('.archive_artists__list_item a').hoverIntent(
      function(){
        var $image = $( this ).data('image');
        console.log($image);
        $('.archive_artists__profile').css({backgroundImage: 'url('+$image+')'});
        setTimeout( function() {
          $('.archive_artists__profile').addClass('is-visible');
        }, 200);

      }, function(){
          $('.archive_artists__profile').removeClass('is-visible');
      }
    );

    //
    // CLOSE MENU
    //

    $('.menu__mobile_close').on('click', function(){
      $('.menu__mobile').removeClass('is-open');
    })


};


$(document).on('mousemove', function(e){
    $('.archive_artists__profile').css({
       left:  e.pageX + 30,
       top:   e.pageY - 260,
    });
});


$(function(){
  'use strict';
  var options = {
	blacklist: '',
    prefetch: true,
    cacheLength: 2,
    onStart: {
      duration: 1000, // Duration of our animation
      render: function ($container) {
        $container.addClass('is-exiting');
        $('#page-transition').addClass('is-loading');
        smoothState.restartCSSAnimations();
      }
    },
    onReady: {
      duration: 500,
      render: function ($container, $newContent) {
        // Remove your CSS animation reversing class
        // Inject the new content
        $container.html($newContent);
        var url = smoothState.href // <-- get the current url
        var doc = smoothState.cache[url].doc // <-- full html response
        var $href = url.replace(/^.*\/\/[^\/]+/, '');
        console.log($href);
        ga('send', 'pageview', $href);
      }
    },
    onAfter: function ($container, $newContent) {
      allScript();
      $('#page-transition').removeClass('is-loading');
      $container.removeClass('is-exiting');
    }
  },
  smoothState = $('#page').smoothState(options).data('smoothState');
});


(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-16867745-1', 'auto');
