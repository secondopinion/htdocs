jQuery(function($) {

  var tmp = location.hostname.split('.');
  Mage.Cookies.domain = '.' + tmp[tmp.length - 2] + '.' + tmp[tmp.length - 1];
  Mage.Cookies.path = '/';

  var today = new Date();
  today.setTime(today.getTime());
  var expiry = 36500 * 1000 * 60 * 60 * 24; //Setting cookie for 100 years
  Mage.Cookies.expires = new Date(today.getTime() + expiry);
  
  var _ws = {'1': 'PATIENT', '2': 'DOCTOR', '3': 'HOSPITAL'};
  var cookieName = "_ws";

  function getCurrentCity() {
    var id = Mage.Cookies.get(cookieName);
    return getCity(id);
  }

  function getCity(id) {
    return (id in _ws)? _ws[id]: false;
  }
  
  function setCurrentCity(city) {
    Mage.Cookies.set(cookieName, city);
  }

  function init() {
    var currentCity = getCurrentCity();
    var h='<h2><i class="fa fa-map-marker"></i>Choose choose you account</h2><ul>';
    for (var id in _ws) {
        i = '<li><a id="'+id+'" href="javascript:void(0);">' + _ws[id] + '</a></li>';
        h += i;
    }
    h += '</ul>';
    $('#cityModal').html(h);
      
    if(currentCity) { //city already assigned
      $('.current-city').show();
      $('#currentCity').html(currentCity);
    } else { //city not assigned
      $('#cityModal').freshModal({
        escapeClose: false,
        clickClose: false,
        showClose: false,
        zIndex: 2000
      });
    }

    $('.current-city a').click(function() {
      $('#cityModal').freshModal({
        zIndex: 2000
      });
    });

    $('#cityModal').on('click', 'a', function() {
      var id = $(this).attr('id');
      var city = getCity(id);
      if(city) {
        var c = getCurrentCity();
        if (c != city) {
        	setCurrentCity(id);
        	$('.current-city').show();
        	$('#currentCity').html(city);
        	location.reload();
        }
      }
      $.modal.close();
    });
  }

  init();

});
