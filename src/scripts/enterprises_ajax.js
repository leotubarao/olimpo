const postsWrapper = $(options.container).find( '[data-enterprise-list]' );

$('.ltco_form_filter').each(function() {
  if ($(this).hasClass('.reactive')) {
    $(this).on('change', function(e) {
      e.preventDefault();

      postsWrapper.animate({
        opacity: 0.5
      });

      let data = {
        action: 'ltco_enterprises',
        query: options.posts
      };

      $.ajax({
        url: options.ajax_url,
        data: data,
        type: 'POST',
        success: function( response ) {
          postsWrapper.append( response );
        }
      }).always(() => {
        postsWrapper.animate({
          opacity: 1
        });
      });
    });

    return;
  }

  const urlPage = options.enterprise_page;

  $(this).on('change', function(e) {
    e.preventDefault();

    const objFields = $(this).serializeArray().reduce((obj, entry) => {
      if (!obj[entry.name]) obj[entry.name] = [];

      obj[entry.name].push(entry.value);

      return obj;
    }, {});

    const args = Object.keys(objFields).map(name => {
      return {
        name: name,
        value: objFields[name].join(',')
      }
    });

    let url = urlPage;
    url += '?';

    $.each(args, function( _i, el ) {
      if (!el.value || el.value === 'all') return;

      url += el.name + '=' + el.value + '&';
    });

    url = url.slice(0, -1);

    if (window.location.href !== url) window.location.replace( url );
  });
});
