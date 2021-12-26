$(document).on({
  click: function (e) {
    if ($(e.target).hasClass('show')) {
      $('.navbar-collapse.show').collapse('hide');

      $('body').removeAttr('style');
    }

    e.stopPropagation();
  },

  keyup: function (e) {
    if (e.code === 'Enter' && $('.navbar-collapse').hasClass('show')) {
      $('.navbar-collapse.show').collapse('hide');

      $('body').removeAttr('style');
    }

    e.stopPropagation();
  }
});

$('.navbar .navbar-toggler').on('click', function () {
  $('body').removeAttr('style');

  if (!$(this).hasClass('inside')) {
    $('body').css({
      overflow: 'hidden',
      paddingRight: $(window).outerWidth() - $(window).width()+'px'
    });
  }
});

const brazilianFormatNumber = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
};

const brazilianFormatNumberOptions = {
  onKeyPress: function(_val, _e, field, options) {
    field.mask(brazilianFormatNumber.apply({}, arguments), options);
  }
};

const maskPhone = 'input[name="telefone"], input[name="celular"], input[type="tel"]';
const maskCNPJ = 'input[name*="cnpj"], input[class*="cnpj"]';

$(maskPhone).mask(brazilianFormatNumber, brazilianFormatNumberOptions);

$(maskCNPJ).mask("99.999.999/9999-99");

function animateScroll( $value = 0 ) {
  $("html, body").animate({
    scrollTop: $value
  }, 500);
}

function clickScroll( currentLink ) {
  currentLink.on('click', function( e ) {
    e.preventDefault();
    animateScroll();
  });
}

clickScroll($('.ltco_scroll_top'));

const navbarScroll = $('.ltco_nav_scroll');

navbarScroll.each(function() {
  const navHeight = $(this).outerHeight();

  $(this).find('a[href^="#"]').on('click', function(e) {
    e.preventDefault();

    const attrCurrentLink = $(this).attr("href");
    const offserCurrentLink = $(attrCurrentLink).offset().top;

    animateScroll(offserCurrentLink - navHeight);
  });
});

const splideLoop = [
  {
    id: '#differential_slide',
    options: {
      type: 'loop',
      perPage: 5,
      perMove: 1,
      gap: '1rem',
      keyboard: false,
      pagination: false,
      breakpoints: {
        '1200': {
          perPage: 4,
        },
        '992': {
          perPage: 3,
        },
        '576': {
          perPage: 2,
        },
      }
    }
  },
  {
    id: '#gallery_slide',
    options: {
      type: 'loop',
      perPage: 1,
      keyboard: false,
      pagination: false,
    }
  },
  {
    id: '#project_slide',
    options: {
      type: 'loop',
      perPage: 1,
      keyboard: false,
    }
  },
  {
    id: '#triade_slide',
    options: {
      type: 'loop',
      perPage: 1,
      perMove: 1,
      gap: '1rem',
      keyboard: false,
      pagination: false,
    }
  }
];

splideLoop.forEach(item => {
  const findSlide = document.querySelector(item.id);

  if (!!findSlide) new Splide( item.id, item.options ).mount();
});

function ltcoSizeMenu(event) {
  const button = document.querySelector('.ltco_navbar_header .navbar-toggler');
  const nav = document.querySelector('#navbarHeader .navbar-wrapper');
  const header = document.querySelector('header.header');

  const {
    offsetWidth: buttonWidth,
    offsetHeight: buttonHeight,
    offsetLeft: buttonLeft
  } = button;

  const { offsetHeight: headerHeight } = header;

  nav.style.width = `${buttonLeft + buttonWidth}px`;
  nav.style.minHeight = `${headerHeight - buttonHeight - 1}px`;

  window.removeEventListener(event, ltcoSizeMenu);
}


['load', 'resize'].forEach(event => {
  window.addEventListener(event, () => ltcoSizeMenu(event));
});

function handleTab(el, initActive = false) {
  const classActive = 'active';

  const containerTab = document.querySelector(el);
  const tabButton = containerTab.querySelectorAll('.tab-button');
  const tabContent = containerTab.querySelectorAll('.tab-content');

  const addActiveClassInFirstChild = () => {
    [tabButton, tabContent].forEach(tabElement => {
      tabElement[0].classList.add(classActive);
    });
  };

  if (initActive) addActiveClassInFirstChild();

  const removeActiveClass = () => {
    [tabButton, tabContent].forEach(tabElement => {
      tabElement.forEach(element => element.classList.remove(classActive));
    });
  };

  const handleClickButton = evt => {
    evt.preventDefault();

    const currentButton = evt.target;
    const keyTab = currentButton.getAttribute('data-id');

    removeActiveClass();
    currentButton.classList.add(classActive);
    containerTab.querySelector(`#${keyTab}`).classList.add(classActive);
  };

  tabButton.forEach(tab => {
    tab.addEventListener('click', handleClickButton);
  });
}

handleTab('.ltco_contact_us', true);

/* $('.custom-file input[type="file"]').on('click', function () {
  bsCustomFileInput.init();
}); */
