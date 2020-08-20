(function($)
{
	$(function()
	{
		headfix()
		$(window).scroll(function()
		{
			headfix()			
		})
$('#nav-icon1').on('click',function(){
		$(this).toggleClass('open');
		$('body,.lines .nav').toggleClass('nav-show');
	});

$('.cur').on('click',function(){
		$(this).toggleClass('open');
		$('.inside').toggleClass('open');
	});


$('.sub').on('click',function(){
		$(this).toggleClass('opened'); 
	});
		function headfix()
		{
			if($(window).scrollTop() > 100)
			{
				$('header').addClass('fixed')
			}
			else
			{
				$('header').removeClass('fixed')
			}
		}
	})
})(jQuery)