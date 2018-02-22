// ------------------------------------------------------------------------
// CUSTOM CODE
// ------------------------------------------------------------------------

$(window).load(function(){
  // SEARCH
  $('.header__search, .search__overlay').on('click', function(){
    $('.search').toggleClass('is-open');
  })

  // MOBILE MENU
  $('.header__menu_mobile, .menu__mobile_close').on('click', function(){
    $('.menu__mobile').toggleClass('is-open');
  })

  $('.lazy').Lazy({
    // your configuration goes here
    scrollDirection: 'vertical',
    effect: "fadeIn",
    effectTime: 500,
    threshold: 0,
    visibleOnly: true,
    onError: function(element) {
        console.log('error loading ' + element.data('src'));
    }
  });


})


jQuery(function ($) {
  $('#mailchimp').submit(function(){
		var mailchimpform = $(this);
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
});
