jQuery(document).ready(function($) {

  $('#sharrre').sharrre({
    share: {
      facebook: true,
      twitter: true,
      pinterest: false,
      googlePlus: false
    },
    template:'<span>Compartir esta página:</span><div><a href="#" class="social-icon si-borderless si-small si-facebook" title="Facebook"><i class="icon-facebook"></i><i class="icon-facebook"></i></a><a href="#" class="social-icon si-borderless si-small si-twitter" title="Twitter"><i class="icon-twitter"></i><i class="icon-twitter"></i></a></div>',
    enableHover: false,
    enableTracking: false,
    url: document.location.href,
    urlCurl: '/sites/all/themes/ag/bower_components/sharrre/sharrre.php',
    render: function(api, options) {
      $(api.element).on('click', '.si-facebook', function() {
        api.openPopup('facebook');
      });
      $(api.element).on('click', '.si-twitter', function() {
        api.openPopup('twitter');
      });
      $(api.element).on('click', '.si-pinterest', function() {
        api.openPopup('pinterest');
      });
      $(api.element).on('click', '.si-gplus', function() {
        api.openPopup('googlePlus');
      });
    }
  });

});


