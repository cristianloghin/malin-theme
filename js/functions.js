/**************************
COOKIE WARNING FUNCTIONS
***************************/

function catapultSetCookie( cookieName, cookieValue, nDays )
{
	var today = new Date();
	var expire = new Date();
	if ( nDays == null || nDays == 0) nDays = 1;
	expire.setTime( today.getTime() + 3600000 * 24 * nDays );
	document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toGMTString() + "; path=/";
}
function catapultReadCookie( cookieName )
{
	var theCookie = " " + document.cookie;
	var ind = theCookie.indexOf( " " + cookieName + "=" );
	if ( ind == -1 ) ind = theCookie.indexOf( ";" + cookieName + "=" );
	if ( ind == -1 || cookieName == "" ) return "";
	var ind1 = theCookie.indexOf( ";", ind + 1);
	if (ind1 == -1) ind1 = theCookie.length; 
	return unescape( theCookie.substring( ind + cookieName.length + 2, ind1 ));
}
function catapultDeleteCookie( cookieName )
{
	var today = new Date();
	var expire = new Date() - 30;
	expire.setTime( today.getTime() - 3600000 * 24 * 90 );
	document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toGMTString();
}
function catapultAcceptCookies()
{
	catapultSetCookie( 'catAccCookies', true, 30 );
	$( '.cookie_warning' ).fadeOut( 300 );
}

/********************************
INVESTEE COMPANY NEWS FUNCTION
*********************************/

function init_news( number )
{
	
	total = $('.main').children('.news_article').length;

	console.log(number, total);

	if ( number < total )
	{
		$('.main').children('.news_article').wrapAll('<div class="news_wrapper"></div>');

		var articles = $('.news_article');
		var id = 1;

		for( var i = 0; i < articles.length; i += number )
		{
			if ( id == 1 )
			{
				articles.slice(i, i + number).wrapAll('<div class="news_block" id="block-' + id + '"></div>');
			}
			else
			{
				articles.slice(i, i + number).wrapAll('<div class="news_block" id="block-' + id + '" style="display: none"></div>');
			}
			id ++;
		}
		$('.news_wrapper').append('<div class="news_nav"></div>');
		nav = '<div class="prev"><span class="hide">Previous</span></div>';
		nav += '<div class="pag">';
		var id = 1;
		for ( var i = 0; i < articles.length; i += number)
		{
			if ( id == 1 )
			{
				nav += '<span class="active" id="bt-' + id + '" data-id="' + id + '">' + id + '</span>';
			}
			else
			{
				nav += '<span id="bt-' + id + '" data-id="' + id + '">' + id + '</span>';
			}
			id ++;
		}
		nav += '</div><div class="next"><span>Next</span></div>';
		$('.news_nav').append(nav);

		jQuery.data( document.body, 'active_news_block', 1 );

		/* Button Actions */

		function switch_news( current )
		{
			var active = jQuery.data( document.body, 'active_news_block' );
						
			$('#block-' + active).fadeOut( 150, function()
			{
				$('#block-' + current).fadeIn();
			});
			$('#bt-' + active).removeClass('active');
			$('#bt-' + current).addClass('active');
			
			if ( current == 1 )
			{
				$('.prev span').addClass('hide');
				$('.next span').removeClass('hide');
			}

			if ( current == Math.ceil(total / number) )
			{
				$('.next span').addClass('hide');
				$('.prev span').removeClass('hide');
			}

			if ( current > 1 && current < Math.ceil(total / number) ) {
				$('.prev span').removeClass('hide');
				$('.next span').removeClass('hide');
			}

			jQuery.data( document.body, 'active_news_block', current );
		}

		$('.prev span').click( function()
		{
			var active = jQuery.data( document.body, 'active_news_block' );
			var current = active - 1;
			switch_news( current );

		});

		$('.next span').click( function()
		{
			var active = jQuery.data( document.body, 'active_news_block' );
			var current = active + 1;
			switch_news( current );
		});
		$('.pag span').click( function()
		{
			var current = $(this).data('id');
			switch_news( current );
		});
	}
}

/********************************
finacial reports FUNCTION
*********************************/

function init_fin()
{
	
	jQuery.data( document.body, 'active_fin_list', 2015 );
	
	/* Button Actions */

	function switch_fin( current )
	{
		var active = jQuery.data( document.body, 'active_fin_list' );
					
		$('#block-' + active).fadeOut( 150, function()
		{
			$('#block-' + current).fadeIn();
		});
		$('#bt-' + active).removeClass('active');
		$('#bt-' + current).addClass('active');
		
		jQuery.data( document.body, 'active_fin_list', current );
	}

	$('.fin_nav span').click( function()
	{
		var current = $(this).data('id');
		switch_fin( current );
	});
}

function close_submenu()
{
	active = jQuery.data( document.body, 'active_submenu' );
	$( '#' + active ).parent().find('ul').removeClass('open');
	$('.overlay').remove();
}

/************************
MODAL
*************************/

function make_modal(content, link) {
	console.log(link);
	title = '<div class="modal_title"><span>Disclaimer &ndash; Important</span><span class="close_modal icon-cancel"></span></div>';
	buttons = '<div class="modal_buttons"><span><a class="clear_modal" href="' + link + '" target="_blank">I Agree</a><a href="#" class="close_modal">Disagree / Close</a></span></div>';
	$('body').prepend('<div class="modal"><div class="container">' + title + '<div class="text">' + content + '</div>' + buttons + '</div></div>');
	$('.close_modal').click( function(e)
	{
		e.preventDefault();
		$('body').css('overflow', 'auto');
		$('.modal').fadeOut(150);
	});
}

/************************
DOCUMENT READY
***********************/

$(function()
{
	//jQuery.data( document.body, 'active_tab', 'tab-1' );
	
	// Display RNS News on the homepage
	counter = 1;
	max_value = 2;
	$('.newsRow').each(function()
	{
		if ( counter <= max_value )
		{
			var date = '<p class="small">' + $(this).find('span').html() + '</p>';
			var title = '<span class="newsTitle" storyid="' + $(this).attr('storyid') + '"><a href="http://ir1.euroinvestor.com/asp/ir/Malin/NewsRead.aspx?storyid=' + $(this).attr('storyid') + '&ishtml=1" target="_blank">' + $(this).find('.newsTitle').html() + '</a></span>';
			$('#rns_display').append(date).append(title);
		}
		counter ++;
	});
	$('#rns_data').remove();

	// mobile open main menu button action
	$('.open_menu > div').click( function()
	{
		$(this).children(':last-child').toggleClass('icon-menu').toggleClass('icon-cancel');
		$('.main_menu > ul').toggleClass('open');
	});

	// open submenus
	$('.submenu_toggle').click( function()
	{
		active = jQuery.data( document.body, 'active_submenu' );
		id = $(this).attr('id');

		if ( active != id )
		{
			$( '#' + active ).parent().find('ul').removeClass('open');
			overlay = '<div class="overlay" style="position: fixed; width: 100%; height: 100%; top: 0; left: 0; background: transparent; z-index: 4"></div>';
			if( $('.overlay').length == 0 )
			{
				$('body').prepend( overlay );
				$('.overlay').hover( function()
				{
					timeOut = setTimeout(close_submenu, 150);
				})
			}
		}
		else
		{
			$('.overlay').remove();
		}
		$(this).parent().find('ul').toggleClass('open');
		jQuery.data( document.body, 'active_submenu', id );
	});

	// Open tabs
	$('.tab > div:first-child').click( function()
	{
		active_tab = jQuery.data( document.body, 'active_tab' );
		id = $(this).attr('id');

		if (typeof businesses_page !== 'undefined' && businesses_page && active_tab != id )
		{
			$( '.sidebar #' + active_tab ).removeClass('active');
			$('.sidebar #' + id).addClass('active');

		}

		if ( active_tab != id )
		{
			$( '.main #' + active_tab ).parent().children(':last-child').removeClass('open');
			$( '.main #' + active_tab ).children(':last-child').addClass('icon-angle-down').removeClass('icon-angle-up');
		}

		$(this).children(':last-child').toggleClass('icon-angle-down').toggleClass('icon-angle-up');
		$(this).parent().children(':last-child').toggleClass('open');
		jQuery.data( document.body, 'active_tab', id );
	});

	// Cookie warning
	$('#close_cookie_warning').click( function(e)
	{
		e.preventDefault();
		catapultAcceptCookies();
	});

	if( !catapultReadCookie( 'catAccCookies' ) )
	{
		$( '.cookie_warning' ).fadeIn( 300 );
	}

	// Open modal
	$('.open_modal').click( function(e)
	{	
		e.preventDefault();
		$('body').css('overflow', 'hidden');
		$('.modal').fadeIn();
	});

});

