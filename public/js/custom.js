$(".menu-btn").click(function(){
  $("#nav").toggleClass("active");
});

$('.dashboard-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: true,
  arrows: false,
  focusOnSelect: true,
  autoplay: false,
  mobileFirst: true,
  asNavFor: '.columns-block',
});

$('.columns-block').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: false,
  arrows: false,
  focusOnSelect: true,
  autoplay: false,
  mobileFirst: true,
  fade: true,
  adaptiveHeight: true,
  asNavFor: '.dashboard-slider',
});

// $('.feature-slider').slick({
//   centerMode: true,
//   slidesToShow: 1,
//   slidesToScroll: 1,
//   centerPadding: '10px',
//   dots: true,
//   arrows: false,
//   focusOnSelect: true,
//   autoplay: false,
//   mobileFirst: true,
//   responsive: [{
//     breakpoint: 991.98,
//     settings: "unslick",
//   }]
// });

$('.feature-slider-testing').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: true,
  arrows: false,
  focusOnSelect: true,
  mobileFirst: true,
  responsive: [{
    breakpoint: 991.98,
    settings: "unslick",
  }]
});
		

$('.read-more-case-study').slick({
  centerMode: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  centerPadding: '10px',
  dots: true,
  arrows: false,
  focusOnSelect: true,
  autoplay: false,
  mobileFirst: true,
  responsive: [{
    breakpoint: 991.98,
    settings: "unslick",
  }]
});




$('.testi-image-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: false,
  arrows: true,
  focusOnSelect: true,
  autoplay: true,
  mobileFirst: true,
  asNavFor: '.testi-review-text',
  prevArrow: '<div class="slick-prev"><img src="images/btn-prev.png"></div>',
  nextArrow: '<div class="slick-next"><img src="images/btn-next.png"></div>'
});

$('.testi-review-text').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: false,
  arrows: false,
  focusOnSelect: true,
  autoplay: true,
  mobileFirst: true,
  fade: true,
  asNavFor: '.testi-image-slider',
});


// counter on strategy page 

(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {

			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {

					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               
		to: 0,            
		speed: 1000,           
		refreshInterval: 100,  
		decimals: 0,          
		formatter: formatter,  
		onUpdate: null,       
		onComplete: null    
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {

  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});

// subscriber page slider code 

$('.slider-for').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
        breakpoint: 3000,
        settings: "unslick"
    },
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        arrow: false,
        dots: false
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        arrow: false,
        dots: false
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: false,
        dots: false
      }
    }
  ]
});


// subscriber page slider code end

// product page

$('.slider-product-banner').slick({
  dots: true,
  infinite: true,
  autoplay: true,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false
});


// why pilot

$('.slider-why-pilot').slick({
  dots: true,
  infinite: false,
  speed: 300,
  autoplay: true,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
        breakpoint: 3000,
        settings: "unslick"
    },
    {
      breakpoint: 1300,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrow: false,
        dots: true
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrow: false,
        dots: true
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: false,
        dots: true
      }
    }
  ]
});

// subscriber experience 

$('.subscriber-experience-slider').slick({
  dots: false,
  arrows: false,
  infinite: true,
  autoplay: true,
  adaptiveHeight: true,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
});   



// function for Accordian and tabs in faqs page

 function openTab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
}
function openAccordian(evt , ButtonName) {
    var i, Accordiancontent;
    Accordiancontent = document.getElementsByClassName("Accordiancontent");
    for (i = 0; i < Accordiancontent.length; i++) {
        Accordiancontent[i].style.display = "none";
    }
    document.getElementById(ButtonName+ "Accordian").style.display = "block";
}