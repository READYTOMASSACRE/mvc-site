(function($) {
  $('select[name="catalog[fk_category]"]').on('change', function() {
    var fk_category = $('select[name="catalog[fk_category]"] option:selected').val();
    if(fk_category == 2) {
      $('label[for="catalog[brand]"]').html('Название песни');
      $('label[for="catalog[other]"]').html('Отрывок из песни');
    } else {
      $('label[for="catalog[brand]"]').html('Брэнд');
      $('label[for="catalog[other]"]').html('Описание');
    }
    $.post('/catalog/get_items', {id:fk_category}, null, "json")
      .done(function(data) {
        $('select[name="catalog[fk_item]"]').html('');
        for(d in data) {
          $('select[name="catalog[fk_item]"]').append('<option value="'+ data[d].ID +'">' + data[d].name + '</option>');
        }
      })
      .fail(function() {
        console.log('halo');
      });
  });



  var login = getCookie('login');
  var url;


  if(login == 'true')	{
    $('input[name="login"]').val('admin');
    url =  document.location.href.split('/')[0] + '/user/profile';
  }
  else {
    url =  document.location.href.split('/')[0] + '/user/login';
  }
  var triggerClick = $('.select');
  triggerClick.on('click', function() {
    $('div.dropdown').toggleClass('dropdown-active');
  });
  $('input[name="login"]').on('click', function() {
    document.location.href = url;
  })

  function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }

  $('button.btn-lg').on('click', function() {
    var login = $('input[name="username"]').val();
    var password = $('input[name="password"]').val();
    $.post('/user/login', {u:login, p:password}, null, 'json')
      .done(function (data) {
        data.success ?document.location.href = 'http://ismymusic.tk' : console.log('failed login');
        return false;
      })
      .fail(function() {
        console.log('abort');
        return false;
      });
    return false;
});
})(jQuery);
