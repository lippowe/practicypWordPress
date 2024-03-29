/**
 * Plugin functions file
 */
(function ($) {
    'use strict';

	$.fn.magnificPopupCallbackforPortfolioBlock = function(){

        this.magnificPopup({
            disableOn: function() { if( $(window).width() < 0) { return false; } return true; },
            type: 'image',
            gallery: {
                enabled: true,
            },
            image: {
                titleSrc: function (item) {

                    let $el = this.currItem.el,
                    	$popover_content = $el.closest('.portfolio-block-entry-thumbnail-popover-content'),
                    	$link = $popover_content.find('.portfolio_item-title a'),
                    	$title = $link.html(),
                    	$href = $link.attr('href'),
                    	show_caption = $popover_content.data('show-caption');

                    if ( show_caption ) {
                        return '<a href="' + $href + '">' + $title + '</a>';
                    }
                }
            },
            iframe: {
                markup: '<div class="mfp-iframe-scaler">'+
                '<div class="mfp-close"></div>'+
                '<iframe class="mfp-iframe" frameborder="0" allow="autoplay" allowfullscreen></iframe>'+
                '<div class="mfp-bottom-bar"><div class="mfp-title"></div></div>'+
                '</div>',
                callbacks: {

                },
                patterns: {
                    vimeo: {
                        index: 'vimeo.com/',
                        id: function(url) {
                            var m = url.match(/(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/);
                            if ( !m || !m[5] ) return null;
                            return m[5];
                        },
                        src: '//player.vimeo.com/video/%id%?autoplay=1'
                    },
                    youtu: {
                        index: 'youtu.be',
                        id: function( url ) {
                            // Capture everything after the hostname, excluding possible querystrings.
                            var m = url.match( /^.+youtu.be\/([^?]+)/ );

                            if ( null !== m ) {
                                return m[1];
                            }

                            return null;
                        },
                        // Use the captured video ID in an embed URL.
                        // Add/remove querystrings as desired.
                        src: '//www.youtube.com/embed/%id%?autoplay=1&rel=0'
                    }
                }
            },
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
            callbacks: {
                change: function() {
                    if(this.currItem.type === 'inline'){
                        $(this.content).find('video')[0].play();
                    }
                },
                beforeClose: function () {
                    if (this.currItem.type === 'inline') {
                        var $video = $(this.content).find('video');

                        if ($video.length) {
                            var videoElement = $video[0];

                            var currentSrc = videoElement.currentSrc;
                            videoElement.pause();
                            videoElement.currentTime = 0;
                            videoElement.src = '';
                            videoElement.src = currentSrc;
                        }
                    }
                },
                markupParse: function (template, values, item) {

                    if ( item.type === 'iframe' ) {

                        let $el = item.el,
							$popover_content = $el.closest('.portfolio-block-entry-thumbnail-popover-content'),
							$link = $el.closest('.portfolio-block-entry-thumbnail-popover-content').find('.portfolio_item-title a'),
							$title = $link.html(),
							$href = $link.attr('href'),
							show_caption = $popover_content.data('show-caption');

                        if ( show_caption ) {
                            values.title = '<a href="' + $href + '">' + $title + '</a>';
                        }
                    }

                }
            }
        });
    };

    var $document = $(document);
    var $window = $(window);

    /**
     * Document ready (jQuery)
     */
	$(function () {

        $('.entry-cover').find('.portfolio-block-popup-video').magnificPopupCallbackforPortfolioBlock();
		$('.wpzoom-blocks_portfolio-block').each(function(){
            $(this).find('.portfolio_item .portfolio-block-popup-video').magnificPopupCallbackforPortfolioBlock();
        });

		/**
		 * Portfolio Block Filter click.
		 */
		$('.wpzoom-blocks_portfolio-block_filter ul').portfolioBlockFilter();

		//Apply Masonry
		let container = document.getElementsByClassName('wpzoom-blocks_portfolio-block');
		[].forEach.call(container, function(el) {					
			if( el.classList.contains( 'layout-masonry' ) ) {
				var elem = el.querySelector('.wpzoom-blocks_portfolio-block_items-list');
				var msnry = new Masonry( elem, {
					// options
					itemSelector: '.wpzoom-blocks_portfolio-block_item',
				});
	
				// element
				imagesLoaded( el ).on( 'progress', function() {
					msnry.layout();
				});
			}
		});

		initPortfolio();

		/**
		 * Load more stuff.
		 */
		var portfolioBlocks = $('.wpzoom-blocks_portfolio-block');
		portfolioBlocks.each(function () {

			let $this = $(this),
				$portfolioList    = $this.children('.wpzoom-blocks_portfolio-block_items-list'),
				portfolioData     = $this.data( 'load-more' ),
				totalPosts        = portfolioData.total,
				postsNum          = portfolioData.per_page,
				
				loadMoreContainer = $this.find( '.wpzoom-blocks_portfolio-block_show-more' ),
				btnLoadMore       = loadMoreContainer.children( '.wpz-portfolio-button__link' ),
				btnLoadMoreText   = btnLoadMore.html();

				btnLoadMore.on( 'click', function(e) {
					
					e.preventDefault();
					var offset = $this.data( 'offset' );
					var exclude = $this.data( 'exclude-posts' );
					btnLoadMore.html( WPZoomPortfolioBlock.loadingString );

					$.post(
						WPZoomPortfolioBlock.ajaxURL,
						{
							action: 'wpzoom_load_more_items',
							posts_data: JSON.stringify( portfolioData ),
							offset: offset,
							exclude: exclude,
						},
						function( data, status, code ) {
							
							if ( status == 'success' ) {
								var $newItems = $(data).find('.wpzoom-blocks_portfolio-block_item');
								$newItems.find('article').removeClass('hentry').addClass('portfolio_item');
								$portfolioList.append( $newItems );

 								let filterTrigger = $this.find( '.wpzoom-blocks_portfolio-block_filter .current-cat a' );
								if( !$this.hasClass( 'layout-masonry' ) && typeof( filterTrigger ) != 'undefined' && filterTrigger != null ) {
									filterTrigger.click();
								};
	
								let container = document.getElementsByClassName('wpzoom-blocks_portfolio-block');
								[].forEach.call(container, function(el) {					
									if( el.classList.contains( 'layout-masonry' ) ) {
										var elem = el.querySelector('.wpzoom-blocks_portfolio-block_items-list');
										var msnry = new Masonry( elem, {
											// options
											itemSelector: '.wpzoom-blocks_portfolio-block_item',
										});
							
										// element
										imagesLoaded( el ).on( 'progress', function() {
											msnry.layout();
										});
									}
								});

								//trigger jetpack lazy images event
								$( 'body' ).trigger( 'jetpack-lazy-images-load');
								$portfolioList.find('.portfolio_item .portfolio-block-popup-video').magnificPopupCallbackforPortfolioBlock();
	
								if ( offset >= ( totalPosts - postsNum ) ) {
									//btnLoadMore.remove()
									btnLoadMore.animate({height: 'hide', opacity: 'hide'}, 'slow', function () {
										btnLoadMore.remove();
									});
								}
	
								btnLoadMore.html( btnLoadMoreText );
								$this.data( 'offset', offset + postsNum );
	
							}
						}
					);
				
				});
		});

	});

	/**
	 * Portfolio Block Filter click function.
	 */
	$.fn.portfolioBlockFilter = function () {

		return this.each(function () {
			var $this = $(this);
            var $taxs = $this.find('li');
            var $portfolioWrapper = $(this).closest('.wpzoom-blocks_portfolio-block');
            var $portfolio = $portfolioWrapper.find('.wpzoom-blocks_portfolio-block_items-list');

			var tax_filter_regex = /cat-item-([0-9]+)/gi;

			//Filtering of the portfolio items
			$taxs.on( 'click', function ( event ) {
				event.preventDefault();

				$this = $(this);

				$taxs.removeClass( 'current-cat' );
				$this.addClass( 'current-cat' );

				var catID = tax_filter_regex.exec($this.attr('class'));
				tax_filter_regex.lastIndex = 0;

				var filter;

				if ( catID === null ) {
					filter = '.wpzoom-blocks_portfolio-block_item';
				} else {
					filter = '.wpzoom-blocks_portfolio-block_category-' + catID[1];
				}

				var category_id = ( null == catID ) ? 'all' : catID[1];

				if ( category_id == 'all' && $portfolio.attr('data-subcategory') ) {
					category_id = $portfolio.attr('data-subcategory');
				}

				let show = 'all' == category_id ? $portfolio.find( '[data-category]' ) : $portfolio.find( '.wpzoom-blocks_portfolio-block_category-' + category_id + '' ),
			    	hide = 'all' == category_id ? null : $portfolio.find( '[data-category]:not(.wpzoom-blocks_portfolio-block_category-' + category_id + ')' );

				var items_number = $taxs.siblings( '.current-cat' ).attr( 'data-counter' );
				var filteredItems = $( filter );

				if(  $portfolioWrapper.hasClass( 'ajax-load-items' ) ) {
					if( show.length <= 0 ) {
						$this.getPortfolioFilteredItems();
					}
				}

				show.find('.portfolio-block-popup-video').magnificPopupCallbackforPortfolioBlock();
				show.find('.portfolio-pro-popup-video').magnificPopupCallbackforPortfolioBlock();

				show.each(function () {

					var item = $(this);
					
					if( item.hasClass( 'fade-out' ) )  {
						item.removeClass( 'fade-out' );
					}

					if( !item.hasClass( 'fade-in' ) )  {
						item.addClass( 'fade-in' );
					}
				
				});				

				if ( null !== hide ) {
					hide.each(function () {

						var item = $(this);
						
						if( item.hasClass( 'fade-in' ) )  {
							item.removeClass( 'fade-id' );
						}
	
						if( !item.hasClass( 'fade-out' ) )  {
							item.addClass( 'fade-out' );
						}
					
					});
				}

			});

		});
	};

	function initPortfolio() {

		let container = document.getElementsByClassName('wpzoom-blocks_portfolio-block');
	
		[].forEach.call(container, function(el) {
	
			
			let itemsContainer = el.querySelector('.wpzoom-blocks_portfolio-block_items-list');
	
			let minHeight = itemsContainer.firstChild.offsetHeight;
			if( undefined !== minHeight ) {
				itemsContainer.style.minHeight = minHeight + 'px';
			}
	
			if( ! el.classList.contains( 'layout-masonry' ) ) {
				for (var i = 0; i < itemsContainer.children.length; i++ ) {
					var child = itemsContainer.children[i];
					if ( child.tagName == 'LI' ) {
						child.classList.add('fade-in');
					}
				}
			}
	
		});
	
	}

	/**
	 * Get Portfolio Filtered Items.
	 */
	$.fn.getPortfolioFilteredItems = function () {
		
		let $this = $(this),
			$portfolioWrapper = $(this).closest('.wpzoom-blocks_portfolio-block'),
			$portfolio = $portfolioWrapper.find('.wpzoom-blocks_portfolio-block_items-list'),
			$preloader = $portfolio.find('.wpzoom-preloader-container');
			
			$preloader.css({ display: 'flex' });

		let portfolioData     = $portfolioWrapper.data( 'load-more' ),
			revertCats        = portfolioData.categories;
		
		var tax_filter_regex  = /cat-item-([0-9]+)/gi;
		var post_filter_regex = /wpzoom-blocks_portfolio-block_item-([0-9]+)/gi;

		var catID = tax_filter_regex.exec( $this.attr( 'class' ) );
		tax_filter_regex.lastIndex = 0;

		var filter;

		if ( catID === null ) {
			filter = '.wpzoom-blocks_portfolio-block_item';
		} else {
			filter = '.wpzoom-blocks_portfolio-block_category-' + catID[1];
		}

		var category_id = ( null == catID ) ? 'all' : catID[1];

		if ( category_id == 'all' && $portfolio.attr('data-subcategory') ) {
			category_id = $portfolio.attr('data-subcategory');
		}

		portfolioData.categories = [category_id];
		$.post(
			WPZoomPortfolioBlock.ajaxURL,
			{
				action: 'wpzoom_load_more_items',
				posts_data: JSON.stringify( portfolioData ),
				offset: 0,
			},
			function( data, status, code ) {
				
				if ( status == 'success' ) {
					
					var $newItems = $( data).find('.wpzoom-blocks_portfolio-block_item' );
					$newItems.addClass( 'fade-in' );
					$newItems.find('article').removeClass('hentry').addClass('portfolio_item');
					$preloader.hide();
					$portfolio.append( $newItems );
					
					$newItems.find('.portfolio_item .portfolio-block-popup-video').magnificPopupCallbackforPortfolioBlock();
					$newItems.find('.portfolio_item .portfolio-pro-popup-video').magnificPopupCallbackforPortfolioBlock();
					
					if( $newItems ) {
						var newPosts = [];
						var exPosts = $portfolioWrapper.attr( 'data-exclude-posts' );
						
						$newItems.each(function() {
							var postID = post_filter_regex.exec( $(this).attr( 'class' ) );
							post_filter_regex.lastIndex = 0;
							newPosts.push( postID[1] );
							
						}); 

						if( undefined !== exPosts ) {
							exPosts = exPosts + ',' + newPosts.toString();
							$portfolioWrapper.attr( 'data-exclude-posts', exPosts );
						}
						else {
							$portfolioWrapper.attr( 'data-exclude-posts', newPosts );
						}
						
					};

					let container = document.getElementsByClassName('wpzoom-blocks_portfolio-block');
					[].forEach.call(container, function(el) {					
						if( el.classList.contains( 'layout-masonry' ) ) {
							var elem = el.querySelector('.wpzoom-blocks_portfolio-block_items-list');
							var msnry = new Masonry( elem, {
								// options
								itemSelector: '.wpzoom-blocks_portfolio-block_item',
							});
				
							// element
							imagesLoaded( el ).on( 'progress', function() {
								msnry.layout();
							});
						}
					});

					//trigger jetpack lazy images event
					$( 'body' ).trigger( 'jetpack-lazy-images-load');

				}
			}
		);

		portfolioData.categories = revertCats;

	};

})(jQuery);